<?php
/*
Template name: Template Chi tiết videos
Template Post Type: post, page
*/
global $hidden_breadcrum;
$hidden_breadcrum = true;
get_header() ;
?>
<section class="p-pt-50 p991-pt-30">
  <div class="container">
    <h1 class="heading-sect reset-pseudo p-mb-20">
    <strong><?php echo t_pll('Videos','Videos'); ?></strong>
    <img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="img">
    </h1>
    

    <div class="row  row-xs">
      <?php 
      $source_op_p_detail_video_rpt=get_field('op_p_detail_video_rpt','option'); 
      foreach ($source_op_p_detail_video_rpt as $key => $value) { ?>
      <div class="col-6 col-sm-6 box-xs">
        <div class="box-video-page box-item">
          <div class="box-video-photo" style="background: url('<?php echo $value['op_p_detail_video_img']; ?>') no-repeat center/cover; padding-top: calc(100% / (455 / 330));">
            <a href="javascript:void(0);" class="full-box js-video-button" data-video-id='<?php echo p_id_youtube($value['op_p_detail_video_link']); ?>'>             
              
            </a>
          </div>
          
        </div>
      </div>
      <?php } ?>
    </div>
     
    <!-- /video -->
  </div>
  
  <!-- pagination -->
  
  <!--/ pagination -->
</section>
<!-- sect about -->
<?php get_footer() ?>