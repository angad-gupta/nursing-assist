<?php

namespace App\Modules\Agent\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Agent\Repositories\AgentInterface;


class AgentController extends Controller
{

      protected $agent;
    
    public function __construct(AgentInterface $agent)
    {
        $this->agent = $agent;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['agent'] = $this->agent->findAll($limit= 50,$search);  
        return view('agent::agent.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
         $data['countries'] = $this->agent->getCountries();
        return view('agent::agent.create',$data);
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
            if ($request->hasFile('agent_logo')) {
                $data['agent_logo'] = $this->agent->upload($data['agent_logo']);
            }

            $this->agent->save($data);
            alertify()->success('Agent Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('agent.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('agent::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['countries'] = $this->agent->getCountries();
        $data['agent'] = $this->agent->find($id);
        return view('agent::agent.edit',$data);
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

            if ($request->hasFile('agent_logo')) {
                $data['agent_logo'] = $this->agent->upload($data['agent_logo']);
            }

            $this->agent->update($id,$data);
             alertify()->success('Agent Updated Successfully');
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('agent.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->agent->delete($id);
             alertify()->success('Agent Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('agent.index'));
    }

}
