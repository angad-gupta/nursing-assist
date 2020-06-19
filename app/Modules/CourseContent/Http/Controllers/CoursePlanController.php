<?php

namespace App\Modules\CourseContent\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\CourseContent\Repositories\CoursePlanInterface;
use App\Modules\CourseContent\Repositories\CourseSubTopicInterface;
 
class CoursePlanController extends Controller
{
    protected $courseplan;
    protected $coursesubtopic;

    public function __construct(CoursePlanInterface $courseplan, CourseSubTopicInterface $coursesubtopic)
    {
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
        $course_content_id = $search['course_content_id'];
        $data['courseplan'] = $this->courseplan->findAll($course_content_id,$limit= 10, $search); 
        $data['search_value']=$search;
        $data['course_content_id']=$course_content_id;
        return view('coursecontent::courseplan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {  
        $input = $request->all();
        $data['is_edit'] = false;
        $data['course_content_id']=$input['course_content_id'];
        return view('coursecontent::courseplan.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
         $data = $request->all(); 

         $course_content_id = $data['course_content_id'];

         try{ 

            if ($request->hasFile('content_image_path')) {
                unset($data['plan_path']);
                $data['plan_path'] = $this->courseplan->upload($data['content_image_path']);
            }

            $this->courseplan->save($data);
           
            alertify()->success('Course Plan Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
    return redirect(route('courseplan.index',['course_content_id'=>$course_content_id]));

    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Request $request)
    {
        $input = $request->all();

        $data['is_edit'] = true;
        $data['course_content_id']=$input['course_content_id'];
        $id = $input['course_plan_id'];
        $data['courseplan'] = $this->courseplan->find($id);   
        return view('coursecontent::courseplan.edit',$data);
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
        $course_content_id = $data['course_content_id'];
         try{ 

            if ($request->hasFile('content_image_path')) {
                unset($data['plan_path']);
                $data['plan_path'] = $this->courseplan->upload($data['content_image_path']);
            }

            $this->courseplan->update($id, $data);
            
            alertify()->success('Course Plan Updated Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
       return redirect(route('courseplan.index',['course_content_id'=>$course_content_id]));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $input = $request->all();
        $course_content_id = $input['course_content_id'];
        $id = $input['course_plan_id'];

          $subtopicInfo = $this->coursesubtopic->find($id);
          $sub_topic_id = ($subtopicInfo) ? $subtopicInfo->id : '';
 
       try{

            $this->coursesubtopic->deleteSubTopic($sub_topic_id);
            $this->courseplan->delete($id);
            alertify()->success('Course Plan Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }

        return redirect(route('courseplan.index',['course_content_id'=>$course_content_id]));
    }
}
