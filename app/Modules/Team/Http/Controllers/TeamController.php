<?php

namespace App\Modules\Team\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Team\Repositories\TeamInterface;

class TeamController extends Controller
{

    protected $team;
    
    public function __construct(TeamInterface $team)
    {
        $this->team = $team;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['team_info'] = $this->team->findAll($limit= 50,$search);  
        return view('team::team.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        return view('team::team.create',$data);
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
            if ($request->hasFile('profile_pic')) {
                $data['profile_pic'] = $this->team->upload($data['profile_pic']);
            }

            $this->team->save($data);
            alertify()->success('Team Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('team.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('team::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['team_info'] = $this->team->find($id);
        return view('team::team.edit',$data);
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

            if ($request->hasFile('profile_pic')) {
                $data['profile_pic'] = $this->team->upload($data['profile_pic']);
            }

            $this->team->update($id,$data);
             alertify()->success('Team Updated Successfully');
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('team.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->team->delete($id);
             alertify()->success('Team Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('team.index'));
    }
}
