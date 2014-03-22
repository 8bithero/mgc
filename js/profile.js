$(function() {

	var blog_url = localStorage.getItem("blog-url");


	$('.follow-wrapper').on('click', function(){
		var control_btn = $('.follow_button_hidden');
		var target = control_btn.attr('href');

		var follow = $.ajax({
				type: 'POST',
				url : target
		})
	})

	if($('.friendship-button').hasClass('icon_active')){
		$('.follow-wrapper').addClass('active');
	}
	$('.project-editor').mouseleave(function(){
        var content = $(this).text();
        $('#project-content').text(content);
    })

	//Edit
	$( ".info-profile" ).keyup(function() {
		$('.char-wrapper').show(350);
		char_count();
	})


	// Character count
	function char_count(){
		var chars = (200 - ($( ".info-profile" ).text().length));
		$('#char-count').text(chars);
		if(chars < 0){
			TweenMax.to($('.char-wrapper'), 0.4, {color: '#fb0000'});
			$('.more-char').show();
		} else if(chars < 10){
			TweenMax.to($('.char-wrapper'), 0.4, {color: '#e6522c'});
			$('.more-char').hide();
		} else if(chars < 100){
			TweenMax.to($('.char-wrapper'), 0.4, {color: '#eabe46'});
			$('.more-char').hide();
		} else {
			TweenMax.to($('.char-wrapper'), 0.4, {color: '#737373'});
			$('.more-char').hide();
		}
	}

	//Check for good passwords
	$('input[name="edit-pass1"]').change(function(){
		if(($(this).val().length) < 6){
			$('.password-warning').show();
		} else {
			$('.password-warning').hide();
		};

		if($('input[name="edit-pass2"]').val()){
			$('input[name="edit-pass2"]').val('');
		}
	})

	//Check for same password
	$('input[name="edit-pass2"]').change(function(){
		var pass1 = $('input[name="edit-pass1"]').val();
		if(($(this).val())  !== pass1){
			$('.equal-warning').show();
		} else {
			$('.equal-warning').hide();
		}
	})

	//Save profile
	function profile_save(){	
		var username = $('input[name="edit-username"]').val();
		var nickname = $('input[name="edit-nickname"]').val(); 
		var email = $('input[name="edit-email"]').val(); 
		var info = $('textarea[name="edit-info"]').val();
		var country = $('.select2-chosen').text();
		var city = $('input[name="edit-city"]').val(); 
		var pass1 = $('input[name="edit-pass1"]').val(); 
		var pass2 = $('input[name="edit-pass2"]').val(); 


		var save = $.ajax({
	            type: 'POST',
	            url: blog_url +'/wp-admin/admin-ajax.php',
	            data: {
	                action: 'profile_save_changes',
	                username: username,
	                nickname: nickname,
	                email: email,
	                info: info,
	                country: country,
	                city: city,
	                pass1: pass1,
	                pass2: pass2,
	            },
	            beforeSend:function(data){ // Are not working with dataType:'jsonp'
	            },
	            success: function(data){
	            	var response = JSON.parse(data);
	            	console.log(response.msg);
	            },
	            error: function(errorThrown){
	                console.log('Ajax Error');
	            }
	        });

		$.when(save).then(function(data){
			return_form(data);
		});
	}

	function return_form(data){
		var save = JSON.parse(data);
		console.log(data);
		$('.user-nickname').text(save.nickname);
		$('.user-country').text(save.country);
		$('.user-city').text(save.city);
		$('.user-description').text(save.description);
	}

	$('#save-profile-changes').click(function(event){
		event.preventDefault();
		profile_save();
	})

});