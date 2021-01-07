<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<div style="font-family: 'Roboto', sans-serif;width:595px;margin:40px auto 10px;background-color:#fff;padding:30px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px; border: 1px solid #eee;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <th style="text-align:left;font-size: 22px;">
                INVOICE
            </th>
            <th style="text-align:right;"><img style="max-width: 150px;" src="https://www.nursingeta.com/uploads/setting/2020-06-24-12-01-21-logo.svg" alt="logo"></th>
        </tr>
        </thead>
    </table>

    <table style="width: 100%;">
        <tr>
            <td colspan="2" style="height:18px;"></td>
        </tr>
        <tr>
            <td style="width:33.33%;vertical-align:top">
                <h5 style="font-size: 18px; margin: 0; padding-bottom: 6px;">DATE</h5>
                <p style="margin:0 0 4px 0;padding:0;font-size:18px;">{{date('m/d/Y')}}</p>


                <h5 style="font-size: 18px; margin: 0; padding-bottom: 6px; padding-top: 14px;">INVOICE TO</h5>
                <p style="margin:0 0 4px 0;padding:0;font-size:16px;">{{ ucfirst($enrolment_info->first_name).' '.ucfirst($enrolment_info->last_name)}}</p>
                <p style="margin:0 0 4px 0;padding:0;font-size:16px;">{{$enrolment_info->street1}}</p>
                <p style="margin:0 0 4px 0;padding:0;font-size:16px;">{{$enrolment_info->city}}</p>
                <p style="margin:0 0 4px 0;padding:0;font-size:16px;">{{ $enrolment_info->state.' '.$enrolment_info->postalcode }}</p>
                <p style="margin:0 0 4px 0;padding:0;font-size:16px;">Email: {{ $enrolment_info->email }}</p>
            </td>

            <td style="width:33.33%;vertical-align:top">
                <h5 style="font-size: 18px; margin: 0; padding-bottom: 6px;">INVOICE NO.</h5>
                <p style="margin:0 0 4px 0;padding:0;font-size:14px;">{{$course_info->course_program_title == 'OBA Package' ? 'OBA' : $course_info->course_program_title}}-{{$payment_info->id}}</p>
            </td>

            <td style="width:33.33%;vertical-align:top;text-align: right;">
                <p style="margin:0 0 4px 0;padding:0;font-size:16px;">ABN 88641245187</strong></p>
            </td>
        </tr>
    </table>

    <table style="width: 100%; border-collapse: collapse; margin-top: 30px;">
        <thead>
        <tr>
            <td align="left" style="vertical-align: middle; padding: 10px;">Description</td>
            <td align="left" style="vertical-align: middle; padding: 10px;">Due Date of Payment</td>
            <td align="right" style="vertical-align: middle; padding: 10px;">Unit Price</td>
            <td align="center" style="vertical-align: middle; padding: 10px;">Remark</td>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td align="left" style="font-weight:600;font-size: 16px;border-top: 1px solid #999; vertical-align: middle;padding: 12px 10px; ">
             {{$course_info->course_program_title}} Preparation Class {{$payment_info->status == 'First Installment Paid' ? '(First Installment)' : ($payment_info->status == 'Second Installment Paid' ? '(Second Installment)' : 
             ($payment_info->status == 'Final Installment Paid' ? '(Final Installment)' : ''))}}
            </td>
            <td align="left" style="font-weight:600;font-size: 16px;border-top: 1px solid #999; vertical-align: middle;padding: 12px 10px; ">{{date('d F Y')}}</td>
            <td align="center" style="font-weight:600;font-size: 16px;border-top: 1px solid #999; vertical-align: middle;padding: 12px 10px; ">${{$payment_info->status == 'First Installment Paid' ? '1,500' : ($payment_info->status == 'Second Installment Paid' ? '1,500' : 
             ($payment_info->status == 'Final Installment Paid' ? '2,500' : $payment_info->amount_paid))}}</td>
            <td align="right" style="font-weight:600;font-size: 16px;border-top: 1px solid #999; vertical-align: middle;padding: 12px 10px; ">INC. GST</td>
        </tr>
        </tbody>
    </table>

    <table style="width: 100%;">
        <tbody>
        <tr>
            <td colspan="2" style="height:18px;"></td>
        </tr>
        <tr>
            <td style="width:100%;vertical-align:top;text-align: right;">
                <p style="margin:0 0 6px 0;padding:8px 10px;font-size:16px; border: 1px solid #999;"><strong>Total including GST: ${{$payment_info->status == 'First Installment Paid' ? '1,500' : ($payment_info->status == 'Second Installment Paid' ? '1,500' : 
             ($payment_info->status == 'Final Installment Paid' ? '2,500' : $payment_info->amount_paid))}}</strong></p>
            </td>
        </tr>
        </tbody>
    </table>
    <table style="width: 100%;">
        <tr>
            <td colspan="2" style="height:18px;"></td>
        </tr>
        <tr>
            <td style="width:48%;vertical-align:top; border: 3px solid #6c5ce7; padding: 10px;">
                <h5 style="font-size: 16px; margin: 0; padding-bottom: 4px;">For Direct Deposit</h5>
                <p style="margin:0 0 4px 0;padding:0;font-size:15px;"><span style=" font-weight: 500;">Account Name:</span> NURSING EDUCATION & TRAINING AUSTRALIA PTY LTD</p>
                <p style="margin:0 0 4px 0;padding:0;font-size:15px; font-weight: 500;">BSB: 062 692</p>
                <p style="margin:0 0 4px 0;padding:0;font-size:15px; font-weight: 500;">Account Number: 40670654</p>
            </td>

            <td style="width:52%;vertical-align:top"></td>

        </tr>
    </table>

    <p style="margin-top: 28px; font-size: 10px; color: #444;">Thank you for your business with us.</p>
    <p style="margin-top: 0; font-size: 10px; color: #444;">QUESTIONS? Contact Nursing Education & Training Australia Pty Ltd on
        <a href="" style="color: #0984e3;">accounts@nursingETA.com</a> or call at 1300 00 6382</p>
</div>


</body>
</html>