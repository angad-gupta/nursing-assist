
<style type="text/css">
#outerContainer #mainContainer div.toolbar {
  display: none !important; /* hide PDF viewer toolbar */
}
#outerContainer #mainContainer #viewerContainer {
  top: 0 !important; /* move doc up into empty bar space */
}

.toolbar {
  display: none !important; /* hide PDF viewer toolbar */
}

</style>

<embed src="{{asset($resources->file_full_path).'/'.$resources->source_name.'#toolbar=0&navpanes=0&scrollbar=0'}}" height="100%" width="100%">
