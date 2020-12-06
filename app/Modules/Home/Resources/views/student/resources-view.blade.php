
<html>
<head>
<title></title>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/jscript">
  function disableContextMenu()
  {
    window.frames["fraDisabled"].document.oncontextmenu = function(){alert("No way!"); return false;};   
    // Or use this
    // document.getElementById("fraDisabled").contentWindow.document.oncontextmenu = function(){alert("No way!"); return false;};;    
  }  
</script>
</head>
<body bgcolor="#FFFFFF" onload="disableContextMenu();" oncontextmenu="return false">
<iframe id="fraDisabled" height="100%" width="100%" src="{{asset($resources->file_full_path).'/'.$resources->source_name.'#toolbar=0&navpanes=0'}}" onload="disableContextMenu();" onMyLoad="disableContextMenu();"></iframe>
</body>
</html>
