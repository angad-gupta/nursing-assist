<?php

namespace App\Modules\Enrolment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Auth;
use Eway\Rapid\Client;
use App\Modules\Enrolment\Repositories\EnrolmentInterface;
use App\Modules\Enrolment\Repositories\EnrolmentPaymentInterface;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Course\Repositories\CourseInterface;
use Illuminate\Support\Facades\Redirect;


class EnrolmentController extends Controller
{
   
    protected $enrolment;
    protected $courseinfo;
    protected $course;
    protected $enrolpayment;
    
    public function __construct(EnrolmentInterface $enrolment, CourseInfoInterface $courseinfo, CourseInterface $course,EnrolmentPaymentInterface $enrolpayment)
    {
        $this->enrolment = $enrolment;
         $this->courseinfo = $courseinfo;
        $this->course = $course;
        $this->enrolpayment = $enrolpayment;

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
    public function store(Request $request)
    {
         $data = $request->all();
         
     
         if($data['eligible_rd'] == 'is_eligible_mcq_osce')
         {
            $data['is_eligible_mcq_osce'] = 1;
            $data['is_eligible_att'] = 0;
            $data['is_eligible_letter_ahpra'] = 0;
         }
         elseif($data['eligible_rd'] == 'is_eligible_att')
         {
            $data['is_eligible_mcq_osce'] = 0;
            $data['is_eligible_att'] = 1;
            $data['is_eligible_letter_ahpra'] = 0;
         }
         elseif($data['eligible_rd'] == 'is_eligible_letter_ahpra')
         {
            $data['is_eligible_mcq_osce'] = 0;
            $data['is_eligible_att'] = 0;
            $data['is_eligible_letter_ahpra'] = 1;
         }
       
         if(isset($request->rd))
         {
            $data['is_id'] = 1;
         }
         else
         {
          $data['is_id'] = 0;  
         }
         
         $student_detail = auth()->guard('student')->user();
         $data['student_id'] = $student_detail->id;
         // try{ 

             $enrolmentData = array(
                'student_id'=>$data['student_id'],
                'courseinfo_id'=>$data['courseinfo_id'],
                'is_eligible_mcq_osce'=>$data['is_eligible_mcq_osce'],
                'is_eligible_att'=>$data['is_eligible_att'],
                'is_eligible_letter_ahpra'=>$data['is_eligible_letter_ahpra'],
                'is_id' => $data['is_id'], 
                'company_name' => $data['company_name'],
                'email' => $data['email_address'],
                'contact_number' => $data['contact_number'],
                'country' => $data['country'],
                'message' => $data['message']
                // 'card_holder_name' => $data['type'],
                // 'card_number' => $data['youtube_id'],
                // 'ccv' => $data['enrol_title'],
                // 'card_email' => $data['course_fee'],
                // 'card_expiry_data' => $data['payment_mode']

            );
             
            if ($request->hasFile('eligible_document')) {
              $enrolmentData['eligible_document'] = $this->enrolment->upload($data['eligible_document']);
             }

            if ($request->hasFile('identity_document')) {
                 $enrolmentData['identity_document'] = $this->enrolment->upload($data['identity_document']);
             }
          
            $enrolment = $this->enrolment->save($enrolmentData);

            $courseinfo_id = $this->courseinfo->where('id', $data['courseinfo_id'])->first();
            $apiKey = 'A1001CP4sm20m1yh7NLt2iEDUZYorWLzZ6yignkaLKh560H16+a5s4AhwtKq6H1lAGHyUW';
            $apiPassword = 'MMbKrf8u';
            $apiEndpoint = \Eway\Rapid\Client::MODE_SANDBOX;
            $client = \Eway\Rapid::createClient($apiKey, $apiPassword, $apiEndpoint);

            

           $transaction = [
                'Customer' => [
                'FirstName' => $student_detail->full_name,
                'LastName' => 'Smith',
                'Street1'=>$data['country'],
                'Street2' => $data['suburb'],
                'City' => $student_detail->primary_address,
                'State' => 'NSW',
                'PostalCode'=>$data['postcode'],
                'Country' => 'au',
                'Email' => $student_detail->email,
                'CardNumber'=>$data['card_number'],
                'CompanyName'=>$enrolment->company_name,
                ],
                'RedirectUrl' => route('enrolmentstudent.redirect',$enrolment->id),
                'CancelUrl' => route('enrolmentstudent.cancel'),
                'TransactionType' => \Eway\Rapid\Enum\TransactionType::PURCHASE,
                'Payment' => [
                'TotalAmount' =>$courseinfo_id->course_fee,
                ]
                ];
           
                // Submit data to eWAY to get a Shared Page URL
                $response = $client->createTransaction(\Eway\Rapid\Enum\ApiMethod::RESPONSIVE_SHARED, $transaction);
            
                // Check for any errors
                if (!$response->getErrors()) {

                $sharedURL = $response->SharedPaymentUrl;
                $enrolpaymentData = array(
                'enrolment_id'=>$enrolment->id,
                'sucess'=>0);
               
                $enrolpayment = $this->enrolpayment->save($enrolpaymentData);
                return Redirect::to($sharedURL);
                } else {
                foreach ($response->getErrors() as $error) {
                   // return redirect(route('enrolmentstudent.cancel'));
                 echo "Error: ".\Eway\Rapid::getMessage($error)."";
                }
                die();
                }
           
           alertify()->success('Course Information Created Successfully');
          return redirect(route('enrolment.viewUser'));
        // }
        //   catch(\Throwable $e){
        //     alertify($e->getMessage())->error();
        // }
        
        return redirect(route('enrolment.viewUser'));
    }


    public function cancel()
    {
       return redirect(route('enrolment.viewUser'));
    }
    public function redirect($id)
    {   
        $id = (int)$id;
        $enrolpayment = $this->enrolpayment->where('enrolment_id', $id)->first();

        $apiKey = 'A1001CP4sm20m1yh7NLt2iEDUZYorWLzZ6yignkaLKh560H16+a5s4AhwtKq6H1lAGHyUW';
        $apiPassword = 'MMbKrf8u';
        $apiEndpoint = \Eway\Rapid\Client::MODE_SANDBOX;

        // Create the eWAY Client
        $client = \Eway\Rapid::createClient($apiKey, $apiPassword, $apiEndpoint);

        // Query the transaction result.
        $response = $client->queryTransaction($_GET['AccessCode']);

        $transactionResponse = $response->Transactions[0];

        // Display the transaction result
        if ($transactionResponse->TransactionStatus) {
             $customer = json_decode($transactionResponse->Customer);
             $customer = json_encode($customer);

             $shippingAddress = json_decode($transactionResponse->ShippingAddress);
             $shippingAddress = json_encode($shippingAddress);

            
            $enrolpaymentData = array(
                'transactionID'=>$transactionResponse->TransactionID,
                'totalAmount'=>$transactionResponse->TotalAmount,
                'customer'=>$customer,
                'shippingAddress'=>$shippingAddress,
                'sucess'=>1,
              
                 );   
               
           $enrolpayment = $this->enrolpayment->update($enrolpayment->id, $enrolpaymentData);
       
        'Payment successful! ID: ' .$transactionResponse->TransactionID;
        return redirect(route('enrolmentstudent.sucess', $transactionResponse->TransactionID));

        } 
        else
         {
        $errors = split(', ', $transactionResponse->ResponseMessage);
        foreach ($errors as $error) {
        echo "Payment failed: " .
        \Eway\Rapid::getMessage($error)."
        ";
        }
        }
    }

    public function sucess($transaction_id)
    {
         $data['transaction_id'] = $transaction_id;
         return view('enrolment::sucess',$data);

    }


     public function error($transaction_id)
    {
         $data['transaction_id'] = $transaction_id;
         return view('enrolment::error',$data);

    }

}
