<?php
/*
Template name: Template Tin tức
Template Post Type: post, page
*/
?>
<?php get_header() ;
?>
<section class="p-pt-50 p991-pt-30 sect-news-page">
  <div class="container">
    <h1 class="heading-sect text-center reset-pseudo p-mb-20">
    <strong>Blog</strong>
    <img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="img">
    </h1>
    
    
    
    <div class="row p-mt-70 p991-mt-30">
      <div class="col-12">
        <div class="box-news-list box-news-hot box-col-50">
          <div class="-photo">
            <a href="" style="background: url('<?php echo P_IMG_DILA ?>/img_1.png') no-repeat center/cover; padding-top: calc(100% / (457 / 303));">
              
            </a>
          </div>
          <div class="-content">
            
            <h4 class="-title">
            <a href="#" class="-link">
              Những cách thiết kế nội
              thất cho ngôi nhà
            </a>
            </h4>
            <div class="-date">12.06.2018</div>
            <div class="-des">
              <?php echo wp_trim_words(  "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium.Lorem ipsum dolor sit amet.
              " , 50, "..." ); ?>
            </div>
          </div>
        </div>
      </div>
      <?php for ($i=1; $i <=3 ; $i++) { ?>
      <div class="col-12 col-sm-12 col-lg-4">
        
        
        
        <div class="box-news-list box-col-50">
          <div class="-photo">
            <a href="" style="background: url('<?php echo P_IMG_DILA ?>/img_<?php echo $i ?>.png') no-repeat center/cover; padding-top: calc(100% / (457 / 303));">
              
            </a>
          </div>
          <div class="-content">
            
            <h4 class="-title">
            <a href="#" class="-link">
              Những cách thiết kế
              nội thất khiến ngôi nhà
              rộng rãi hơn
            </a>
            </h4>
            <div class="-date">12.06.2018</div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <div class="line-news-list"></div>
    <div class="row">
      <?php for ($i=1; $i <=6 ; $i++) { ?>
      <div class="col-12 col-lg-4">
        <div class="box-news box-news-page box-item sm-box-list">
          <div class="-photo">
            <a href="" style="background: url('<?php echo P_IMG_DILA ?>/img_1.png') no-repeat center/cover; padding-top: calc(100% / (457 / 303));">
              
            </a>
          </div>
          <div class="-content">
            
            <h4 class="-title">
            <a href="#" class="-link">
              Những cách thiết kế nội
              thất cho ngôi nhà
            </a>
            </h4>
            <div class="-date">12.06.2018</div>
            <div class="-des">
              <?php echo wp_trim_words(  "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium.Lorem ipsum dolor sit amet.
              " , 20, "..." ); ?>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>

    <!-- pagination -->
    
    <!-- /pagination -->
  </div>
</section>
<!-- sect about -->
<?php get_footer() ?>