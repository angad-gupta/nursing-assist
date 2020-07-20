@extends('admin::layout')
@section('title') Contact Detail @stop
@section('breadcrum') Contact Detail @stop
@section('script')

<script type="text/javascript">
    $('document').ready(function () {

        $('.delete_contact').on('click', function () {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

        $('.update_status').on('click', function () {
            var contact_id = $(this).attr('contact_id');
            $('.contact_id').val(contact_id);
        });

        $('.view_detail').on('click', function () {
            var assessment_id = $(this).attr('assessment_id');
            $.ajax({
                type: 'GET',
                // dataType: 'HTML',
                url: '/admin/contactus/viewUser',
                data: {
                    id: assessment_id
                },
                success: function (data) {
                    $('.result_view_recommend_detail').html(data.options);
                }
            });

        });
    });
</script>

@stop
@section('content')

<div class="card card-body">
    <div class="d-flex justify-content-between">
        <h4>List of Contact Detail</h4>
    </div>
    <div class="mb-3 mt-3"></div>
    <div class="table-responsive table-card">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile No.</th>
                    <th>Enquiry</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($contactus->total() != 0)
                @foreach($contactus as $key => $value)
                <tr>
                    <td>{{$contactus->firstItem() +$key}}</td>
                    <td>{{ $value->first_name .' '. $value->last_name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->phone }}</td>
                    <td>{{ $value->enquiry_about }}</td>
                    <td>{{ $value->status }}</td>
                    <td>{{ date('jS M, Y', strtotime($value->created_at)) }}</th>
                    <td>
                        @if($value->status == 'Pending')
                        <a data-toggle="modal" data-target="#modal_theme_status"
                            class="btn bg-success-400 btn-icon rounded-round update_status"
                            contact_id="{{ $value->id }}" data-popup="tooltip"
                            data-original-title="Status Update" data-placement="bottom"><i
                                class="icon-flip-horizontal2"></i></a>
                        @endif
                        <a data-toggle="modal" data-target="#modal_theme_view_info"
                            class="btn bg-warning-400 btn-icon rounded-round view_detail" assessment_id="{{$value->id}}"
                            data-popup="tooltip" data-original-title="View Detail" data-placement="bottom"><i
                                class="icon-eye"></i></a>
                        <a data-toggle="modal" data-target="#modal_theme_warning"
                            class="btn bg-danger-400 btn-icon rounded-round delete_contact"
                            link="{{route('contactus.delete',$value->id)}}" data-popup="tooltip"
                            data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No Contact Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>
    </div>
    <div class="col-12">
        <span class="float-right pagination align-self-end mt-3">
            {{ $contactus->links() }}
        </span>
    </div>
</div>


<!-- Warning modal -->
<div id="modal_theme_view_info" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header bg-teal">
                <h6 class="modal-title">View Contact Detail</h6>
            </div>

            <div class="modal-body">
                <div class="table-responsive result_view_recommend_detail">

                </div><!-- table-responsive -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn bg-teal-400" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- warning modal -->

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

<!-- Warning modal -->
<div id="modal_theme_status" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Update Status</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'contactus.updateStatus','method'=>'POST','id'=>'updateStatus_submit','class'=>'form-horizontal','role'=>'form']) !!}
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Status:</label>
                    <div class="col-lg-9">
                        {!! Form::select('status',['Replied'=>'Replied'], $value = null, ['id'=>'status','class'=>'form-control']) !!}
                    </div>

                    {!! Form::hidden('contact_id', '',['class'=>'contact_id']) !!}

                </div>
                <div class="text-right">
                    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i
                                class="icon-database-insert"></i></b> Update</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- /warning modal -->

@endsection
