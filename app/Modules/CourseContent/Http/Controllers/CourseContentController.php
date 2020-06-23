<?php

namespace App\Modules\CourseContent\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Syllabus\Repositories\SyllabusInterface;
use App\Modules\CourseContent\Repositories\CourseContentInterface;
use App\Modules\CourseContent\Repositories\CoursePlanInterface;
use App\Modules\CourseContent\Repositories\CourseSubTopicInterface;

class CourseContentController extends Controller
{
    protected $courseinfo;
    protected $syllabus;
    
    protected $coursecontent;
    protected $courseplan;
    protected $coursesubtopic;

    public function __construct(CourseInfoInterface $courseinfo,SyllabusInterface $syllabus,CourseContentInterface $coursecontent,CoursePlanInterface $courseplan, CourseSubTopicInterface $coursesubtopic)
    {
        $this->courseinfo = $courseinfo;
        $this->syllabus = $syllabus;
        $this->coursecontent = $coursecontent;
        $this->courseplan = $courseplan;
        $this->coursesubtopic = $coursesubtopic;
    }


     /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $data['coursecontent'] = $this->coursecontent->findAll($limit= 10, $search); 
        $data['search_value']=$search;
        return view('coursecontent::coursecontent.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {  
        $data['is_edit'] = false;
        $data['course_info']=$this->courseinfo->getList();
        $data['syllabus']=$this->syllabus->getList();
        return view('coursecontent::coursecontent.create',$data);
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

            if ($request->hasFile('content_image_path')) {
                unset($data['content_path']);
                $data['content_path'] = $this->coursecontent->upload($data['content_image_path']);
            }

            $this->coursecontent->save($data);
           
           
            alertify()->success('Course Content Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('coursecontent.index'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['coursecontent'] = $this->coursecontent->find($id);    
        $data['course_info']=$this->courseinfo->getList();
        $data['syllabus']=$this->syllabus->getList();
        return view('coursecontent::coursecontent.edit',$data);
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

            if ($request->hasFile('content_image_path')) {
                unset($data['content_path']);
                $data['content_path'] = $this->coursecontent->upload($data['content_image_path']);
            }

            $this->coursecontent->update($id, $data);
            
            alertify()->success('Course Material Updated Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('coursecontent.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

        $coursePlanInfo = $this->courseplan->getDataById($id);
        if($coursePlanInfo){
            foreach ($coursePlanInfo as $key => $value) {
                $course_plan_id = $value['id'];

                $courseSubTopicInfo = $this->coursesubtopic->getDataById($course_plan_id);
                 if($courseSubTopicInfo){
                    foreach ($courseSubTopicInfo as $key => $subvalue) {
                        $sub_topic_id = $subvalue['id'];
                        $this->coursesubtopic->deleteSubTopic($sub_topic_id);
                    }
                }
               
                $this->courseplan->deletePlan($course_plan_id);
            }
        }


       try{
            $this->coursecontent->delete($id);
            alertify()->success('Course Material Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        return redirect(route('coursecontent.index'));  
    }

}
 