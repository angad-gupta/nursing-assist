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
  <tr>
    <td class='text-success font-weight-bold'>Company Name : </td>
    <td>{{ $enrolment->company_name }}</td>
    <td class='text-success font-weight-bold'>Email : </td>
    <td>{{ $enrolment->email }}</td>
    <td class='text-success font-weight-bold'>Mobile No. : </td>
    <td>{{ $enrolment->contact_number }}</td>
  </tr>

  <tr>
    <td class='text-success font-weight-bold'>Country : </td>
    <td>{{ $enrolment->country }}</td>
    <td class='text-success font-weight-bold'>Intake Date : </td>
    <td colspan="3" >{{ $enrolment->intake_date }}</td>
  </tr>

</tbody>
</table>