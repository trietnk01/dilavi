<?php
/*
Template name: Template Chi tiết gallery
Template Post Type: post, page
*/
global $hidden_breadcrum;
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
      $source_op_p_detail_slider_rpt=get_field('op_p_detail_slider_rpt','option'); 
      foreach($source_op_p_detail_slider_rpt as $key => $value) { 
        ?>
        <div class="col-6 col-sm-6 col-lg-6 box-xs" data-src="<?php echo $value["op_p_detail_slider_img"]; ?>">
          <div class="box-img box-item box-img-page">
            <div class="-photo" style="background: url('<?php echo $value["op_p_detail_slider_img"]; ?>') no-repeat center/cover; padding-top: calc(100% / (455 / 330));">
              <a href="#" class="full-box">
                <img src="<?php echo $value["op_p_detail_slider_img"]; ?>" class="img-hidden" alt="img">

              </a>
            </div>

          </div>
        </div>
      <?php } ?>
    </div>    
    <!--/ gallery -->    
  </div>
  
  <!-- pagination -->
  
  <!--/ pagination -->
</section>
<!-- sect about -->
<?php get_footer() ?>