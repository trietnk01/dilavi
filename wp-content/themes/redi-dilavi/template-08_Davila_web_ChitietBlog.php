<?php
/*
Template name: Template Tin tức chi tiết
Template Post Type: post, page
*/
?>
<?php get_header() ?>
<section class="p-pt-20">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8">
        <article class="article-content">
          <h1>
          <!--  <?php the_title() ?> -->
          Khoác áo mới cho phòng khách đón hè
          </h1>
          <div class="date">
            <!-- <?php echo get_the_date('d.m.Y') ?> -->
            20.11.2018
          </div>
          <div class="p-mt-10">
            <!-- <?php echo the_content() ?> -->
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium.Lorem ipsum dolor sit amet.
            <p>
              <img src="<?php echo P_IMG_DILA ?>/img_1.png" alt="img">
            </p>
             Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium.Lorem ipsum dolor sit amet.
          </div>
        </article>
      </div>
      <div class="col-12 col-lg-4">
        <div class="sidebar">
          <h2 class="sidebar-heading p-up">
            Bài viết liên quan
          </h2>
          <div class="row">
            <?php for ($i=1; $i <=3 ; $i++) { ?>
            <div class="col-12">
              <div class="box-news box-news-page box-item sm-box-list">
                <div class="-photo">
                  <a href="" style="background: url('<?php echo P_IMG_DILA ?>/img_1.png') no-repeat center/cover; padding-top: calc(100% / (457 / 303));">
                    
                  </a>
                </div>
                <div class="-content">
                  
                  <h4 class="-title">
                  <a href="<?php echo site_url( 'chi-tiet-dich-vu', null ); ?>" class="-link">
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
        </div>
        
      </div>
    </div>
    <!-- pagination -->
    
    <!-- /pagination -->
  </div>
</section>
<!-- sect about -->
<?php get_footer() ?>