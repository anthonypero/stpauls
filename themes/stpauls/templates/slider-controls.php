<?php

// Slider Variables

$lightslider_duration = get_option( 'lightslider_duration' );
$lightslider_transition_speed = get_option( 'lightslider_transition_speed' );
$lightslider_transition_type = get_option( 'lightslider_transition_type' );

?>

<script type="text/javascript">
$(document).ready(function() {
    $("#lightSlider").lightSlider({
        item: 1,
        autoWidth: false,
        slideMove: 1, // slidemove will be 1 if loop is true
        slideMargin: 10,
 
        addClass: '',
        mode: "<?php echo $lightslider_transition_type; ?>",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
        easing: 'linear', //'for jquery animation',////
 
        speed: <?php echo $lightslider_transition_speed; ?>, //ms'
        auto: true,
        loop: true,
        slideEndAnimation: true,
        pause: <?php echo $lightslider_duration; ?>,
 
        keyPress: false,
        controls: true,
        prevHtml: '',
        nextHtml: '',
 
        rtl:false,
        adaptiveHeight:false,
 
        vertical:false,
        verticalHeight:500,
        vThumbWidth:100,
 
        thumbItem:10,
        pager: true,
        enableDrag:false,
 
        responsive : [],
 
        onBeforeStart: function (el) {},
        onSliderLoad: function (el) {},
        onBeforeSlide: function (el) {},
        onAfterSlide: function (el) {},
        onBeforeNextSlide: function (el) {},
        onBeforePrevSlide: function (el) {}
    });
});
</script>