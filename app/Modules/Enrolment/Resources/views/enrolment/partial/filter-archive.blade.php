
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
        {!! Form::open(['route' => 'enrolment.indexArchive', 'method' => 'get']) !!}

        <div class="row">
            <div class="col-md-4">
                <label class="d-block font-weight-semibold">Agent :</label>
                <div class="input-group">
                {!! Form::select('agents', $agents, request('agents') ?? null, ['id'=>'agents','placeholder'=>'Select Agent','class'=>'form-control select-search']) !!}
                </div>
            </div>
            
            <div class="col-md-4">
                <label class="d-block font-weight-semibold">Search Keyword:</label>
                <div class="input-group">
                {!! Form::text('search_value',  request('search_value') ?? null, ['id'=>'search_value','placeholder'=>'Search by name, email','class'=>'form-control']) !!}
                </div>
            </div>

            
        </div>
        <div class="d-flex justify-content-end mt-2">
            <button class="btn bg-primary" type="submit">
                Search Now
            </button>
            <a href="{{ route('enrolment.indexArchive') }}" data-popup="tooltip" data-placement="top"
                data-original-title="Refresh Search" class="btn bg-danger ml-2">
                <i class="icon-spinner9"></i>
            </a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
