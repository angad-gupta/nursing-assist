<?php

namespace App\Modules\Newsletter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Newsletter\Repositories\NewsletterInterface;
use App\Modules\Student\Repositories\StudentInterface;

use Illuminate\Support\Facades\Mail;
use App\Modules\Home\Emails\SendNetaMail;

class NewsletterController extends Controller
{

    protected $newsletter;
    protected $student;
    
    public function __construct(NewsletterInterface $newsletter,StudentInterface $student)
    {
        $this->newsletter = $newsletter;
        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['newsletter_info'] = $this->newsletter->findAll($limit= 50,$search);  
        return view('newsletter::newsletter.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        $data['student'] = $this->student->findAll();
        return view('newsletter::newsletter.create',$data);
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

            $subject = $data['subject'];
            $message = $data['message'];
            $students = $data['student_id'];
            $date = date('Y-m-d');
            $status = 'Send';

            $template_data = array(

                'subject' => $subject,
                'message'=> $message,
                'status'=> $status,
                'date'=> $date

            );

            $templateInfo = $this->newsletter->save($template_data);
            $template_id = $templateInfo['id'];

            if(!is_null($message)){

                foreach ($students as $key => $value) {
                    
                    $templateToData = array(

                        'template_id' => $template_id,
                        'student_id' =>$value

                    );

                    $this->newsletter->saveTemplateTo($templateToData);

                    $studentInfo = $this->student->find($value);
                    $email = $studentInfo->email;

                    if($email){

                            $response['message'] = $message;
                            /* ---------------------------------------------------------------
                                Email Send to Respective Student Nofitication
                            --------------------------------------------------------------- */
                            $content = view('newsletter::newsletter.partial.email-content',$response)->render();
                          
                           Mail::to($email)->send(new SendNetaMail($content, $subject));
                            /* ---------------------------------------------------------------
                                Email Send to  Respective Student Nofitication
                            --------------------------------------------------------------- */
                        }   

                        usleep(1000000);

                }   

            }

            alertify()->success('Template Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('newsletter.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('newsletter::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->newsletter->deleteTempleteTo($id);
            $this->newsletter->delete($id);
             alertify()->success('Template Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('newsletter.index'));
    }

}
