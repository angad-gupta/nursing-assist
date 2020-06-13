  <div class="appendDaily">
        <div class="form-group row">

            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-list3"></i>
                                </span>
                            </span>
                            {!! Form::text('subject_title[]', $value = null, ['id'=>'subject_title','placeholder'=>'Enter Subject Title','class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-lg-2">
                <div class="row">
                    <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-image-compare"></i>
                                </span>
                            </span>
                       {!! Form::select('topic_type[]',[ 'pdf'=>'Pdf','video'=>'Video'], $value = null, ['placeholder'=>'Select Type','id'=>'topic_type','class'=>'topic_type form-control' ]) !!}   

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-2 topic_video" style="display: none">
                <div class="row">
                    <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-play"></i>
                                </span>
                            </span>
                            {!! Form::text('video_id[]', $value = null, ['id'=>'video_id','placeholder'=>'Enter Youtube Id','class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-lg-2 topic_pdf" style="display: none">
                <div class="row">
                    <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-list3"></i>
                                </span>
                            </span>
                              {!! Form::file('pdf_path[]', ['id'=>'pdf_path','class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 topic_pdf" style="display: none">
                <div class="row">
                    <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                        <img id="pdf_path" src="{{ asset('admin/pdf.jpg') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                    </div>
                </div>
            </div>

            <div class="col-lg-2">
               <div class="row">
            <button type="button" class="ml-2 remove_plan btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript">
    $(document).ready(function(){ 

        $('.topic_type').on('change',function(){
            var type = $(this).val();

            if(type == 'pdf'){
                $(this).parent().parent().parent().parent().parent().find('.topic_pdf').show();
                $(this).parent().parent().parent().parent().parent().find('.topic_video').hide();
            }else{
                $(this).parent().parent().parent().parent().parent().find('.topic_pdf').hide();
                $(this).parent().parent().parent().parent().parent().find('.topic_video').show();
            }

        }); 



         $('.remove_plan').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });
        
    });
</script>



