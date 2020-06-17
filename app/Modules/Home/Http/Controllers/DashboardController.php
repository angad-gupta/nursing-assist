<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Modules\Student\Repositories\StudentInterface;
use Illuminate\Support\Facades\Auth;
use App\Modules\Announcement\Repositories\AnnouncementInterface;


class DashboardController extends Controller
{
      protected $student;
      protected $announcement;
    
    public function __construct(StudentInterface $student, AnnouncementInterface $announcement)
    {
        $this->student = $student;
        $this->announcement = $announcement;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $id = Auth::guard('student')->user()->id;
        $data['student_profile'] = Auth::guard('student')->user()->find($id);
        $data['announcement'] = $this->announcement->findAll($limit=5);  

        return view('home::student.dashboard',$data);
    }

    public function studentProfileUpdate(Request $request,$id){
        $data = $request->all();

        try{

            if ($request->hasFile('profile_pic')) {
                $data['profile_pic'] = $this->student->upload($data['profile_pic']);
            }


            $this->student->update($id,$data);
            Flash('Student Profile Updated Successfully')->success();
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('student-account'));

    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('home::create');
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
        return view('home::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('home::edit');
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

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
