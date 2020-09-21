@extends('admin::layout')
@section('title')Registered Student @stop
@section('breadcrum')Registered Student @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>

@stop

@section('content')


<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Registered Student</h5>
 

    </div>

    <div class="table-responsive">
        <table class="table table-striped" id="headerTable">
            <thead>
                <tr class="bg-slate">
                    <th class="no-sort">Profile Pic</th>
                    <th >Full Name</th>
                    <th class="no-sort">Username</th>
                    <th class="no-sort">Email Address</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody>
                @if($student->total() != 0)
                @inject('enrol_repo', '\App\Modules\Enrolment\Repositories\EnrolmentRepository')

                @foreach($student as $key => $value)
                @php 
                $image = ($value->profile_pic) ? asset($value->file_full_path).'/'.$value->profile_pic : asset('admin/default.png');
                $is_enrol = $enrol_repo->countStudentEnrol($value->id);

                if($is_enrol == 0){   
                @endphp
                    <tr>
                        <td><a target="_blank" href="{{ $image }}"><img src="{{ $image }}" style="width: 50px;"></a></td>
                        <td>{{ $value->full_name }}</td>
                        <td>{{ $value->username }}</td>
                        <td>{{ $value->email }}</td>
                        <!-- <td>
                            <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger-400 btn-icon rounded-round delete_student" link="{{route('registration.delete',$value->id)}}" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                        </td> -->
                    </tr>
                @php } @endphp

                @endforeach
                @else
                <tr>
                    <td colspan="7">No Registered Student Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

    </div>
</div>



<!-- Warning modal -->
<div id="modal_theme_warning" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <i class="icon-alert text-danger icon-3x"></i>
                </center>
                <br>
                <center>
                    <h2>Are You Sure Want To Delete ?</h2>
                    <a class="btn btn-success get_link" href="">Yes, Delete It!</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- /warning modal -->

<script type="text/javascript">
    $('document').ready(function () {
        $('.delete_student').on('click', function () {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });
    });
</script>

@endsection
