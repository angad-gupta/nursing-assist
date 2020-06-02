<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/global/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">

    <!-- Core JS files -->
    <script src="{{asset('admin/global/js/main/jquery.min.js')}}"></script>

    <style type="text/css" media="print">
        @page {
            size: auto;   /* auto is the initial value */
            margin: 0;  /* this affects the margin in the printer settings */
        }
    </style>
</head>
<body class="card" style="font-size: large;">
    <div class="card-header header-elements-inline">
        <center>
            <h1>
                <b>{{ $employee->full_name }}</b>
            </h1>
        </center>
    </div>
    <div class="card-body ml-4 mr-4">
        <table class='table table-striped mb30' id='table1' cellspacing='0' width='100%' frame='box'>
        <tbody>
        <tr>
        <td colspan='4'><h3>Employee Detail</h3></td>
        </tr>

        <tr>
        <td class='text-success'>Employee ID : </td><td>{{ $employee->employee_id }}</td>
        <td class='text-success'>Name : </td><td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
        </tr>
        <tr>
        <td class='text-success'>Mobile</td>
        <td>{{ $employee->mobile }}</td>
        <td class='text-success'>Address</td>
        <td>{{ $employee->address }}</td>
        </tr>
        <tr>
        <td class='text-success'>Designation</td>
        <td>{{ optional($employee->designation)->dropvalue }}</td>
        <td class='text-success'>Department</td>
        <td>{{ optional($employee->department)->dropvalue }}</td>
        </tr>

        <tr>
        <td class='text-success'>Join Date</td>
        <td>{{ $employee->join_date }}</td>
        <td class='text-success'>Salary</td>
        <td>{{ $employee->salary }}</td>
        </tr>

        </tbody>
        </table>

        <table class='table table-striped mb30' id='table1' cellspacing='0' width='100%' frame='box'>
        <tbody>

        <tr>
        <td colspan='4'><h3>Personal Detail</h3></td>
        </tr>

        <tr>
        <td class='text-success'>Gender : </td>
        <td>{{ $gender }}</td>
        <td class='text-success'>Marital Status : </td>
        <td>{{ $maritalStatus }}</td>
        </tr>

        <tr>
        <td class='text-success'>Date of Birth : </td>
        <td>{{ $employee->dob }}</td>
        <td class='text-success'>Citizenship Number : </td>
        <td>{{ $employee->citizenship_no }}</td>
        </tr>

        <tr>
        <td class='text-success'>City/Suburb : </td>
        <td>{{ $employee->city }}</td>
        <td class='text-success'>State/Province : </td>
        <td>{{ optional($employee->province)->dropvalue }}</td>
        </tr>

        <tr>
        <td class='text-success'>Country : </td>
        <td>{{ $country }}</td>
        <td class='text-success'>Personal Email : </td>
        <td>{{ $employee->personal_email }}</td>
        </tr>
        @if ($familyMembers)
            <tr>
            <td colspan='4'><h3>Family Detail</h3></td>
            </tr>
            @foreach ($familyMembers as $key => $member)
                <tr>
                <td class='text-success'>Name<small> (Relation)</small> : </td>
                <td>{{ $member->family_name }} <small>({{ $member->getFamilyRelation->dropvalue }})</small></td>
                <td class='text-success'>Phone : </td>
                <td>{{ $member->phone }}</td>
                </tr>
            @endforeach
        @endif

        </tbody>
        </table>
        <br>
        <button class="btn btn-primary float-right" type="button" onclick="print_mrf();">
            <i class="icon-printer"></i> Print / Save As PDF
        </button>
    </div>

    <script>
        function print_mrf()
        {
            $('.btn').hide();
            window.print();
            $('.btn').show();
        }
    </script>
</body>
</html>