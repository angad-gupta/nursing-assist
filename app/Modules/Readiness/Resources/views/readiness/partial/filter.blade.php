
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
        {!! Form::open(['route' => 'readiness.index', 'method' => 'get']) !!}

        <div class="row">
            <div class="col-md-4">
                <label class="d-block font-weight-semibold">Search Keyword:</label>
                <div class="input-group">
                {!! Form::text('search_value',  request('search_value') ?? null, ['id'=>'search_value','placeholder'=>'Search Keyword','class'=>'form-control']) !!}
                </div>
            </div>

            <div class="col-md-4">
                <label class="d-block font-weight-semibold">Select Readiness :</label>
                <div class="input-group">

                    {!! Form::select('readiness_title',[ 'readiness_exam_1'=>'Readiness Exam 1','readiness_exam_2'=>'Readiness Exam 2','readiness_exam_3'=>'Readiness Exam 3','readiness_exam_4'=>'Readiness Exam 4','readiness_exam_5'=>'Readiness Exam 5','readiness_exam_6'=>'Readiness Exam 6','management_of_care'=>'Management of Care','safety_and_infection_control'=>'Safety and Infection Control','health_promotion_and_maintenance'=>'Health Promotion and Maintenance','psychosocial_integrity'=>'Psychosocial Integrity','basic_care_and_comfort'=>'Basic Care and Comfort','pharmacological_and_parenteral_therapies'=>'Pharmacological and Parenteral Therapies','reduction_of_risk_potential'=>'Reduction of Risk Potential','physiological_adaptation'=>'Physiological Adaptation'], $value = null, ['placeholder'=>'Select Readiness','id'=>'readiness_title','class'=>'form-control' ]) !!}   

                </div>
            </div>

        </div>
        <div class="d-flex justify-content-end mt-2">
            <button class="btn bg-primary" type="submit">
                Search Now
            </button>
            <a href="{{ route('readiness.index') }}" data-popup="tooltip" data-placement="top"
                data-original-title="Refresh Search" class="btn bg-danger ml-2">
                <i class="icon-spinner9"></i>
            </a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
