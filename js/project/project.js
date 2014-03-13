$(document).ready(function() {
	
	//Function for adding the preview video
	function preview(){
		var $link = $('input[name=project_preview]').val();
	
		$('#videoPreview').show();
		$('#no-preview').hide();
		$link = $link.replace('https', 'http');
		$preview = $link.replace('http://vimeo.com/', 'http://player.vimeo.com/video/');
	
		$('#preview_player').attr('src',$preview);
	}
	
	//Excecute preview
	preview();

	//Run preview when the input is changed
	$('input[name=project_preview]').change(function(){
		if( $(this).val() ){
			preview();
		} else {
			$('#videoPreview').hide();
			$('#no-preview').show();
		}
		
	});
		
		var video_width = $('#video_resize_bench').width();
		if(video_width < 630){
			var video_height = video_width/1.77;
			$('#preview_player')[0].setAttribute("width", (video_width - 30));
			$('#preview_player')[0].setAttribute("height", (video_height - 17));
		}
		
	$('#editor').focusout(function(){
		var EditorText = $(this).html();
		
		$('#project_editor').html(EditorText);
	})
});