<?php

namespace App\Modules\CourseContent\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\CourseContent\Repositories\CourseSubTopicInterface;

class CourseSubTopicController extends Controller
{
     protected $coursesubtopic;

    public function __construct(CourseSubTopicInterface $coursesubtopic)
    {
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
        $course_plan_id = $search['course_plan_id'];
        $data['coursesubtopic'] = $this->coursesubtopic->findAll($course_plan_id,$limit= 10, $search); 
        $data['search_value']=$search;
        $data['course_content_id']=$course_content_id;
        $data['course_plan_id']=$course_plan_id;
        return view('coursecontent::coursesubtopic.index',$data);
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
        $data['course_plan_id']=$input['course_plan_id'];
        return view('coursecontent::coursesubtopic.create',$data);
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
         $course_plan_id = $data['course_plan_id'];

         try{ 

            if ($request->hasFile('content_image_path')) {
                unset($data['sub_topic_path']);
                $data['sub_topic_path'] = $this->coursesubtopic->upload($data['content_image_path']);
            }

            $this->coursesubtopic->save($data);
           
            alertify()->success('Course Sub Topic Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
    return redirect(route('coursesubtopic.index',['course_content_id'=>$course_content_id,'course_plan_id'=>$course_plan_id]));

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
        $data['course_plan_id']=$input['course_plan_id'];
        $id = $input['sub_topic_id'];
        $data['coursesubtopic'] = $this->coursesubtopic->find($id);   
        return view('coursecontent::coursesubtopic.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {
        $data = $request->all(); 
        $course_content_id = $data['course_content_id'];
        $course_plan_id = $data['course_plan_id'];
        $id = $data['sub_topic_id'];
         try{ 

            if ($request->hasFile('content_image_path')) {
                unset($data['sub_topic_path']);
                $data['sub_topic_path'] = $this->coursesubtopic->upload($data['content_image_path']);
            }

            $this->coursesubtopic->update($id, $data);
            
            alertify()->success('Course Sub Topic Updated Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
       return redirect(route('coursesubtopic.index',['course_content_id'=>$course_content_id,'course_plan_id'=>$course_plan_id]));
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
        $course_plan_id = $input['course_plan_id'];
        $id = $input['sub_topic_id'];
 
       try{

            $this->coursesubtopic->delete($id);
            alertify()->success('Course Sub Topic Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }

        return redirect(route('coursesubtopic.index',['course_content_id'=>$course_content_id,'course_plan_id'=>$course_plan_id]));
    }
}
