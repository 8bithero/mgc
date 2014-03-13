$(function() {
	$('.md-trigger').on('click', function(){
		var modal = $(this).data('modal');
		$('#'+modal+'').addClass('md-show');
	});
	$('.md-overlay').on('click', function(){
		var modal = $(this).data('modal');
		$('.md-show').removeClass('md-show');
	});

})