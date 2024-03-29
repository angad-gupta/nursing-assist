<?php

namespace App\Modules\Course\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Course\Repositories\CourseInterface;

class CourseController extends Controller
{

    protected $course;
    
    public function __construct(CourseInterface $course)
    {
        $this->course = $course;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['course'] = $this->course->findAll($limit= 50,$search);
        $data['search_value']=$search;
        return view('course::course.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        return view('course::course.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
         try{

             $courseoData = array(
                'title' => $data['title'],
                'title_of_training' => $data['title_of_training'],
                'course_duration' => $data['course_duration'],
                'mode_of_delivery' => $data['mode_of_delivery'],
                'intake_dates' => $data['intake_dates'],
                'course_fees' => $data['course_fees'],
                'short_content' => $data['short_content'],
                'description' => $data['description'],
                'enrollment_process' => $data['enrollment_process'],
                'important_course' => $data['important_course'],
                //'status'=> $data['status']
            );

            if ($request->hasFile('image')) {
                $courseoData['image'] = $this->course->upload($data['image']);
            }

            $this->course->save($courseoData);
            

            alertify()->success('Course Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('course.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('course::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['course'] = $this->course->find($id);
        return view('course::course.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
       $data = $request->all();
        
        try{
            $courseoData = array(
                'title' => $data['title'],
                'title_of_training' => $data['title_of_training'],
                'course_duration' => $data['course_duration'],
                'mode_of_delivery' => $data['mode_of_delivery'],
                'intake_dates' => $data['intake_dates'],
                'course_fees' => $data['course_fees'],
                'short_content' => $data['short_content'],
                'description' => $data['description'],
                'enrollment_process' => $data['enrollment_process'],
                'important_course' => $data['important_course'],
                //'status'=> $data['status']
            );

            if ($request->hasFile('image')) {
                $data['image'] = $this->course->upload($data['image']);
            }

            $this->course->update($id,$courseoData);
         
            
             alertify()->success('Course Updated Successfully');
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('course.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->course->delete($id);
             alertify()->success('Course Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('course.index'));
    }

    public function appendEnrolment(Request $request){
     
     $data = view('course::course.partial.add-more-enrolment')->render();
     return response()->json(['options'=>$data]);
        
    }

}
