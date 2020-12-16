<?php

namespace App\Modules\Forum\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Forum\Repositories\ForumInterface;

class ForumController extends Controller
{
    protected $forum;
    
    public function __construct(ForumInterface $forum)
    {
        $this->forum = $forum;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['forum_info'] = $this->forum->findAll($limit= 50,$search);  
        return view('forum::forum.index',$data);
    }


    public function ForumComment($id){
        $data['forum_comment'] = $this->forum->getCommentById($id);
        return view('forum::forum.view-comment',$data);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->forum->delete($id);
             alertify()->success('Forum Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('forum.index'));
    }

     /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function deleteComment($id)
    {
        try{
            $this->forum->deleteComment($id);
             alertify()->success('Forum Comment Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('forum.comment',$id));
    }

}
