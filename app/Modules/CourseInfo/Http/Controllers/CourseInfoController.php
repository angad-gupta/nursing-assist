<?php

namespace App\Modules\CourseInfo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Course\Repositories\CourseInterface;


class CourseInfoController extends Controller
{

    protected $courseinfo;
    protected $course;
    
    public function __construct(CourseInfoInterface $courseinfo, CourseInterface $course)
    {
        $this->courseinfo = $courseinfo;
        $this->course = $course;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $data['courseinfo'] = $this->courseinfo->findAll($limit= 10, $search); 
        $data['search_value']=$search;
        return view('courseinfo::courseinfo.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {  
        $data['is_edit'] = false;
        $data['course']=$this->course->getList();
        return view('courseinfo::courseinfo.create',$data);
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

             $courseInfoData = array(
                'course_id' => $data['course_id'],
                 'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
                'youtube_id' => $data['youtube_id'],
                'tuition_fee' => $data['tuition_fee'],
            );

            if ($request->hasFile('image_path')) {
                 $courseInfoData['image_path'] = $this->courseinfo->upload($data['image_path']);
             }

            $courseInfo = $this->courseinfo->save($courseInfoData);
            $course_info_id = $courseInfo->id;

            $feature_title = $data['feature_title'];
            $countname = sizeof($feature_title);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['feature_title'][$i]){
                         $featuredata['courseInfo_id'] = $course_info_id;
                         $featuredata['feature_title'] = $data['feature_title'][$i];

                         $this->courseinfo->saveCourseFeature($featuredata);
                    }
                }
           
            alertify()->success('Course Information  Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('courseinfo.index'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['courseinfo'] = $this->courseinfo->find($id);    
        $data['course']=$this->course->getList();
        return view('courseinfo::courseinfo.edit',$data);
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

            $courseInfoData = array(
                'course_id' => $data['course_id'],
                 'title' => $data['title'],
                'description' => $data['description'],
                'type' => $data['type'],
                'youtube_id' => $data['youtube_id'],
                'tuition_fee' => $data['tuition_fee'],
            );

            if ($request->hasFile('image_path')) {
                 $courseInfoData['image_path'] = $this->courseinfo->upload($data['image_path']);
             }

            $courseInfo = $this->courseinfo->update($id, $courseInfoData);
            $course_info_id = $id;
            
            $this->courseinfo->deleteCourseFeature($course_info_id);

            $feature_title = $data['feature_title'];
            $countname = sizeof($feature_title);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['feature_title'][$i]){
                         $featuredata['courseInfo_id'] = $course_info_id;
                         $featuredata['feature_title'] = $data['feature_title'][$i];

                         $this->courseinfo->saveCourseFeature($featuredata);
                    }
                }
            
            alertify()->success('Course Information Updated Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('courseinfo.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
       try{
            $this->courseinfo->deleteCourseFeature($id);
            $this->courseinfo->delete($id);
            alertify()->success('Course Information Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        return redirect(route('courseinfo.index'));  
    }


    public function appendFeature(Request $request){
         
         $data = view('courseinfo::courseinfo.partial.add-more-feature')->render();
         return response()->json(['options'=>$data]);
        
        }

}
