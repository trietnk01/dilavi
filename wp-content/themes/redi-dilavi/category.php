<?php 
global $acf_pr;
get_header();
global $zController;
$productModel=$zController->getModel("/frontend","ProductModel");
$args = $wp_query->query; 
$args['orderby']='id';
$args['order']='DESC';    
$s="";
if(isset($_POST["s"])){
  $s=trim($_POST["s"]);
}
if(!empty(@$s)){    
  $args["s"] =@$s;
}  
$wp_query->query($args);
$the_query=$wp_query; 
/* start setup pagination */
$totalItemsPerPage=get_option( 'posts_per_page' );
$pageRange=3;
$currentPage=1; 
if(!empty(@$_POST["filter_page"]))          {
    $currentPage=@$_POST["filter_page"];  
}
$productModel->setWpQuery($the_query);   
$productModel->setPerpage($totalItemsPerPage);        
$productModel->prepare_items();               
$totalItems= $productModel->getTotalItems();               
$arrPagination=array(
    "totalItems"=>$totalItems,
    "totalItemsPerPage"=>$totalItemsPerPage,
    "pageRange"=>$pageRange,
    "currentPage"=>$currentPage   
);    
$pagination=$zController->getPagination("Pagination",$arrPagination); 
/* end setup pagination */
$source_article=array();
if($the_query->have_posts()){
  while ($the_query->have_posts()) {
    $the_query->the_post();
    $post_id=$the_query->post->ID;                                                                      
    $permalink=get_the_permalink($post_id);         
    $title=get_the_title($post_id);
    $excerpt=wp_trim_words( get_the_excerpt($post_id), 9999, '...' ) ;
    $featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
    $date_post='';
    $date_post=get_the_date('d/m/Y',@$post_id);      
    $row_article["title"]=$title;
    $row_article["permalink"]=$permalink;
    $row_article["featured_img"]=$featured_img;
    $row_article["date_post"]=$date_post;
    $row_article["excerpt"]=$excerpt;
    $source_article[]=$row_article;
  }
  wp_reset_postdata();  
}  
?>
<section class="p-pt-50 p991-pt-30 sect-news-page">
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="heading-sect text-center reset-pseudo p-mb-20">
          <strong>
            <?php single_cat_title();  ?>
          </strong>
          <img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="img">
        </h1>
      </div>
    </div> 
    <div class="row p-mt-70 p991-mt-30">
      <?php 
      if(count($source_article) > 0){
        ?>
        <div class="col-12">
          <div class="box-news-list box-news-hot box-col-50">
            <div class="-photo">
              <a href="<?php echo $source_article[0]['permalink'] ?>" style="background: url('<?php echo $source_article[0]['featured_img'] ?>') no-repeat center/cover; padding-top: calc(100% / (457 / 303));">

              </a>
            </div>
            <div class="-content">

              <h4 class="-title">
                <a href="<?php echo $source_article[0]['permalink'] ?>" class="-link">
                  <?php echo $source_article[0]['title']; ?>
                </a>
              </h4>
              <div class="-date"><?php echo $source_article[0]['date_post']; ?></div>
              <div class="-des">
                <?php echo wp_trim_words(  $source_article[0]['excerpt'] , 50, "..." ); ?>
              </div>
            </div>
          </div>
        </div>
        
        <?php
      }
      ?>
    </div>     
  </div>
</section>
<?php
get_footer();
?>
