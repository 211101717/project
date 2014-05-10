<script type="text/javascript" src="<?php echo WWWROOT ?>js/jquery.js"></script>
<style>
.fadein {
}
.fadein img { position:absolute; z-index: 0; margin: 0px 0px 0px 0px;width: 954px; padding:5px; border: 1px solid black}
</style>
<script>
$(function(){
$('.fadein img:gt(0)').hide();
setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
});
</script>
<div class="fadein">
<img src="slider/img/head_bg_img4.png"/>
<img src="slider/img/head_bg_img5.png"/>
<img src="slider/img/head_bg_img6.png"/>
</div>

