<?php

namespace App\Modules\FAQ\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\FAQ\Repositories\FAQInterface;

class FAQController extends Controller
{

    protected $faq;
    
    public function __construct(FAQInterface $faq)
    {
        $this->faq = $faq;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['faq'] = $this->faq->findAll($limit= 50,$search);  
        return view('faq::faq.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        return view('faq::faq.create',$data);
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
            $this->faq->save($data);
            alertify()->success('FAQ Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('faq.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('faq::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['faq'] = $this->faq->find($id);
        return view('faq::faq.edit',$data);
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
            $this->faq->update($id,$data);
             alertify()->success('FAQ Updated Successfully');
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('faq.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->faq->delete($id);
             alertify()->success('FAQ Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('faq.index'));
    }

  
}
