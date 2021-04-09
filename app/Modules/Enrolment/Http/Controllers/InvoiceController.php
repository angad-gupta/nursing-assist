<?php

namespace App\Modules\Enrolment\Http\Controllers;

use App\Modules\Enrolment\Repositories\InvoiceLogInterface;
use App\Modules\Student\Repositories\StudentInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Notifications\ResendEnrolmentPaymentInvoice;

class InvoiceController extends Controller
{
    /**
     * @var InvoiceLogInterface
     */
    protected $invoiceLog;
    /**
     * @var StudentInterface
     */
    protected $student;

    public function __construct(InvoiceLogInterface $invoiceLog, StudentInterface $student)
    {
        $this->invoiceLog = $invoiceLog;
        $this->student = $student;
    }
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $data['invoice_logs'] = $this->invoiceLog->findAll(50, $search);
        return view('enrolment::invoice.logs', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('enrolment::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('enrolment::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('enrolment::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendInvoice($id)
    {
        //$data = $request->all();
        try { 
            $log = $this->invoiceLog->find($id);
            $studentInfo = $this->student->find($log->student_id);

            $studentInfo->notify(new ResendEnrolmentPaymentInvoice($log));
            alertify()->success('Invoice Sent Successfully!');

         } catch (\Throwable $e) {
            alertify()->error($e->getMessage());
        }

        return redirect(route('invoice.logs'));
    }
}
