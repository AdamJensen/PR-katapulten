<!-- Fil der skal inkluderes for at man kan uploade filer til indholdet -->
<script type="text/javascript">
$(document).ready(function() {

var session = $("#session_id").val()
//se http://www.uploadify.com/documentation/ for at finde hjælpeartikler til at udvide funktionaliteten af uploadify-funktionen...
  $('#file_upload').uploadify({
  'uploader'  : 'uploadify/uploadify.swf',
    'script'    : 'uploadify/uploadify.php?session='+session,
    'cancelImg' : 'uploadify/cancel.png',
    'folder'    : 'filer',
    'auto'      : true,
	'multi'     : false,
	 'sizeLimit'   : 10485760,
	'buttonText' : 'Fil til indhold',
	'onComplete'  : function(event, ID, fileObj, response, data) {
      alert('Din fil er nu blevet uploaded...');
	  $("#filename").text("<?php echo $targetFile; ?>");
	   } 


  });
});
</script>
<!-- her starter upload-visningen -->
Vedh&#230;ft pressemeddelese og/eller billeder ved at bruge knappen herunder.<br>
<input id="file_upload" name="file_upload" type="file" />

<!-- Når filer er uploaded vises resultatet her START -->
<div id="thumbnails"></div>

<div id="filenavn"><input id="filename" type="hidden" name="filename" value=""></div>
<!-- Når filer er uploaded vises resultatet her SLUT -->