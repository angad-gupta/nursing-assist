@extends('admin::layout')
@section('title') Contact Detail @stop
@section('breadcrum') Contact Detail @stop

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
                
                    <td>
                         <a data-toggle="modal" data-target="#modal_theme_view_info" class="btn bg-danger-400 btn-icon rounded-round view_detail" assessment_id="{{$value->id}}" data-popup="tooltip" data-original-title="View Detail" data-placement="bottom"><i class="icon-eye"></i></a>

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


<script type="text/javascript">
    $('document').ready(function() {

        $('.delete_recommend').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

        $('.view_detail').on('click',function(){ 
            var assessment_id = $(this).attr('assessment_id');

               
               $.ajax({
                type: 'GET',
                // dataType: 'HTML',
                url: '/admin/contactus/viewUser',
                data: {
                    id: assessment_id
                },

                success: function(data) {
                    $('.result_view_recommend_detail').html(data.options);
                }
            });
               
         });


    });

</script>

@endsection
