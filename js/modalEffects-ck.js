$(function(){$(".md-trigger").on("click",function(){var e=$(this).data("modal");$("#"+e+"").addClass("md-show")});$(".md-overlay").on("click",function(){var e=$(this).data("modal");$(".md-show").removeClass("md-show")})});