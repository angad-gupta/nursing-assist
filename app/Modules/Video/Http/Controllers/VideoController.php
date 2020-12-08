<?php

namespace App\Modules\Video\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Video\Repositories\VideoInterface;

class VideoController extends Controller
{

      protected $video;
    
    public function __construct(VideoInterface $video)
    {
        $this->video = $video;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['video_info'] = $this->video->findAll($limit= 50,$search);  
        return view('video::video.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        return view('video::video.create',$data);
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
            if ($request->hasFile('video_path')) {
                $data['video_path'] = $this->video->upload($data['video_path']);
            }

            if ($request->hasFile('thumbnail_image')) {
                $data['thumbnail_image'] = $this->video->uploadImage($data['thumbnail_image']);
            } 

            $data['date'] = date('Y-m-d');

            $this->video->save($data);
            alertify()->success('Video Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('video.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('video::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['video_info'] = $this->video->find($id);
        return view('video::video.edit',$data);
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

            if ($request->hasFile('video_path')) {
                $data['video_path'] = $this->video->upload($data['video_path']);
            }

            if ($request->hasFile('thumbnail_image')) {
                $data['thumbnail_image'] = $this->video->uploadImage($data['thumbnail_image']);
            } 

            $this->video->update($id,$data);
             alertify()->success('Video Updated Successfully');
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('video.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->video->delete($id);
             alertify()->success('Video Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('video.index'));
    }

}
