<?php
/*
Template name: Template Hình ảnh video
Template Post Type: post, page
*/
global $hidden_breadcrum,$acf_pr;
$hidden_breadcrum = true;
get_header() ;
?>
<section class="p-pt-50 p991-pt-30">
  <div class="container">
    <h1 class="heading-sect reset-pseudo p-mb-20">
    <strong><?php echo t_pll('Hình ảnh','Gallery'); ?></strong>
    <img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="img">
    </h1>
    
    
    
    <!-- gallery -->
    <div class="row gallery-list row-xs">
      <?php
      $source_op_p_slider_rpt=get_field('op_p_slider_rpt','option'); 
      foreach($source_op_p_slider_rpt as $key => $value) { 
        ?>
      <div class="col-6 col-sm-6 col-lg-6 box-xs" data-src="<?php echo $value["op_p_slider_img"]; ?>">
        <div class="box-img box-item box-img-page">
          <div class="-photo" style="background: url('<?php echo $value["op_p_slider_img"]; ?>') no-repeat center/cover; padding-top: calc(100% / (455 / 330));">
            <a href="#" class="full-box">
              <img src="<?php echo $value["op_p_slider_img"]; ?>" class="img-hidden" alt="img">
              
            </a>
          </div>
          
        </div>
      </div>
      <?php } ?>
    </div>
    <div class="text-center">
      <?php 
      $link_slider='';
      if(strcmp($acf_pr, "_en")==0){
        $link_slider=site_url('gallery-detail', null );
      }else{
        $link_slider=site_url('chi-tiet-gallery', null );
      }
      ?>
      <a href="<?php echo $link_slider; ?>" class="btn-gra-tr p-mt-15 p991-mtb-15 p-up">
          <?php echo t_pll('Xem tất cả','View all'); ?>
          <img src="<?php echo P_IMG_DILA ?>/svg/icon-arrow-right.svg" alt="img">
        </a>
    </div>
    <!--/ gallery -->
    <!-- video -->
    <h3 class="heading-sect reset-pseudo p-mb-20 p-mt-50">
    <strong>Video</strong>
    <img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="img">
    </h3>
    <div class="row row-xs">
      <?php 
      $source_op_p_video_rpt=get_field('op_p_video_rpt','option'); 
      foreach ($source_op_p_video_rpt as $key => $value) { ?>
      <div class="col-6 col-sm-6 box-xs">
        <div class="box-video-page box-item">
          <div class="box-video-photo" style="background: url('<?php echo $value['op_p_video_img']; ?>') no-repeat center/cover; padding-top: calc(100% / (455 / 330));">
            <a href="javascript:void(0);" class="full-box js-video-button" data-video-id='<?php echo p_id_youtube($value['op_p_video_link']); ?>'>             
              
            </a>
          </div>
          
        </div>
      </div>
      <?php } ?>
    </div>
     <div class="text-center">
      <?php 
      $link_videos='';
      if(strcmp($acf_pr, "_en")==0){
        $link_videos=site_url('videos-detail', null );
      }else{
        $link_videos=site_url('chi-tiet-videos', null );
      }
      ?>
      <a href="<?php echo $link_videos; ?>" class="btn-gra-tr p-mt-15 p991-mtb-15 p-up">
          <?php echo t_pll('Xem tất cả','View all'); ?>
          <img src="<?php echo P_IMG_DILA ?>/svg/icon-arrow-right.svg" alt="img">
        </a>
    </div>
    <!-- /video -->
  </div>
  
  <!-- pagination -->
  
  <!--/ pagination -->
</section>
<!-- sect about -->
<?php get_footer() ?>