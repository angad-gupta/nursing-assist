
<iframe src="{{asset($resources->file_full_path).'/'.$resources->source_name.'#toolbar=0&navpanes=0'}}" height="100%" width="100%" id="myiframe" onload="injectJS()"></iframe>


<style type="text/css">
#outerContainer #mainContainer div.toolbar {
  display: none !important; /* hide PDF viewer toolbar */
}
#outerContainer #mainContainer #viewerContainer {
  top: 0 !important; /* move doc up into empty bar space */
}

.toolbar {
	display: none !important;
}


</style>

<!-- <embed src="{{asset($resources->file_full_path).'/'.$resources->source_name.'#toolbar=0&navpanes=0&scrollbar=0'}}" height="100%" width="100%" oncontextmenu="return false" > -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
    
    document.addEventListener("contextmenu", function(e){
         e.preventDefault();
    }, false);

});
</script>

<script type="text/javascript">
    function injectJS(){    
        var frame =  $('iframe');
        var contents =  frame.contents();
        var body = contents.find('body').attr("oncontextmenu", "return false");
        var body = contents.find('body').append('<div>New Div</div>');    
    }
</script>