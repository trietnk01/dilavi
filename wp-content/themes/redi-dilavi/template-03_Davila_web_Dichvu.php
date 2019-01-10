<?php
/*
Template name: Template Dịch vụ
Template Post Type: post, page
*/
global $hidden_breadcrum;
$hidden_breadcrum = true;
get_header() ;
$the_query=$wp_query;
?>
<section class="p-pt-50 p991-pt-30">
  <div class="container">
    <h1 class="heading-sect text-center reset-pseudo p-mb-20">
      <strong><?php single_cat_title(); ?></strong>
      <img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="img">
    </h1>
    <?php       
    $i=0;
    if($the_query->have_posts()){        
      while ($the_query->have_posts()) {
        $the_query->the_post();
        $post_id=$the_query->post->ID;                                                                      
        $permalink=get_the_permalink($post_id);         
        $title=get_the_title($post_id);
        $excerpt=get_the_excerpt($post_id);                
        $featured_img=get_the_post_thumbnail_url($post_id, 'full');
        if($i==0){
          ?>
          <div class="box-service-list">

            <div class="row">
              <div class="col-12 col-sm-12 col-lg-5">

                <div class="box-about-photo">

                  <a href="<?php echo $permalink; ?>"><img src="<?php echo $featured_img; ?>" class="img-full" alt="img"></a>

                </div>

              </div>
              <div class="col-12 col-sm-12 col-lg-7 p991-mt-20">
                <div class="box-about-content">

                  <h3 class="heading-sect">

                    <strong>
                      <a href="<?php echo $permalink; ?>"><?php echo $title; ?></a>
                    </strong>

                  </h3>
                  <div class="heading-opac">
                    DILAVI
                  </div>
                  <div class="f2-df p-mt-20">
                    <?php echo $excerpt;?>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
        }else{
          ?>          
          <div class="box-service-list">

            <div class="row">
              <div class="col-12 col-sm-12 col-lg-5 order-lg-7">

                <div class="box-about-photo">

                  <a href="<?php echo $permalink; ?>"><img src="<?php echo $featured_img; ?>" class="img-full" alt="img"></a>

                </div>

              </div>
              <div class="col-12 col-sm-12 col-lg-7 order-lg-5 p991-mt-20">
                <div class="box-about-content">

                  <h3 class="heading-sect">

                    <strong>
                      <a href="<?php echo $permalink; ?>"><?php echo $title; ?></a>
                    </strong>

                  </h3>
                  <div class="heading-opac">
                    DILAVI
                  </div>
                  <div class="f2-df p-mt-20">
                    <?php echo $excerpt;?>                                          
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php   
        }          
        $i++;       
      }
      wp_reset_postdata();
    }
    ?>      
  </div>
</section>
<?php get_footer() ?>