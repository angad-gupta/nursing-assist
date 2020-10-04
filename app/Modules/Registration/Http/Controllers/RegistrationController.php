<?php

namespace App\Modules\Registration\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Student\Repositories\StudentInterface;

class RegistrationController extends Controller
{
    protected $student;
    protected $studentPayment;

    public function __construct(StudentInterface $student) {

        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $sort_by = ['by' => 'id', 'sort' => 'DESC'];
        if (isset($search['sort_by']) && !empty($search['sort_by'])) {
            $sort_by = ['by' => 'full_name', 'sort' => $search['sort_by']];
        }
        $data['student'] = $this->student->findAll($limit = null, $search, $sort_by); 
        return view('registration::registration.index',$data);
    }

     public function destroy($id)
    {
        try {
            $this->student->delete($id);
            alertify()->success('Registered Student Deleted Successfully');
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
       return redirect()->back();
        
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('registration::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('registration::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
