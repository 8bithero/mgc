$(function(){function t(){if(localStorage.getItem("post-id")){$('input[name="project-title"]').val(localStorage.getItem("post-title"));$(".project-title").text("New Project: "+localStorage.getItem("post-title"));$("#project-permalink").html(localStorage.getItem("post-permalink"));$(".project-editor").html(localStorage.getItem("post-content"));$("textarea").val(localStorage.getItem("post-content"));$('input[name="project-video"]').val(localStorage.getItem("post-video"))}}function n(e){var t=$("#post-status"),n=t.text();if(n!=e){if(e=="publish"){TweenMax.to(t,.4,{alpha:0});t.removeClass("bg-warning");t.text(e);t.addClass("bg-primary");TweenMax.to(t,.4,{delay:2,alpha:1});localStorage.setItem("post-status","publish")}else if(e=="draft"){TweenMax.to(t,.4,{alpha:0});t.removeClass("bg-primary");t.text(e);t.addClass("bg-warning");TweenMax.to(t,.4,{delay:2,alpha:1});localStorage.setItem("post-status","draft")}return}}function r(e){var t=e.getFullYear(),n=i(e.getMonth()),r=i(e.getDay()),s=r+"/"+n+"/"+t;$("#post_date").html(s)}function i(e){return e<10?"0"+e:""+e}function o(t){if(!t){event.preventDefault();var n="publish"}var r=$("input[name='project-title']").val(),i=localStorage.getItem("post-permalink"),s=$("input[name='project-categories']").val(),o=$("input[name='project-tags']").val(),u=$("input[name='project-video']").val(),a=$("textarea").text(),f=localStorage.getItem("post-id"),l=$.ajax({type:"POST",url:e+"/wp-admin/admin-ajax.php",data:{action:"project_submit",status:n,id:f,title:r,permalink:i,content:a,categories:s,tags:o,video:u,autosave:t},beforeSend:function(e){t||$("#ajax-modal").trigger("click")},success:function(e){var n=JSON.parse(e);console.log(n);var r=new Date,i=r.getHours(),s=r.getMinutes(),o=r.getSeconds(),u="at "+i+":"+s;localStorage.setItem("post-status",n.post_status);localStorage.setItem("post-id",n.post_id);localStorage.setItem("post-title",n.post_title);localStorage.setItem("post-content",n.post_content);localStorage.setItem("post-categorie",n.post_category);localStorage.setItem("post-video",n.post_video);t?$("#post_time").html("Autosave "+u):$("#post_time").text("Submitted")},error:function(e){console.log("Ajax Error")}});$.when(l).then(function(){$(".ajax-modal").removeClass("md-show");ajax_spinner()})}function f(){var e=setInterval(function(e){s=!0;o(s)},5e4)}var e=localStorage.getItem("blog-url");$(window).load(t);$(".project-editor").mouseleave(function(){var e=$(this).html();$("#project-content").html(e)});$(".video_source").on("click",function(){event.preventDefault();var e=$(this).data("source");$(".input-video").html($(this).text()+' <span class="caret"></span>');e=="vimeo"?$("input.video-input").val("http://vimeo.com/"):e=="youtube"&&$("input.video-input").val("http://www.youtube.com/watch?v=")});r(new Date);var s=!1,u=!1;$("#publish_project").click(function(e){o();u=!0;n("publish")});$("#draft_project").click(function(e){o();n("draft")});var a;f();$("#formpost-project input").change(function(){clearInterval(a);s=!0;o(s)});$(".project-editor").focusout(function(){clearInterval(a);s=!0;o(s)});pconfig=JSON.parse(JSON.stringify(base_plupload_config));pconfig.multipart_params.id=localStorage.getItem("post-id");console.log(pconfig);var l=new plupload.Uploader(pconfig);l.bind("Init",function(e){var t=$("#plupload-upload-ui");if(e.features.dragdrop){t.addClass("drag-drop");$("#drag-drop-area").bind("dragover.wp-uploader",function(){t.addClass("drag-over")}).bind("dragleave.wp-uploader, drop.wp-uploader",function(){t.removeClass("drag-over")})}else{t.removeClass("drag-drop");$("#drag-drop-area").unbind(".wp-uploader")}});l.init();l.bind("FilesAdded",function(e,t){var n=104857600,r=parseInt(e.settings.max_file_size,10);plupload.each(t,function(t){r>n&&t.size>n&&e.runtime!="html5"?alert("error"):console.log(t)});e.refresh();e.start()});l.bind("FileUploaded",function(e,t,n){console.log(n);alert("done")})});