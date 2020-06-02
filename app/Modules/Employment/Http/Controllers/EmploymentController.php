<?php

namespace App\Modules\Employment\Http\Controllers;

use App\Modules\Dropdown\Repositories\DropdownInterface;
use App\Modules\Dropdown\Repositories\FieldInterface;
use App\Modules\Employment\Entities\DateConverter;
use App\Modules\Employment\Http\Requests\CreateEmployerUserRequest;
use App\Modules\Employment\Http\Requests\EmploymentRequest;
use App\Modules\Employment\Repositories\EmploymentInterface;
use App\Modules\User\Repositories\RoleInterface;
use App\Modules\User\Repositories\UserInterface;
use App\Modules\User\Repositories\UserRoleInterface;
use File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class EmploymentController extends Controller
{
    protected $employment;
    protected $user;
    protected $role;
    protected $user_role;
    protected $dropdown;
    protected $field;

    /**
     * EmploymentController constructor.
     * @param EmploymentInterface $employment
     * @param UserInterface $user
     * @param RoleInterface $role
     * @param UserRoleInterface $user_role
     * @param DropdownInterface $dropdown
     */
    public function __construct(EmploymentInterface $employment,
                                UserInterface $user,
                                RoleInterface $role,
                                UserRoleInterface $user_role,
                                DropdownInterface $dropdown,
                                FieldInterface $field)
    {
        $this->employment = $employment;
        $this->user = $user;
        $this->role = $role;
        $this->user_role = $user_role;
        $this->dropdown = $dropdown;
        $this->field = $field;
        set_time_limit(8000000);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {

        $search = $request->all();
        $data['employments'] = $this->employment->findAll($limit = 50, $search);
        $data['department'] = $this->dropdown->getFieldBySlug('department');
        $data['designation'] = $this->dropdown->getFieldBySlug('designation');
        $data['user_type'] = $this->dropdown->getUserType('user_type');
        $data['roles'] = $this->role->getList('name', 'id');

        return view('employment::employment.index', $data);
    }

    public function indexArchive(Request $request)
    {
        $search = $request->all();
        $data['employments'] = $this->employment->findArchive($limit = 50, $search);
        $data['department'] = $this->dropdown->getFieldBySlug('department');
        $data['designation'] = $this->dropdown->getFieldBySlug('designation');
        $data['user_type'] = $this->dropdown->getUserType('user_type');
        $data['countries'] = $this->dropdown->getFieldBySlug('countries');
        $data['roles'] = $this->role->getList('name', 'id');    
        dd($data);
        return view('employment::employment.index_archive', $data);
    }

    public function createUser(CreateEmployerUserRequest $request)
    {
        $input = $request->all();

        $ip_address = \Request::ip();

        $employer_id = $input['employer_id'];
        $username = $input['username'];
        $email = $input['email'];
        $password = $input['password'];
        $role_id=$input['role_id'];
        $role=$this->role->find($role_id);
        $user_type=$role->user_type;
        $employment_info = $this->employment->find($employer_id);

        $first_name = $employment_info->first_name;
        $middle_name = $employment_info->middle_name;
        $last_name = $employment_info->last_name;
        $phone = $employment_info->phone;
        $branch_location = $employment_info->branch_location;

        $userInfo = Auth::user();
        $parent_id = $userInfo->id;

        $user_access = array(
            'ip_address' => $ip_address,
            'username' => $username,
            'password' => bcrypt($password),
            'email' => $email,
            'user_type' => $user_type,
            'active' => '1',
            'department' =>0,
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'phone' => $phone,
            'branch_location' => $branch_location,
            'emp_id' => $employer_id,
            'parent_id' => $parent_id
        );

        $user = $this->user->save($user_access);

        $this->sendMail($email, $password, $username, $first_name, $last_name);


        $user->role()->attach($input['role_id'] ? $input['role_id'] : []);

        $update_emp = array(
            'is_user_access' => '1'
        );

        $this->employment->update($employer_id, $update_emp);

        alertify()->success('Employee User Access Created Successfully');
        return redirect(route('employment.index'));
    }

    public function sendMail($email, $password, $username, $first_name, $last_name)
    {
        $to = $email; // note the comma
        $subject = "";
        $message = '';
        $message .= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">';
        $message .= '<html>';
        $message .= '<head>';
        $message .= '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> ';
        $message .= '<title>Bidhee Pvt Ltd</title>';
        $message .= '</head>';
        $message .= '<body><h2>Hello, ' . $first_name . ' ' . $last_name . '</h2><h3>Login Credentials for System</h3>';
        $message .= '<table  width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#542C08" >';
        $message .= '<tr><td>Username</td><td>' . $username . '</td></tr>';
        $message .= '<tr><td>Password</td><td>' . $password . '</td></tr>';
        $message .= '<tr><td>System Link</td><td<a href="http://www.employee.bidheellc.com">Link To The Bidhee Employee System</a></td></tr>';
        $message .= '</table>';
        $message .= '</table>';
        $message .= '<p>** Note : Please change the password After First Login</p></body>';
        $message .= '</html>';


        // To send HTML mail, the Content-type header must be set
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'From: Bidhee Pvt Ltd ' . "\r\n";
        $headers .= 'To: ' . $email . '' . "\r\n";

        // Replace apostrophe character
        $message = str_replace("\'", "'", $message);

        // Mail it now
        if (@mail($to, $subject, $message, $headers)) {
            alertify()->success('Mail Send Succesfully');
            usleep(2000000);
            return true;
        } else {
            alertify()->error('Mail Not Send');
            return false;

        }
    }

    public function checkAvailability(Request $request)
    {
        $input = $request->all();

        $username = $input['username'];

        $check = $this->user->checkUsername($username);

        if (count($check) > 0) {
            echo 1;
        } else {
            echo 0;
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        $data['user'] = true;

        $data['department'] = $this->dropdown->getFieldBySlug('department');
        $data['designation'] = $this->dropdown->getFieldBySlug('designation');
        $data['blood_group'] = $this->dropdown->getFieldBySlug('blood_group');
        $data['ethnic'] = $this->dropdown->getFieldBySlug('ethnic');
        $data['religion'] = $this->dropdown->getFieldBySlug('religion');
        $data['salutation'] = $this->dropdown->getFieldBySlug('salutation');
        $data['state'] = $this->dropdown->getFieldBySlug('state');
        $data['roles'] = $this->role->getList('name', 'id');
        $data['countries'] = $this->employment->getCountries();
        $data['user_list'] = $this->user->getEmployeeUserList();

        $latestEmployee = $this->employment->getLatestEmployeeID();
        if (!empty($latestEmployee)) {
            $data['new_empid'] = $latestEmployee->employee_id + 1;
        } else {
            $data['new_empid'] = 1;
        }

        $year = date('Y');
        $month = date('m');
        $day = date('d');
        $data['eng_join_date'] = $eng_join_date = $year . '-' . $month . '-' . $day;

        return view('employment::employment.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(EmploymentRequest $request)
    {
        $data = $request->all();
        try {
            if ($request->hasFile('profile_pic')) {
                $data['profile_pic'] = $this->employment->upload($data['profile_pic']);
            }

            if ($request->hasFile('citizen_pic')) {
                $data['citizen_pic'] = $this->employment->uploadCitizen($data['citizen_pic']);
            }

            if ($request->hasFile('document_pic')) {
                $data['document_pic'] = $this->employment->uploadDocument($data['document_pic']);
            }

            $dob = date('Y-m-d', strtotime($data['dob']));
            unset($data['dob']);
            $data['dob'] = $dob;
            $year = date('Y', strtotime($data['join_date']));;
            $month = date('m', strtotime($data['join_date']));
            $day = date('d', strtotime($data['join_date']));

            $dates = new DateConverter();
            $resp = $dates->eng_to_nep($year, $month, $day);
            $data['nepali_join_date'] = $resp['year'] . '-' . $resp['month'] . '-' . $resp['date'];

            $employment = $this->employment->save($data);

            alertify()->success('Employee Created Successfully');

        } catch (\Throwable $e) {
            dd($e->getMessage());
            alertify($e->getMessage())->error();
        }
        return redirect(route('employment.index'));
    }


    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $data['employment'] = $this->employment->find($id);
        $data['is_edit'] = true;
        $data['department'] = $this->dropdown->getFieldBySlug('department');
        $data['designation'] = $this->dropdown->getFieldBySlug('designation');
         $data['blood_group'] = $this->dropdown->getFieldBySlug('blood_group');
        $data['ethnic'] = $this->dropdown->getFieldBySlug('ethnic');
        $data['religion'] = $this->dropdown->getFieldBySlug('religion');
        $data['salutation'] = $this->dropdown->getFieldBySlug('salutation');
        $data['state'] = $this->dropdown->getFieldBySlug('state');
        $data['roles'] = $this->role->getList('name', 'id');
        $data['countries'] = $this->employment->getCountries();
        $data['user_list'] = $this->user->getEmployeeUserList();


        $user_id = $this->user->getUserId($id);
        if ($user_id) {
            $data['user'] = $this->user->find($user_id->id);
        } else {
            $data['user'] = true;
        }

        $data['roles'] = $this->role->findAll();

        $data['eng_join_date'] = $eng_join_date = $data['employment']->join_date;

        return view('employment::employment.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(EmploymentRequest $request, $id)
    {
        $data = $request->all();

        unset($data['role_id']);
        try {
            if ($request->hasFile('profile_pic')) {
                $data['profile_pic'] = $this->employment->upload($data['profile_pic']);
            }

            if ($request->hasFile('citizen_pic')) {
                $data['citizen_pic'] = $this->employment->uploadCitizen($data['citizen_pic']);
            }

            if ($request->hasFile('document_pic')) {
                $data['document_pic'] = $this->employment->uploadDocument($data['document_pic']);
            }
            $year = date('Y', strtotime($data['join_date']));;
            $month = date('m', strtotime($data['join_date']));
            $day = date('d', strtotime($data['join_date']));

            $dates = new DateConverter();
            $resp = $dates->eng_to_nep($year, $month, $day);
            $data['nepali_join_date'] = $resp['year'] . '-' . $resp['month'] . '-' . $resp['date'];

            //User Role Update
            $user_id = $this->user->getUserId($id);
            if ($user_id) {
                $user = $this->user->find($user_id->id);
                $user->role()->sync($data['role']);
            }

            $this->employment->update($id, $data);

            alertify()->success('Employee Updated Successfully');

        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
        return redirect(route('employment.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->employment->delete($id);

            //user emp_id check and delete
            $this->user->deleteEmpUser($id);
            alertify()->success('Employee Deleted Successfully');
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
        return redirect(route('employment.index'));
    }

    public function updateStatus(Request $request)
    {
        $data = $request->all();
        try {
            $this->employment->update($data['employee_id'], $data);
            $this->employment->updateStatus($data['employee_id']);
            alertify()->success('Employee status updated');

        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
        return redirect()->back();

    }

    public function updateStatusArchive($id)
    {
        try {
            $this->employment->updateStatus($id);
            alertify()->success('Employee status updated');

        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
        return redirect()->back();

    }

    public function archiveMessage($id)
    {
        $resp = $this->employment->find($id);
        $html = "<p>$resp->archive_reason</p>";
        return $html;
    }

    public function updateType(Request $request)
    {

        $input = $request->all();

        $empId = $input['employerId'];
        $parent_id = $input['parent_id'];

        $userData = $this->user->getUserId($empId);
        if (!empty($userData)) {
            $user_id = $userData['id'];

            $update_emp = array(
                'is_parent_link' => '1'
            );
            $this->employment->update($empId, $update_emp);

            $user_data = array(
                'parent_id' => $parent_id
            );
            $this->user->update($user_id, $user_data);

            alertify()->success('Employer Link with Respective Head Dept.');
        } else {
            alertify()->error('User not created yet for the employee!');
        }

        return redirect(route('employment.index'));

    }


    function generateRandomString($length)
    {
        $include_chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        /* Uncomment below to include symbols */
        /* $include_chars .= "[{(!@#$%^/&*_+;?\:)}]"; */
        $charLength = strlen($include_chars);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $include_chars [rand(0, $charLength - 1)];
        }
        return $randomString;
    }


    public function employmentEdit($id)
    {
        $data['employment'] = $this->employment->find($id);
        $data['is_edit'] = true;
        $data['countries'] = $this->employment->getCountries();
        return view('employment::employment.userEdit', $data);
    }


    public function updateParentId(Request $request)
    {
        $data = $request->all();

        $user_id = $data['user_id'];
        $item['parent_id'] = (int)$data['parent_id'];
        $resp = $this->user->update($user_id, $item);
        return 1;
    }


    public function autocomplete(Request $request)
    {
        $data = $this->employment->autosearch($request->input('query'));
        $response = [];
        foreach ($data as $resp) {
            // if(!empty($resp->middle_name)) {
            $name = $resp->first_name . ' ' . $resp->middle_name . ' ' . $resp->last_name;
            /*  } else {
                 $name = $resp->first_name.' '.$resp->last_name;
             } */
            array_push($response, $name);
        }
        return response()->json($response);
    }


    public function checkEmailAvailability(Request $request)
    {
        $input = $request->all();
        if (isset($input['email']) && !empty(trim($input['email']))) {
            $checkEmailExist = $this->employment->checkEmailUnique($input['email']);
            if (!$checkEmailExist) {
                return 0;
            }
        } else {
            return 0;
        }
        return 1;
    }


}
