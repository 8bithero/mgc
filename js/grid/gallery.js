$(function () {

        $("#gallery").removeClass('hide');
        $('a[rel^="prettyPhoto"]').prettyPhoto({slideshow:5000, autoplay_slideshow:false});

        $("#gallery").gridalicious({
          animate: true,
          gutter: 1,
          width: 250
        });

    // if you use the local image just need call 
    // buildGallery();
});