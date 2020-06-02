<div class="form-group row">
    <label class="col-form-label col-lg-3">Role:</label>
    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
        @if(count($roles) > 0)
        @foreach($roles as $key => $role)

        {{ Form::checkbox('role[]',$role->id,in_array($role->id,$user->role->pluck('id','name')->toArray())) }}

        {{$role->name}}

        @endforeach
        @else
        No Role Found
        @endif
    </div>
</div>