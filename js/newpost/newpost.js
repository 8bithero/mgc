$(function() {

    var blog_url = localStorage.getItem("blog-url");
    //--------------------------------------------------------------------------------------------------
    //         Add previous add data to form
    //--------------------------------------------------------------------------------------------------
  function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
  }

  var cookie = getCookie('post_id');

    /* .select2('val', arr) */
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

    function remove_thumb(){
      var ID = $('#project-id').val();
      var remove = $.ajax({
          type:'POST',
          url: blog_url +'/wp-admin/admin-ajax.php',
          data: {
                action: 'remove_thumbnail',
                delete_id: ID,
              },
              beforeSend:function(data){ // Are not working with dataType:'jsonp'
                if(!autosave){
                    $('.ajax-modal').addClass('md-show');
                }
              },
              success: function(data){
                  console.log(data);
              },
              error: function(errorThrown){
                  console.log('Ajax Error');
              }
            });
        $.when(remove).then(function(){
          $('#thumb').hide(150);
          $('#dragdrop').show(150);
          $('.ajax-modal').removeClass('md-show');
        })
    }

    //--------------------------------------------------------------------------------------------------
    //          Trigger on form submission
    //--------------------------------------------------------------------------------------------------
    var autosave = false;
    function form_submission(autosave){
        // Set variables of the form
        var id          = $('#project-id').val();
        var title       = $('#project-title').val();
        var categories  = $('#select2-categories').val();
        var video_link  = $('#project-video').val();
        var content     = $('#project-content').val();
        var status      = $('#project-status').val();
        

        if(!autosave){
            event.preventDefault();
            var status = 'publish';
        }
       var save_project = $.ajax({
            type: 'POST',
            url: blog_url +'/wp-admin/admin-ajax.php',
            data: {
                action: 'project_submit',
                status: status,
                id: id,
                title: title,
                content: content,
                categories: categories,
                video: video_link,
                autosave: autosave,
            },
            beforeSend:function(data){ // Are not working with dataType:'jsonp'
              if(!autosave){
                  $('.ajax-modal').addClass('md-show');
              }
            },
            success: function(data){
              var post = JSON.parse(data);
              var d = new Date();
              var hours = d.getHours();
              var minutes = d.getMinutes();
              var seconds = d.getSeconds();
              var time = 'at ' + hours + ':' + minutes;

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
      $('#project-status').val('publish');
      set_post_status('publish');
    });

    $( "#draft_project" ).click(function( event ) {
      form_submission(autosave);
      set_post_status('draft');
    });

    $('#remove-thumb').click(function( event ){
      remove_thumb();
      form_submission(autosave);
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

});