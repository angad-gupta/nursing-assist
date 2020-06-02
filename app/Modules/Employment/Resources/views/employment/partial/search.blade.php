<div class="form-group row">
    <div class="col-lg-9">
        {{--{!! Form::text('search_value', null, array('placeholder' => 'Enter Item Name','class' => 'form-control','id'=>'search_text')) !!}--}}
         {!! Form::text('search_value', $value = null, ['id'=>'search_value','placeholder'=>'Search Employee','class'=>'typeahead tt-query form-control','autocomplete'=>'off', 'spellcheck'=>'false']) !!}
    </div>
    <div class="col-lg-3">
        <button type="submit" class="btn bg-teal-400"><i class="icon-search4"></i></button>
    </div>
</div>
