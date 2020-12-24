<?php

namespace App\Modules\WhatOurStudentSay\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\WhatOurStudentSay\Repositories\WhatOurStudentSayInterface;

class WhatOurStudentSayController extends Controller
{

     protected $whatourstudentsay;
    
    public function __construct(WhatOurStudentSayInterface $whatourstudentsay)
    {
        $this->whatourstudentsay = $whatourstudentsay;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['whatourstudentsay_info'] = $this->whatourstudentsay->findAll($limit= 50,$search);  
        return view('whatourstudentsay::whatourstudentsay.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        return view('whatourstudentsay::whatourstudentsay.create',$data);
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
                $data['profile_pic'] = $this->whatourstudentsay->upload($data['profile_pic']);
            }

            $this->whatourstudentsay->save($data);
            alertify()->success('Data Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('whatourstudentsay.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('whatourstudentsay::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['whatourstudentsay_info'] = $this->whatourstudentsay->find($id);
        return view('whatourstudentsay::whatourstudentsay.edit',$data);
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
                $data['profile_pic'] = $this->whatourstudentsay->upload($data['profile_pic']);
            }

            $this->whatourstudentsay->update($id,$data);
             alertify()->success('Data Updated Successfully');
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('whatourstudentsay.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->whatourstudentsay->delete($id);
             alertify()->success('Data Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('whatourstudentsay.index'));
    }

}
