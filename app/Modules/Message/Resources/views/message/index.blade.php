@extends('admin::layout')
@section('title')Message @stop
@section('breadcrum')Message @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Message</h5>

    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Sent By</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($message->total() != 0) 
                @foreach($message as $key => $value)
                <tr>
                    <td>{{$message->firstItem() +$key}}</td>
                    <td>{{ date('Y-m-d',strtotime($value->created_at)) }}</td>
                    <td>{{ date('H:i A',strtotime($value->created_at)) }}</td>
                     <td>{{ optional($value->MessageSent)->full_name }}</td>
                     <td>{{ $value->title }}</td>
                     <td>{{ substr($value->message,0,15) }}...</td>
                     
                     <td class="{{ ($value->status == 'Replied') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">{{ ($value->status == 'Replied') ? 'Replied' :'Pending' }}</td>
                     <td>

                    <a data-toggle="modal" data-target="#modal_view_warning" class="btn bg-warning-400 btn-icon rounded-round view_message" message_id="{{$value->id}}" data-popup="tooltip" data-original-title="View Message" data-placement="bottom"><i class="icon-eye"></i></a>

                    @if($value->status !== 'Replied')
                    <a data-toggle="modal" data-target="#modal_reply_warning" class="btn bg-success-400 btn-icon rounded-round reply_message" message_id="{{$value->id}}" data-popup="tooltip" data-original-title="Reply" data-placement="bottom"><i class="icon-bubbles4"></i></a>
                    @endif
                    <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger-400 btn-icon rounded-round delete_message" link="{{route('message.delete',$value->id)}}" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5">No Message Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($message->total() != 0)
                {{ $message->links() }}
            @endif
            </span>
    </div>
</div>

    <!-- Warning modal -->
    <div id="modal_view_warning" class="modal fade" tabindex="-1">
         <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h6 class="modal-title">View Message</h6>
                </div>

                <div class="modal-body">
                    <div class="table-responsive result_view_detail">  
                    </div>
                </div>

                <div class="modal-footer">
                        <button type="button" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left" data-dismiss="modal"><b><i class="icon-cross2"></i></b> Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->


<div id="modal_reply_warning" class="modal fade in" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-teal-400">
                <h5 class="modal-title">Reply To Student </h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                 {!! Form::open(['route'=>'message.reply', 'method'=>'POST','class'=>'form-horizontal','role'=>'form' ,'files' => true]) !!}
        

                     {{ Form::hidden('message_id', '',array('class'=>'message_id')) }}
                        <fieldset class="mb-3">
                            <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

                            <div class="form-group row">
                                <label class="col-form-label col-lg-3">Reply Message:</label>
                                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-bubble-lines4"></i></span>
                                        </span>
                                        {!! Form::textarea('message', null, ['id'=>'message','placeholder'=>'Enter Reply Message','class'=>'form-control','required']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit"  class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b>Reply</button>
                            </div>

                        </fieldset>


        
                {!! Form::close() !!}

            </div>
        </div>
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

<!-- /warning modal -->

    
<script type="text/javascript">
    $('document').ready(function() {

        $('.view_message').on('click',function(){ 
        var message_id = $(this).attr('message_id');

            $.ajax({
                type: 'GET',
                url: "<?php echo route('ajax-view-message-detail') ?>",
                data: { message_id: message_id },

                success: function (data) { 
                    console.log(data);
                    $('.result_view_detail').html(data);
                }
            }); 
        });

        $('.reply_message').on('click',function(){
             var message_id = $(this).attr('message_id');
             $('.message_id').val(message_id);
        });

        $('.delete_message').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });
    });

</script>

@endsection