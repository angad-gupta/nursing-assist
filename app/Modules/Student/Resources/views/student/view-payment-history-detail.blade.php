<table class='table table-striped mb30' id='table1' cellspacing='0' width='100%' frame='box'>
  <thead>
   <tr class="text-dark alpha-violet">
    <th>Student Name</th>
    <td>{{optional($paymentInfo->studentInfo)->full_name }}</td>
    <th>Course</th>
    <td>{{optional($paymentInfo->courseInfo)->course_program_title }}</td> 
    <th>Total Course Payment</th>
    <td>{{optional($paymentInfo->courseInfo)->course_fee }}</td>
  </tr>
</thead>
<tbody>
  <tr>
    <th colspan="6" class="text-dark"> Payment History List</th>
  </tr>

@if($historyDetail)
    @foreach($historyDetail as $key=> $value)
      <tr>
        <th>Date : </th>
        <td>{{ $value->date }}</td>
        <th>Amount Paid : </th>
        <td>${{ $value->amount_paid }}</td>
        <th></th>
        <th></th>
      </tr>
    @endforeach
@endif

 

</tbody>
</table>
