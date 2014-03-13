$(function() {

    var blog_url = localStorage.getItem("blog-url");
    //--------------------------------------------------------------------------------------------------
    //         Add previous add data to form
    //--------------------------------------------------------------------------------------------------
    function update_form(){

      if (localStorage.getItem("post-id")) {  
        $('input[name="project-title"]').val(localStorage.getItem("post-title"));
        $('.project-title').text('New Project: '+localStorage.getItem("post-title"));
        $('#project-permalink').html(localStorage.getItem("post-permalink"));
        $('.project-editor').html(localStorage.getItem("post-content"));
        $('textarea').val(localStorage.getItem("post-content"));
        $('input[name="project-video"]').val(localStorage.getItem("post-video"));
      }
    }
    $(window).load(update_form);



    //--------------------------------------------------------------------------------------------------
    //          Set post status
    //--------------------------------------------------------------------------------------------------
    function set_post_status(post_status){
      var status_holder = $('#post-status')
      var current_status = status_holder.text();

      if(current_status != post_status){
        if(post_status == 'publish'){
          TweenMax.to(status_holder,0.4,{alpha:0});
          status_holder.removeClass('bg-warning');
          status_holder.text(post_status);
          status_holder.addClass('bg-primary');
          TweenMax.to(status_holder,0.4, {delay:2, alpha:1});
          localStorage.setItem("post-status", 'publish' );
        } else if(post_status == 'draft'){
          TweenMax.to(status_holder,0.4,{alpha:0});
          status_holder.removeClass('bg-primary');
          status_holder.text(post_status);
          status_holder.addClass('bg-warning');
          TweenMax.to(status_holder,0.4, {delay:2, alpha:1});
          localStorage.setItem("post-status", 'draft' );
        }
        return;
      }
    }
    //--------------------------------------------------------------------------------------------------
    //          Fill wp_content textarea with editor content
    //--------------------------------------------------------------------------------------------------
	    // Set Editor to textarea
    $('.project-editor').mouseleave(function(){
        var content = $(this).html();
        $('#project-content').html(content);
    });


    //--------------------------------------------------------------------------------------------------
    //         Vimeo / Youtube selector
    //--------------------------------------------------------------------------------------------------
    //Dropdown for video link
    $('.video_source').on('click', function(){
        event.preventDefault();
        var source = $(this).data('source');
        $('.input-video').html($(this).text() + ' <span class="caret"></span>');

        if(source == "vimeo"){
            $('input.video-input').val('http://vimeo.com/');
        } else if(source == "youtube"){
            $('input.video-input').val('http://www.youtube.com/watch?v=');
        };
    });


    //--------------------------------------------------------------------------------------------------
    //         Javascript date
    //--------------------------------------------------------------------------------------------------
    post_day(new Date);
    function post_day(d){
      var year = d.getFullYear();
      var month = addLeadingZero(d.getMonth());
      var day = addLeadingZero(d.getDay());
      var time = day + '/' + month + '/' + year;

      $('#post_date').html(time);
    }
    function addLeadingZero(n){ return n < 10 ? '0'+n : ''+n }

    //--------------------------------------------------------------------------------------------------
    //          Trigger on form submission
    //--------------------------------------------------------------------------------------------------
    var autosave = false;
    function form_submission(autosave){
        // Set variables of the form

        if(!autosave){
            event.preventDefault();
            var status = 'publish';
        }
        var title = $("input[name='project-title']").val();
        var permalink = localStorage.getItem("post-permalink");
        var categories = $("input[name='project-categories']").val();
        var tags = $("input[name='project-tags']").val();
        var video_link = $("input[name='project-video']").val();
        var content = $("textarea").text();
        var id = localStorage.getItem("post-id");
        

       var save_project = $.ajax({
            type: 'POST',
            url: blog_url +'/wp-admin/admin-ajax.php',
            data: {
                action: 'project_submit',
                status: status,
                id: id,
                title: title,
                permalink: permalink,
                content: content,
                categories: categories,
                tags: tags,
                video: video_link,
                autosave: autosave,
            },
            beforeSend:function(data){ // Are not working with dataType:'jsonp'
              if(!autosave){
                  $('#ajax-modal').trigger('click');
              }
            },
            success: function(data){
              var post = JSON.parse(data);
              console.log(post);
              var d = new Date();
              var hours = d.getHours();
              var minutes = d.getMinutes();
              var seconds = d.getSeconds();
              var time = 'at ' + hours + ':' + minutes;

                localStorage.setItem("post-status", post.post_status );
                localStorage.setItem("post-id", post.post_id );
                localStorage.setItem("post-title", post.post_title );
                localStorage.setItem("post-content", post.post_content );
                localStorage.setItem("post-categorie", post.post_category );
                localStorage.setItem("post-video", post.post_video );

                if(autosave){
                  $('#post_time').html('Autosave ' + time);
                } else{
                  $('#post_time').text('Submitted');
                }

                
            },
            error: function(errorThrown){
                console.log('Ajax Error');
            }
        });
      $.when(save_project).then(function(){
        $('.ajax-modal').removeClass('md-show');
      })
    }
    var submission = false;
    $( "#publish_project" ).click(function( event ) {
      form_submission();
      submission = true;
      set_post_status('publish');
    });

    $( "#draft_project" ).click(function( event ) {
      form_submission();
      set_post_status('draft');
    });

    var setAutosave;

    function Autosave(){
      var setAutosave = setInterval(function(event){
        autosave = true;
        form_submission(autosave);
      },50000);
    }

    Autosave();

    $('#formpost-project input').change(function(){
        clearInterval(setAutosave);
        autosave = true;
        form_submission(autosave);
    })
    $('.project-editor').focusout(function(){
        clearInterval(setAutosave);
        autosave = true;
        form_submission(autosave);
    })
        console.log('newpost.js loaded');
    //--------------------------------------------------------------------------------------------------
    //          Upload an image
    //--------------------------------------------------------------------------------------------------

    //Upload image 
        pconfig = JSON.parse(JSON.stringify(base_plupload_config));
        pconfig.multipart_params.id = localStorage.getItem("post-id");
        console.log(pconfig);

          // create the uploader and pass the config from above
          var uploader = new plupload.Uploader(pconfig);

          // checks if browser supports drag and drop upload, makes some css adjustments if necessary
          uploader.bind('Init', function(up){
            var uploaddiv = $('#plupload-upload-ui');

            if(up.features.dragdrop){
              uploaddiv.addClass('drag-drop');
                $('#drag-drop-area')
                  .bind('dragover.wp-uploader', function(){ uploaddiv.addClass('drag-over'); })
                  .bind('dragleave.wp-uploader, drop.wp-uploader', function(){ uploaddiv.removeClass('drag-over'); });

            }else{
              uploaddiv.removeClass('drag-drop');
              $('#drag-drop-area').unbind('.wp-uploader');
            }
          });

          uploader.init();

          // a file was added in the queue
          uploader.bind('FilesAdded', function(up, files){
            var hundredmb = 100 * 1024 * 1024, max = parseInt(up.settings.max_file_size, 10);

            plupload.each(files, function(file){
              if (max > hundredmb && file.size > hundredmb && up.runtime != 'html5'){
                // file size error?
                alert('error');

              }else{

                // a file was added, you may want to update your DOM here...
                console.log(file);
              }
            });

                up.refresh();
                up.start();
          });

          // a file was uploaded 
          uploader.bind('FileUploaded', function(up, file, data) {
            // this is your ajax response, update the DOM with it or something...
            
            console.log(data);
            alert('done');

          });
        // END UPLOADER

console.log('newpost.js loaded');

});