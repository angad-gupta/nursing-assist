<?php

namespace App\Modules\Enrolment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Enrolment\Repositories\EnrolmentInterface;

class EnrolmentController extends Controller
{
   
    protected $enrolment;
    
    public function __construct(EnrolmentInterface $enrolment)
    {
        $this->enrolment = $enrolment;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();  
        $data['enrolment'] = $this->enrolment->findAll($limit= 10, $search); 
        return view('enrolment::enrolment.index',$data);
    }

    public function viewUser(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $enrolment = $this->enrolment->find($id);    
        $data = view('enrolment::enrolment.view-detail',compact('enrolment'))->render();
        return response()->json(['options'=>$data]);
    }

}
