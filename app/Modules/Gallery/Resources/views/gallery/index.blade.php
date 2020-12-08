@extends('admin::layout')
@section('title')Albums @stop
@section('breadcrum')Albums @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content')

<div class="card">
    <div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
        <a href="{{ route('gallery.create')}}" class="btn bg-teal-400"><i class="icon-arrow-right16"></i> Add Albums</a>
    </div>
</div>

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Albums</h5>

    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Thumbnail Image</th>
                    <th>Album Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($gallery->total() != 0)
                @foreach($gallery as $key => $value)
                @php
                    $image = ($value->thumbnail_image) ? asset($value->file_full_path).'/'.$value->thumbnail_image : asset('admin/default.png');
                @endphp

                <tr>
                    <td>{{$gallery->firstItem() +$key}}</td>
                    <td><a target="_blank" href="{{ $image }}"><img src="{{ $image }}" style="width: 50px;"></a></td>
                    <td>{{ $value->album_title }}</td>
                    <td>{{ $value->date }}</td>
                    <td class="{{ ($value->status == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">{{ ($value->status == '1') ? 'Enabled' :'Disabled' }}</td>
                    <td>
                        <a class="btn bg-teal-400 btn-icon rounded-round" href="{{route('gallery.edit',$value->id)}}" data-popup="tooltip" data-original-title="Edit" data-placement="bottom"><i class="icon-pencil6"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No Albums Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>
        <span style="margin: 5px;float: right;">
            @if($gallery->total() != 0)
            {{ $gallery->links() }}
            @endif
        </span>
    </div>
</div>


@endsection
