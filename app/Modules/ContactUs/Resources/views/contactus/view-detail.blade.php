<table class='table table-striped mb30' id='table1' cellspacing='0' width='100%' >
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
    <td>{{ $contactus->first_name }}</td>
    <td class='text-success font-weight-bold'>Last Name : </td>
    <td>{{ $contactus->last_name }}</td>
    <td class='text-success font-weight-bold'>Email : </td>
    <td>{{ $contactus->email }}</td>
  </tr>

  <tr>
    <td class='text-success font-weight-bold'>Mobile No. : </td>
    <td>{{ $contactus->phone }}</td>
    <td class='text-success font-weight-bold'>Enquiry : </td>
    <td>{{ $contactus->enquiry_about }}</td>

  </tr>

  <tr>
    <td class='text-success font-weight-bold'>Message : </td>
    <td>{{ $contactus->message }}</td>
  </tr>
  <tr>
  <td class='text-warning font-weight-bold'>Replied Message : </td>
  <td>{{ $contactus->reply_message }}</td>
  </tr>

</tbody>
</table>