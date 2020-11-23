<?php

namespace App\Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Blog\Repositories\BlogInterface;

class BlogController extends Controller
{
    protected $blog;
    
    public function __construct(BlogInterface $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['blog_info'] = $this->blog->findAll($limit= 50,$search);  
        return view('blog::blog.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        return view('blog::blog.create',$data);
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
            if ($request->hasFile('blog_image')) {
                $data['blog_image'] = $this->blog->upload($data['blog_image']);
            }
            $data['date'] = date('Y-m-d');
            $this->blog->save($data);
            alertify()->success('Blog Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('blog.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['blog_info'] = $this->blog->find($id);
        return view('blog::blog.edit',$data);
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

            if ($request->hasFile('blog_image')) {
                $data['blog_image'] = $this->blog->upload($data['blog_image']);
            }

            $this->blog->update($id,$data);
             alertify()->success('Blog Updated Successfully');
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->blog->delete($id);
             alertify()->success('Blog Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('blog.index'));
    }

}
