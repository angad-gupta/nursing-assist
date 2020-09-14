
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
        {!! Form::open(['route' => 'mockup.index', 'method' => 'get']) !!}

        <div class="row">
            <div class="col-md-4">
                <label class="d-block font-weight-semibold">Search Keyword:</label>
                <div class="input-group">
                {!! Form::text('search_value',  request('search_value') ?? null, ['id'=>'search_value','placeholder'=>'Search Keyword','class'=>'form-control']) !!}
                </div>
            </div>

            <div class="col-md-4">
                <label class="d-block font-weight-semibold">Select Mockup Week:</label>
                <div class="input-group">

                {!! Form::select('mockup_title',[ 'mockup_test_week_1'=>'Mockup Test Week 1','mockup_test_week_2'=>'Mockup Test Week 2','mockup_test_week_3'=>'Mockup Test Week 3','mockup_test_week_4'=>'Mockup Test Week 4','mockup_test_week_5'=>'Mockup Test Week 5','mockup_test_week_6'=>'Mockup Test Week 6','mockup_test_week_7'=>'Mockup Test Week 7','mockup_test_week_8'=>'Mockup Test Week 8', 'add_practice_test_1'=>'Additional Practice Tests 1', 'add_practice_test_2'=>'Additional Practice Tests 2', 'add_practice_test_3'=>'Additional Practice Tests 3'], $value = request('mockup_title') ?? null, ['placeholder'=>'Select Mockup Week','id'=>'mockup_title','class'=>'form-control' ]) !!}

                </div>
            </div>

        </div>
        <div class="d-flex justify-content-end mt-2">
            <button class="btn bg-primary" type="submit">
                Search Now
            </button>
            <a href="{{ route('mockup.index') }}" data-popup="tooltip" data-placement="top"
                data-original-title="Refresh Search" class="btn bg-danger ml-2">
                <i class="icon-spinner9"></i>
            </a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
