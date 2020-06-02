<div class="card card-body filter-option {{ request('search') && request('search') == 'advance' ? '' : 'd-none' }}">
    {!! Form::open(['method' => 'get', 'route' => 'employee.list']) !!}
    {{ Form::hidden('search', 'advance') }}
    <div class="row">
        <div class="col-md-3">
            <div class="form-group mb-0 pt-1 pb-1 pl-3 pr-3">
                <label class="d-block font-weight-semibold">Select Designation:</label>
                <div class="input-group">
                    {!! Form::select('designation_id[]', $designation, request('designation_id') ?? null, ['class'=>'form-control multiselect-filtering', 'multiple']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-0 pt-1 pb-1 pl-3 pr-3">
                <label class="d-block font-weight-semibold">Select Department:</label>
                <div class="input-group">
                    {!! Form::select('department_id[]', $department, request('department_id') ?? null, ['class'=>'form-control multiselect-filtering', 'multiple']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-0 pt-1 pb-1 pl-3 pr-3">
                <label class="d-block font-weight-semibold">Select Branch:</label>
                <div class="input-group">
                    {!! Form::select('branch_id[]', $branches, request('branch_id') ?? null, ['class'=>'form-control multiselect-filtering', 'multiple']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end pt-1 pb-3 pl-3 pr-3">
        <button class="btn bg-primary" type="submit">
            Search Now
        </button>
    </div>
    {!! Form::close() !!}
</div>