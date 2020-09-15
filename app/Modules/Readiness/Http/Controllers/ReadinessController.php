<?php

namespace App\Modules\Readiness\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Readiness\Repositories\ReadinessInterface;

class ReadinessController extends Controller
{
    protected $readiness;
    
    public function __construct(ReadinessInterface $readiness)
    {
        $this->readiness = $readiness;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['readiness'] = $this->readiness->findAll($limit= 50,$search);  
        return view('readiness::readiness.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        return view('readiness::readiness.create',$data);
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
                $data['additional_image'] = $this->readiness->upload($data['additional_image']);
            }

             if($question_type == 'multiple'){
                $data['correct_option'] = json_encode($data['multiple_correct_option']);
            }else{
                 $data['correct_option'] = $data['single_correct_option'];
            }

            $this->readiness->save($data);
            alertify()->success('Team Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('readiness.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('readiness::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['readiness'] = $this->readiness->find($id);
        return view('readiness::readiness.edit',$data);
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
                $data['additional_image'] = $this->readiness->upload($data['additional_image']);
            }

            if($question_type == 'multiple'){
                $data['correct_option'] = json_encode($data['multiple_correct_option']);
            }else{
                 $data['correct_option'] = $data['single_correct_option'];
            }

            $this->readiness->update($id,$data);
             alertify()->success('Team Updated Successfully');
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('readiness.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->readiness->delete($id);
             alertify()->success('Team Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('readiness.index'));
    }

}
