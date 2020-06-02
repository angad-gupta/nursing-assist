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
    <td class='text-success font-weight-bold'>First Name : </td>
    <td>{{ $appuser->first_name }}</td>
    <td class='text-success font-weight-bold'>Last Name : </td>
    <td>{{ $appuser->last_name }}</td>
    <td class='text-success font-weight-bold'>Email : </td>
    <td>{{ $appuser->email }}</td>
  </tr>

  <tr>
    <td class='text-success font-weight-bold'>Mobile No. : </td>
    <td>{{ $appuser->phone }}</td>
    <td class='text-success font-weight-bold'>Enquiry : </td>
    <td>{{ $appuser->enquiry_about }}</td>
    <td class='text-success font-weight-bold'>Message : </td>
    <td>{{ $appuser->message }}</td>
  </tr>

</tbody>
</table>