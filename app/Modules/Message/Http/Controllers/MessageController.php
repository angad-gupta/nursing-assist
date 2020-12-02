<?php

namespace App\Modules\Message\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use App\Modules\Home\Emails\SendNetaMail;

use App\Modules\Message\Repositories\MessageInterface;
use App\Modules\Student\Repositories\StudentInterface;
use App\Modules\EmailLog\Repositories\EmaillogInterface;

class MessageController extends Controller
{

     protected $message;
     protected $student;
     protected $emailLog;

    public function __construct(MessageInterface $message,StudentInterface $student,EmaillogInterface $emailLog)
    {
        $this->message = $message;
        $this->student = $student;
        $this->emailLog = $emailLog;
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


    public function ajaxViewMessageDetail(Request $request){

        $data = $request->all();

            $message_id = $data['message_id'];

            $message_info = $this->message->find($message_id);


            $html ='';
            $html .= "<table class='table table-striped table-border-dashed' id='table1' cellspacing='0' width='100%' frame='box' border='0'>";
            $html .= "<tbody>";
            $html .= "<tr>";
            $html .= "<td class='font-weight-black'>Title : </td>";
            $html .= "<td><b>".$message_info->title."</b></td>";
            $html .= "</tr>";

            $html .= "<tr>";
            $html .= "<td class='font-weight-black'>Content: </td>";
            $html .= "<td>".$message_info->message."</td>";
            $html .= "</tr>";



            $html .= "</tbody>";
            $html .= "</table>";

            return  $html;
    }

    public function reply(Request $request){
        $data = $request->all();

        $message_id = $data['message_id'];

        $message_info = $this->message->find($message_id);


        $messageData =array(

            'status'=> 'Replied'
        );
        $this->message->update($message_id,$messageData);

        $reply_message_data = array(

            'message_id' => $message_id,
            'title' => 'Message Reply From Admin',
            'message' => $data['message'],
            'sent_to' => $message_info->sent_by
        );
        $this->message->saveMessageReply($reply_message_data);

         $student_info = $this->student->find($message_info->sent_by);

       $email = $student_info->email;
       $subject = 'Reply Message Notification';

    /* ---------------------------------------------------------------
        Email Send to Announcement Nofitication
    --------------------------------------------------------------- */
       $content = view('message::message.partial.email-content')->render();

      Mail::to($email)->send(new SendNetaMail($content, $subject));

       /*     Email Log Maintaining    */
            $emaillog['action'] = 'Reply Message Notification';
            $emaillog['student_id'] = $student_info->id;
            $emaillog['date'] = date('Y-m-d');
            $this->emailLog->saveEmaillog($emaillog);
            /*  End of Email Log Maintaining  */

    /* ---------------------------------------------------------------
        Email Send to  Announcement Nofitication
    --------------------------------------------------------------- */
     alertify()->success('Message Reply To Stdent Successfully');
     return redirect(route('message.index'));

    }

    public function ajaxInboxMessageDetail(Request $request){

        $data = $request->all();

            $message_id = $data['message_id'];

            $message_info = $this->message->findMessageInox($message_id);


            $html ='';
            $html .= "<table class='table table-striped table-border-dashed' id='table1' cellspacing='0' width='100%' frame='box' border='0'>";
            $html .= "<tbody>";
            $html .= "<tr>";
            $html .= "<td class='font-weight-black'>Title : </td>";
            $html .= "<td><b>".$message_info->title."</b></td>";
            $html .= "</tr>";

            $html .= "<tr>";
            $html .= "<td class='font-weight-black'>Content: </td>";
            $html .= "<td>".$message_info->message."</td>";
            $html .= "</tr>";



            $html .= "</tbody>";
            $html .= "</table>";

            return  $html;
    }
    

}
