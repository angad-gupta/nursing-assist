<?php

namespace App\Modules\ContactUs\Http\Controllers;

use App\Modules\ContactUs\Repositories\ContactUsInterface;
use App\Modules\EmailLog\Repositories\EmaillogInterface;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Mail;
use App\Modules\Home\Emails\SendNetaMail;

class ContactUsController extends Controller
{

    protected $contactus;
    protected $emailLog;

    public function __construct(ContactUsInterface $contactus, EmaillogInterface $emailLog)
    {
        $this->contactus = $contactus;
        $this->emailLog = $emailLog;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $data['contactus'] = $this->contactus->findAll($limit = 50, $search);
        return view('contactus::contactus.index', $data);
    }

    public function viewUser(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $contactus = $this->contactus->find($id);
        $data = view('contactus::contactus.view-detail', compact('contactus'))->render();
        return response()->json(['options' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->contactus->delete($id);
            alertify()->success('Contact Deleted Successfully');
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
        return redirect(route('contactus.index'));
    }

    public function updateStatus(Request $request)
    {
        $input = $request->all();
        try {
            $this->contactus->update($input['contact_id'], $input);
            alertify()->success('Contact Status Updated Successfully');
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
        return redirect(route('contactus.index'));
    }

    public function replyMessage(Request $request){

        $data = $request->all();

        $contact_id = $data['contact_id'];
        $status = $data['status'];
        $message = $data['message'];

        if($status == 'Replied'){
            $update_data = array(

                'status' => 'Replied'
            );
            $this->contactus->update($contact_id, $update_data);
             alertify()->success('Contact Update Successfully');
             return redirect(route('contactus.index'));
        }

        $contactInfo = $this->contactus->find($contact_id);

        $email = $contactInfo->email;
        $subject = 'Reply From Neta';

        if($email){

            $response['contactInfo'] = $contactInfo;
            $response['message'] = $message;
            /* ---------------------------------------------------------------
                Email Send to Announcement Nofitication
            --------------------------------------------------------------- */
               $content = view('contactus::contactus.email-content',$response)->render();

              Mail::to($email)->send(new SendNetaMail($content, $subject));

            /* ---------------------------------------------------------------
                Email Send to  Announcement Nofitication
            --------------------------------------------------------------- */

            $update_data = array(

                'status' => 'Replied'
            );
            $this->contactus->update($contact_id, $update_data);
        }

        alertify()->success('Reply Message Send Successfully');
        return redirect(route('contactus.index'));
    }

}
