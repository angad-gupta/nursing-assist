<?php

namespace App\Modules\Page\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Page\Repositories\PageInterface;

class PageController extends Controller
{

     protected $page;
    
    public function __construct(pageInterface $page)
    {
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['page'] = $this->page->findAll($limit= 50,$search);
        $data['search_value']=$search;
        return view('page::page.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        return view('page::page.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $title =$data['title'];
        $data['slug'] = $slug =  str_slug($title, '_');

        $pageInfo = $this->page->checkPageInfo($slug);   

         if($pageInfo > 0){
            alertify()->success('Page Already Created.');
            return redirect(route('page.index'));
         }
        
         try{


            if ($request->hasFile('image')) {
                $data['image'] = $this->page->upload($data['image']);
            }
            $this->page->save($data);
            alertify()->success('Page Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('page.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('page::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['page'] = $this->page->find($id);
        return view('page::page.edit',$data);
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

            if ($request->hasFile('image')) {
                $data['image'] = $this->page->upload($data['image']);
            }
            
            $this->page->update($id,$data);
             alertify()->success('Page Updated Successfully');
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('page.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->page->delete($id);
             alertify()->success('Page Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('page.index'));
    }

}
