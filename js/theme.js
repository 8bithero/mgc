$(function() {
    var blog_url = localStorage.getItem("blog-url");

    //-------------------------------------
    // Sign in - Sign up
    //------------------------------------
    $('#sign-up-btn').click(function(){
        event.preventDefault();
        TweenMax.to($('#sign-inner'), 0.5, {top: "-620px"});
    });
    $('#sign-in-btn').click(function(){
        event.preventDefault();
        TweenMax.to($('#sign-inner'), 0.5, {top: "0px"});
    });



    //-------------------------------------
    // Add New Project
    //------------------------------------
    $('.new-project').on('click', function(event){
        event.preventDefault();

        var error = false;
        var goTo = this.getAttribute("href"); // store anchor href
        
        $('.make-project').on('click',function(event){
            event.preventDefault();
            var title = $('#begin-project-title').val();

            if(title){
        var new_project =  $.ajax({
                    type: 'POST',
                    url: blog_url +'/wp-admin/admin-ajax.php',
                    data: {
                        action: 'insert_project',
                        title : title,

                    },
                    success: function(data){
                        var post = JSON.parse(data);
                        localStorage.setItem("post-status", post.post_status );
                        localStorage.setItem("post-id", post.post_id );
                        localStorage.setItem("post-title", post.post_title );
                        localStorage.setItem("post-permalink", post.post_permalink );
                       
                    },
                    error: function(errorThrown){
                        alert('Ajax Error');
                    },
                })
            $.when(new_project).then(function(){
                 window.location = goTo;  
            });

            } else {
                if(!error){
                    $('#begin-project-title').after('<span class="help-block m-b-none error-make-project">You need to set a project title..</span>');
                    error = true;
                };
            }
        })
    });


    //-------------------------------------
    // Adding Packery
    //------------------------------------
    var container = document.querySelector('.packery');
    var pckry = new Packery( container );

    $('#relayout').on('click', function(){
        $('.category-animation').hide();
        pckry.layout();
    });

    $('#relayout_show').on('click', function(){
        $('.category-animation').show();
        pckry.layout();
    })

    //-------------------------------------
    // Filter process and animation
    //------------------------------------

    function filterProjects(){
            
        var type = $('#filter-type').val();
        var time = $('#filter-time').val();

        var filter = $.ajax({
                type: 'POST',
                    url: blog_url +'/wp-admin/admin-ajax.php',
                    data: {
                        action: 'filter_projects',
                        type: type,
                        time: time,
                    },
                    beforeSend:function(data){ 
                        $('#ajax-modal').trigger('click');
                    },
                    success: function(data){
                        $('.project-items').html(data);
                    },
                    error: function(errorThrown){
                        console.log('Ajax Error');
                    }   
        });
        $.when(filter).then(function(){

            $('#filter-type').val(type);
            $('#filter-time').val(time);
            var container = document.querySelector('.packery');
            var pckry = new Packery( container );
            pckry.layout();

            $('.ajax-modal').removeClass('md-show');
        });
    };


    $('.slider-horizontal').on('slide', function(ev){
        var status = $(this).val();
        var target = $('#current-filter-time');
        $('#filter-time').val(status);

        if(status == 1){
            target.text('This Week')
        } else if(status == 2){
            target.text('This Month');
        } else if(status == 3){
            target.text('This Year');
        } else if(status == 4){
            target.text('All Time');
        }
      });


    $('.slider-horizontal').on('slideStop', function(ev){
        filterProjects();
    });

    $('.project-items').on('click','#reset-filter', function(event){
        event.preventDefault();
        $('a[data-filter="recent"]').click();
    });

    $('.filter-dropdown a').on('click', function(event){
        event.preventDefault();

        var active_filter = $(this).text();
        var filter = $(this).data('filter');

        $('#filter-type').val(filter);
        $('.filter-list').children('.panel-body').removeClass('active');
        $(this).parent().addClass('active');
        $('.filter-trigger').html(active_filter+'<i class="fa fa-fw fa-filter pull-right"></i>');
        filterProjects();
    });

    //-------------------------------------
    // Animate badge noticication
    //------------------------------------
    var badge = $('.notification-badge');
    var badge_int = parseInt(badge.html());

    if(badge_int > 0){
        var tl = new TimelineMax({delay:10,repeat:-1, repeatDelay:10});
        tl.to(badge, 0.3, {scale:1.5}).to(badge, 0.3, {scale:1});
    }


    //-------------------------------------
    // Main Slider
    //------------------------------------
    var screenIndex = 1,
        numScreens = $('.screen').length,
        isTouch = false,
        $bigImage = $('.big-image'),
        $window = $(window); 
    // Next button click goes to next div
    $('#next-btn').on('click', function(e) {
        e.preventDefault();
            next();
    });
    $('#prev-btn').on('click', function(e) {
        e.preventDefault();
            prev();
    });

    function next() {                
        // update video index, reset image opacity if starting over
        if (screenIndex === numScreens) {
            screenIndex = 1;
        } else {
            screenIndex++;
        }
        var slide_size = '-'+(100*(screenIndex-1))+'%';
        TweenMax.to($('.video_wrapper'), 0.35, {left:slide_size});

    }
    function prev() {                
        // update video index, reset image opacity if starting over
        if (screenIndex === 1) {
            screenIndex = numScreens;
        } else {
            screenIndex--;
        }
        var slide_size = '-'+(100*(screenIndex-1))+'%';
        TweenMax.to($('.video_wrapper'), 0.35, {left:slide_size});

    }
    //First slider fade-in
    var SlideTextFadeIn = $('#textFadeIn');
        TweenMax.to(SlideTextFadeIn, 1.5, {delay:1, alpha:1});

    console.log('theme.js loaded');

});

$(window).load(function(){

    var container = document.querySelector('.packery');
    if(container){
        var pckry = new Packery( container );
        pckry.layout();
    }
    //-------------------------------------
    // Ajax spinner
    //------------------------------------
    function ajax_spinner(){
        $('.ajax-bar').each(function(){
        var amp = Math.random();
        TweenMax.to($(this), 0.3, {scaleY:amp, onComplete:ajax_spinner});
        });
    };
    //Spin her up!
    ajax_spinner();
});