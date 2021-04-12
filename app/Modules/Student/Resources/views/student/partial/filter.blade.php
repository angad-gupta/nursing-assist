
<div class="card">
    <div class="bg-warning card-header header-elements-inline border-bottom-0">
        <h5 class="card-title text-uppercase font-weight-semibold">Advance Filter</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'student.index', 'method' => 'get']) !!}

        <div class="row">
            <div class="col-md-4">
                <label class="d-block font-weight-semibold">Search Keyword:</label>
                <div class="input-group">
                {!! Form::text('search_value',  request('search_value') ?? null, ['id'=>'search_value','placeholder'=>'Search Keyword','class'=>'form-control']) !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                    <label class="d-block font-weight-semibold">Intake Year :</label>
                    <div class="input-group">    
                    {!! Form::select('intake_year', $years, request('intake_year') ?? null, ['id'=>'intake_year','placeholder'=>'Select Intake Year','class'=>'form-control']) !!}
                    </div>
                    </div>
          
                    <div class="col-md-6">
                    <label class="d-block font-weight-semibold">Intake Month :</label>
                    <div class="input-group">
                    {!! Form::select('intake_date', $months, request('intake_date') ?? null, ['id'=>'intake_date','placeholder'=>'Select Intake Month','class'=>'form-control']) !!}
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <label class="d-block font-weight-semibold">Referring Agency :</label>
                <div class="input-group">
                {!! Form::select('agent_id', $agents, request('agent_id') ?? null, ['id'=>'agent_id','placeholder'=>'Select Referring Agency','class'=>'form-control select-search']) !!}
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <button class="btn bg-primary" type="submit">
                Search Now
            </button>
            <a href="{{ route('student.index') }}" data-popup="tooltip" data-placement="top"
                data-original-title="Refresh Search" class="btn bg-danger ml-2">
                <i class="icon-spinner9"></i>
            </a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
