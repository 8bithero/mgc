!function($){$(function(){function addMsg(e){var t=$(".nav-user"),n=$(".count:first",t),r=parseInt(n.text());$(".count",t).fadeOut().fadeIn().text(r+1);$(e).hide().prependTo(t.find(".list-group")).slideDown().css("display","block")}var sr,sparkline=function($re){$(".sparkline").each(function(){var $data=$(this).data();if($re&&!$data.resize)return;$data.type=="pie"&&$data.sliceColors&&($data.sliceColors=eval($data.sliceColors));$data.type=="bar"&&$data.stackedBarColor&&($data.stackedBarColor=eval($data.stackedBarColor));$data.valueSpots={"0:":$data.spotColor};$(this).sparkline("html",$data)})};$(window).resize(function(e){clearTimeout(sr);sr=setTimeout(function(){sparkline(!0)},500)});sparkline(!1);$(".easypiechart").each(function(){var e=$(this),t=e.data(),n=e.find(".step"),r=parseInt($(t.target).text()),i=0;t.barColor||(t.barColor=function(e){e/=100;return"rgb("+Math.round(200*e)+", 200, "+Math.round(200*(1-e))+")"});t.onStep=function(e){i=e;n.text(parseInt(e));t.target&&$(t.target).text(parseInt(e)+r)};t.onStop=function(){r=parseInt($(t.target).text());t.update&&setTimeout(function(){e.data("easyPieChart").update(100-i)},t.update)};$(this).easyPieChart(t)});$(".combodate").each(function(){$(this).combodate();$(this).next(".combodate").find("select").addClass("form-control")});$(".datepicker-input").each(function(){$(this).datepicker()});$(".dropfile").each(function(){var e=$(this);if(typeof window.FileReader=="undefined"){$("small",this).html("File API & FileReader API not supported").addClass("text-danger");return}this.ondragover=function(){e.addClass("hover");return!1};this.ondragend=function(){e.removeClass("hover");return!1};this.ondrop=function(t){t.preventDefault();e.removeClass("hover").html("");var n=t.dataTransfer.files[0],r=new FileReader;r.onload=function(t){e.append($('<img id="drop-image">').attr("src",t.target.result))};r.readAsDataURL(n);return!1}});var addPill=function(e){var t=e.val(),n=e.closest(".pillbox"),r=!1,i;if(t=="")return;$("li",n).text(function(e,n){if(n==t){i=$(this);r=!0}});if(r){i.fadeOut().fadeIn();return}$item=$('<li class="label bg-dark">'+t+"</li> ");$item.insertBefore(e);e.val("");n.trigger("change",$item)};$(".pillbox input").on("blur",function(){addPill($(this))});$(".pillbox input").on("keypress",function(e){if(e.which==13){e.preventDefault();addPill($(this))}});$(".slider").each(function(){$(this).slider()});var $nextText;$(document).on("click","[data-wizard]",function(e){var t=$(this),n,r=$(t.attr("data-target")||(n=t.attr("href"))&&n.replace(/.*(?=#[^\s]+$)/,"")),i=t.data("wizard"),s=r.wizard("selectedItem"),o=r.next().find(".step-pane:eq("+(s.step-1)+")");!$nextText&&($nextText=$('[data-wizard="next"]').html());var u=!1;$('[data-required="true"]',o).each(function(){return u=$(this).parsley("validate")});if($(this).hasClass("btn-next")&&!u)return!1;r.wizard(i);var a=i=="next"?s.step+1:s.step-1,f=$(this).hasClass("btn-prev")&&$(this)||$(this).prev(),l=$(this).hasClass("btn-next")&&$(this)||$(this).next();f.attr("disabled",a==1?!0:!1);l.html(a<r.find("li").length?$nextText:l.data("last"))});$.fn.sortable&&$(".sortable").sortable();$(".no-touch .slim-scroll").each(function(){var e=$(this),t=e.data(),n;e.slimScroll(t);$(window).resize(function(r){clearTimeout(n);n=setTimeout(function(){e.slimScroll(t)},500)})});$.support.pjax&&$(document).on("click","a[data-pjax]",function(e){e.preventDefault();var t=$($(this).data("target"));$.pjax.click(e,{container:t})});$(".portlet").each(function(){$(".portlet").sortable({connectWith:".portlet",iframeFix:!1,items:".portlet-item",opacity:.8,helper:"original",revert:!0,forceHelperSize:!0,placeholder:"sortable-box-placeholder round-all",forcePlaceholderSize:!0,tolerance:"pointer"})});$("#docs pre code").each(function(){var e=$(this),t=e.html();e.html(t.replace(/</g,"&lt;").replace(/>/g,"&gt;"))});$(document).on("click",".fontawesome-icon-list a",function(e){e&&e.preventDefault()});$(document).on("change",'table thead [type="checkbox"]',function(e){e&&e.preventDefault();var t=$(e.target).closest("table"),n=$(e.target).is(":checked");$('tbody [type="checkbox"]',t).prop("checked",n)});$(document).on("click",'[data-toggle^="progress"]',function(e){e&&e.preventDefault();$el=$(e.target);$target=$($el.data("target"));$(".progress",$target).each(function(){var e=50,t,n=$(".progress-bar",this).last();($(this).hasClass("progress-xs")||$(this).hasClass("progress-sm"))&&(e=100);t=Math.floor(Math.random()*e)+"%";n.css("width",t).attr("data-original-title",t)})});var $msg='<a href="#" class="media list-group-item"><span class="pull-left thumb-sm text-center"><i class="fa fa-envelope-o fa-2x text-success"></i></span><span class="media-body block m-b-none">Sophi sent you a email<br><small class="text-muted">1 minutes ago</small></span></a>';setTimeout(function(){addMsg($msg)},1500);$('[data-ride="datatables"]').each(function(){var e=$(this).dataTable({bProcessing:!0,sAjaxSource:"js/data/datatable.json",sDom:"<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",sPaginationType:"full_numbers",aoColumns:[{mData:"engine"},{mData:"browser"},{mData:"platform"},{mData:"version"},{mData:"grade"}]})});if($.fn.select2){$("#select2-option").select2();$("#select2-tags").select2({tags:["Explainer video","Animation","Commercial","Music video","Program titles","Short film","Showreel"],tokenSeparators:[","," "]});$("#select2-categories").select2({tags:["Explainer video","Animation","Commercial","Music video","Program titles","Short film","Showreel"],tokenSeparators:[","," "]})}})}(window.jQuery);