<?php

namespace App\Modules\Message\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Message\Repositories\MessageInterface;

class MessageController extends Controller
{

     protected $message;
    
    public function __construct(MessageInterface $message)
    {
        $this->message = $message;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['message'] = $this->message->findAll($limit= 50,$search);  
        return view('message::message.index',$data);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('message::show');
    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->message->delete($id);
             alertify()->success('Message Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('message.index'));
    }

}
