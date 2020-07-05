<table class='table table-striped mb30' id='table1' cellspacing='0' width='100%' frame='box'>
  <thead>
   <tr>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
  </tr>
</thead>
<tbody>
   @php
    $eligible_doc = ($enrolment->eligible_document) ? asset($enrolment->file_full_path).'/'.$enrolment->eligible_document : asset('admin/default.png');
    $id_doc = ($enrolment->identity_document) ? asset($enrolment->file_full_path).'/'.$enrolment->identity_document : asset('admin/default.png');
    @endphp
  <tr>
    <td class='text-success font-weight-bold'>Student Name : </td>
    <td>{{ optional($enrolment->student)->full_name }}</td>
    <td class='text-success font-weight-bold'>Couse Info : </td>
    <td>{{ optional($enrolment->Courseinfo)->course_program_title }}</td>
    <td class='text-success font-weight-bold'>Is Eligible Mcq Osce ? : </td>
    <td>{{ ($enrolment->is_eligible_mcq_osce == 1) ? 'Yes' : 'No' }}</td>
  </tr>

  <tr>
     <td class='text-success font-weight-bold'>Is Eligible Mcq Osce ? : </td>
     <td>{{ ($enrolment->is_eligible_mcq_osce == 1) ? 'Yes' : 'No' }}</td>
     <td class='text-success font-weight-bold'>Is Eligible Att ? : </td>
     <td>{{ ($enrolment->is_eligible_att == 1) ? 'Yes' : 'No' }}</td>
     <td class='text-success font-weight-bold'>Is Eligible Letter Ahpra ? : </td>
     <td>{{ ($enrolment->is_eligible_letter_ahpra == 1) ? 'Yes' : 'No' }}</td>
  </tr>

    <tr>
     <td class='text-success font-weight-bold'>Eligible Document : </td>
     <td><a href="{{$eligible_doc}}" target="_blank"><img height="50px" width="50px"  src="{{ $eligible_doc }}"></a></td>
     <td class='text-success font-weight-bold'>Is Identity Document ? : </td>
     <td>{{ ($enrolment->is_id == 1) ? 'Yes' : 'No' }}</td>
     <td class='text-success font-weight-bold'>Identity Document : </td>
     <td><a href="{{$id_doc}}" target="_blank"><img height="50px" width="50px" src="{{$id_doc}}"></a></td>
  </tr>

  <tr>
    <td class='text-success font-weight-bold'>First Name : </td>
    <td>{{ $enrolment->first_name }}</td>
    <td class='text-success font-weight-bold'>Last Name : </td>
    <td>{{ $enrolment->last_name }}</td>
    <td class='text-success font-weight-bold'>Street: </td>
    <td>{{ $enrolment->street1 }}</td>
  </tr>

  <tr>
    <td class='text-success font-weight-bold'>Street 2: </td>
    <td>{{ $enrolment->street2 }}</td>
    <td class='text-success font-weight-bold'>City : </td>
    <td>{{ $enrolment->city }}</td>
    <td class='text-success font-weight-bold'>State: </td>
    <td>{{ $enrolment->state }}</td>
  </tr>

  <tr>
    <td class='text-success font-weight-bold'>Postal Code: </td>
    <td>{{ $enrolment->postalcode }}</td>
    <td class='text-success font-weight-bold'>Country : </td>
    <td>{{ ucfirst($enrolment->country) }}</td>
    <td class='text-success font-weight-bold'>Email: </td>
    <td>{{ $enrolment->email }}</td>
  </tr>  

  <tr>
    <td class='text-success font-weight-bold'>Phone: </td>
    <td>{{ $enrolment->phone }}</td>
    <td class='text-success font-weight-bold'>Intake Date: </td>
    <td>{{ $enrolment->intake_date }}</td>
    <td class='text-success font-weight-bold'>Payment Status : </td>
    <td>{{ ($enrolment->payment_status == '1') ? 'Paid' : 'Pending Payment' }}</td>
  </tr>

</tbody>
</table>
