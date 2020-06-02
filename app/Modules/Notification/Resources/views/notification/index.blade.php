@extends('admin::layout')
@section('title')Notification @stop
@section('breadcrum')Notification @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content')

  {{-- Start of Advance Filter Shyam --}}
    <div class="card card border-light-600 bg-light">
        <div class="bg-purple-400 card-header header-elements-inline border-bottom-0">
            <h5 class="card-title text-uppercase font-weight-semibold">Advance Filter</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>

    <div class="card-body">
    {!! Form::open(['route' => ['tipsinformation.index'], 'method' => 'get']) !!}
    <div class="row">


          <div class="col-md-3 search_append_brand">
            <label class="d-block font-weight-semibold">Select Language:</label>
            <div class="input-group">
                <span class="input-group-prepend">
                            <span class="input-group-text"><i class="text-blue icon-pencil6"></i>
                            </span>
                        </span>
                     @php
                     $lang_flag = (array_key_exists('lang_flag',$search_value)) ? $search_value['lang_flag'] : '';
                    @endphp
                    {!! Form::select('lang_flag',[ 'eng'=>'English','nep'=>'Nepali'], $value = $lang_flag, ['id'=>'lang_flag','placeholder'=>'Select Language','class'=>'form-control' ]) !!}

            </div>
        </div>


    </div>

    <div class="d-flex justify-content-end mt-2">
        <button class="btn bg-success-600 btn-labeled btn-labeled-left" type="submit">
            <b><i class="icon-pen-plus"></i></b>Search Now
        </button>
        <a href="{{ route('tipsinformation.index') }}" data-popup="tooltip" data-placement="top" data-original-title="Refresh Search" class="btn bg-danger ml-2">
            <i class="icon-spinner9"></i>
        </a>
    </div>

    {!! Form::close() !!}
    </div>
</div>

{{-- End of Advance Filter Shyam --}}


<div class="card card-body">
    <div class="d-flex justify-content-between">
        <h4>List of Tips & Information</h4>
        <a href="{{ route('tipsinformation.create') }}" class="btn bg-blue">
            <i class="icon-plus2"></i> Add Tips & Information
        </a>
    </div>

    <div class="mb-3 mt-3"></div>
    <div class="table-responsive table-card">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Pdf</th>
                    <th>Language</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($tipsinformation->total() != 0)
                @foreach($tipsinformation as $key => $value)
                <tr>
                    <td>{{$tipsinformation->firstItem() +$key}}</td>
                    <td>{{ $value->title }}</td>
                    <td>
                        @if(!is_null($value->image_path) && file_exists(public_path('uploads/tipsInfo').'/'.$value->image_path))
                            <a  target="_blank" href="{{ asset('uploads/tipsInfo').'/'.$value->image_path }}"><img src="{{ asset('uploads/tipsInfo').'/'.$value->image_path }}" style="width: 50px;"></a>
                        @else
                            <a  target="_blank" href="{{ asset('admin/image.png')}}"><img src="{{ asset('admin/image.png') }}" style="width: 50px;"></a>
                        @endif
                    </td>

                    <td>
                        @php
                        $ext = (!is_null($value->pdf_path) && file_exists(public_path('uploads/tipsInfo').'/'.$value->pdf_path)) ? pathinfo($value->pdf_path, PATHINFO_EXTENSION) : NULL;

                        if($ext == 'pdf'){
                            $image =  asset('admin/pdf.jpg');
                            $imagepath = asset('uploads/tipsInfo').'/'.$value->pdf_path;
                       }else{
                            $image =  asset('admin/pdf.jpg');
                            $imagepath = asset('admin/pdf.jpg');
                        }
                        @endphp

                        <a href="{{ $imagepath }}" target="_blank"><img src="{{ $image }}" style="width: 50px;"></a>

                    </td>
                    <td>{{ ($value->lang_flag == 'eng') ? 'English' : 'Nepali' }}</td>

                    <td>
                        <a class="btn bg-info btn-icon rounded-round" href="{{ route('tipsinformation.edit',$value->id) }}" data-popup="tooltip" data-placement="bottom" data-original-title="Edit Tips & Information"><i class="icon-pencil"></i></a>

                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger btn-icon rounded-round delete_tipsinformation" link="{{route('tipsinformation.delete',$value->id)}}" data-popup="tooltip" data-placement="bottom" data-original-title="Delete"><i class="icon-bin"></i></a>

                    </td>

            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="4">No Tips & Information Found !!!</td>
            </tr>
            @endif
        </tbody>

    </table>
</div>
<div class="col-12">
    <span class="float-right pagination align-self-end mt-3">
        {{ $tipsinformation->links() }}
    </span>
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
    $('document').ready(function() {

        $('.delete_tipsinformation').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });
    });

</script>

@endsection
