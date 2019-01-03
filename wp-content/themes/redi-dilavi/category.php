<?php 
global $acf_pr;
get_header();
$id=get_queried_object_id();
$slug="";
$term=get_term_by('id', $id,'category');
if(!empty($term)){
  $slug=$term->slug;
}
$the_query=$wp_query;
switch ($slug) {
  case 'dich-vu':  
  case 'services':
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
  <?php
  break;
  default:
  $args=array();
  $s="";
  if(isset($_GET["s"])){
    $s=trim($_GET["s"]);
  }
  if(!empty(@$s)){
    $args = array(
      'post_type' => 'post',  
      'orderby' => 'id',
      'order'   => 'DESC'                    
    );  
    $args["s"] =@$s;
  }
  if(count($args) > 0){
    $the_query = new WP_Query( $args );    
  }  
  $source_hot_article=array();
  if($the_query->have_posts()){
    while ($the_query->have_posts()) {
      $the_query->the_post();
      $post_id=$the_query->post->ID;                                                                      
      $permalink=get_the_permalink($post_id);         
      $title=get_the_title($post_id);
      $excerpt=get_the_excerpt($post_id);
      $featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
      $date_post='';
      if(strcmp($acf_pr, '_en') == 0){
        $date_post=get_the_date('m.d.Y',@$post_id);           
      }else{            
        $date_post=get_the_date('d.m.Y',@$post_id);
      }         
      $data_hot_article["title"]=$title;
      $data_hot_article["permalink"]=$permalink;
      $data_hot_article["featured_img"]=$featured_img;
      $data_hot_article["date_post"]=$date_post;
      $data_hot_article["excerpt"]=$excerpt;
      $source_hot_article[]=$data_hot_article;
    }
    wp_reset_postdata();
  }       
  ?>
  <section class="p-pt-50 p991-pt-30 sect-news-page">
  <div class="container">
    <h1 class="heading-sect text-center reset-pseudo p-mb-20">
    <strong>
      <?php       
      if(!empty($term)){        
        single_cat_title(); 
      }else{
        if(strcmp($acf_pr,"_en")){
          echo "Tin tức";
        }else{
          echo "News";
        }        
      }
      ?>        
    </strong>
    <img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="img">
    </h1>
    
    
    
    <div class="row p-mt-70 p991-mt-30">
      <?php 
      if(count($source_hot_article) > 0){
        ?>
        <div class="col-12">
          <div class="box-news-list box-news-hot box-col-50">
            <div class="-photo">
              <a href="<?php echo $source_hot_article[0]['permalink'] ?>" style="background: url('<?php echo $source_hot_article[0]['featured_img'] ?>') no-repeat center/cover; padding-top: calc(100% / (457 / 303));">

              </a>
            </div>
            <div class="-content">

              <h4 class="-title">
                <a href="<?php echo $source_hot_article[0]['permalink'] ?>" class="-link">
                  <?php echo $source_hot_article[0]['title']; ?>
                </a>
              </h4>
              <div class="-date"><?php echo $source_hot_article[0]['date_post']; ?></div>
              <div class="-des">
                <?php echo wp_trim_words(  $source_hot_article[0]['excerpt'] , 50, "..." ); ?>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
      if(count($source_hot_article) > 3){
        for($i=1;$i<=3;$i++){
          ?>
          <div class="col-12 col-sm-12 col-lg-4">                    
            <div class="box-news-list box-col-50">
              <div class="-photo">
                <a href="<?php echo $source_hot_article[$i]['permalink'] ?>" style="background: url('<?php echo $source_hot_article[$i]['featured_img'] ?>') no-repeat center/cover; padding-top: calc(100% / (457 / 303));">

                </a>
              </div>
              <div class="-content">

                <h4 class="-title">
                  <a href="<?php echo $source_hot_article[$i]['permalink'] ?>" class="-link">
                    <?php echo $source_hot_article[$i]['title']; ?>
                </h4>
                <div class="-date"><?php echo $source_hot_article[$i]['date_post']; ?></div>
              </div>
            </div>
          </div>
          <?php
        }        
      }
       ?>
    </div>
    <div class="line-news-list"></div>
    <div class="row">
      <?php 
      if(count($source_hot_article) > 9){
        for ($i=4; $i <= 9; $i++) { 
          ?>
          <div class="col-12 col-lg-4">
            <div class="box-news box-news-page box-item sm-box-list">
              <div class="-photo">
                <a href="<?php echo $source_hot_article[$i]['permalink']; ?>" style="background: url('<?php echo $source_hot_article[$i]['featured_img']; ?>') no-repeat center/cover; padding-top: calc(100% / (457 / 303));">

                </a>
              </div>
              <div class="-content">

                <h4 class="-title">
                  <a href="<?php echo $source_hot_article[$i]['permalink']; ?>" class="-link">
                    <?php echo $source_hot_article[$i]['title']; ?>
                  </a>
                </h4>
                <div class="-date"><?php echo $source_hot_article[$i]['date_post']; ?></div>
                <div class="-des">
                  <?php echo wp_trim_words(  $source_hot_article[$i]['excerpt'] , 20, "..." ); ?>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
      }
      ?>
    </div>
    <div class="row">
      <div class="col">
        <?php 
        if($the_query->max_num_pages > 1){     
          ?>
          <div class="paging">

              <?php echo getPaging($the_query);?>  
            
          </div>
          <?php
        }    
        ?>
      </div>
    </div>

    <!-- pagination -->
    
    <!-- /pagination -->
  </div>
</section>
  <?php
  break;
}
get_footer();
?>
