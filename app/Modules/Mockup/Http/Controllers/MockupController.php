<?php

namespace App\Modules\Mockup\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Modules\Mockup\Repositories\MockupInterface;


class MockupController extends Controller
{
      protected $mockup;
    
    public function __construct(MockupInterface $mockup)
    {
        $this->mockup = $mockup;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['mockup'] = $this->mockup->findAll($limit= 50,$search);  
        return view('mockup::mockup.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        return view('mockup::mockup.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $question_type = $data['question_type'];
        
         try{
            
             if ($request->hasFile('additional_image')) {
                $data['additional_image'] = $this->mockup->upload($data['additional_image']);
            }

             if($question_type == 'multiple'){
                $data['correct_option'] = json_encode($data['multiple_correct_option']);
            }else{
                 $data['correct_option'] = $data['single_correct_option'];
            }

            $this->mockup->save($data);
            alertify()->success('Team Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('mockup.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('mockup::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['mockup'] = $this->mockup->find($id);
        return view('mockup::mockup.edit',$data);
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
         $question_type = $data['question_type'];

        try{
            
             if ($request->hasFile('additional_image')) {
                $data['additional_image'] = $this->mockup->upload($data['additional_image']);
            }

            if($question_type == 'multiple'){
                $data['correct_option'] = json_encode($data['multiple_correct_option']);
            }else{
                 $data['correct_option'] = $data['single_correct_option'];
            }

            $this->mockup->update($id,$data);
             alertify()->success('Team Updated Successfully');
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('mockup.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->mockup->delete($id);
             alertify()->success('Team Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('mockup.index'));
    }

}
