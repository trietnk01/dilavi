<?php 
get_header(); 
global $acf_pr;
$post_id=0;
$source_term_id=array();
$term_slug='';
$categories = get_the_category();
$term_slug=$categories[0]->slug;
switch ($term_slug) {
	case 'tin-tuc':
	case 'blog':
	?>
	<section class="p-pt-20">
		<div class="container">
			<div class="row">
				<?php
				if(have_posts()){
					while (have_posts()){
						the_post();                            
						$post_id=get_the_ID(); 
						$title=get_the_title($post_id);          
						$permalink=get_the_permalink($post_id);     
						$date_post='';
						if(strcmp($acf_pr, '_en') == 0){
							$date_post=get_the_date('m.d.Y',@$post_id);						
						}else{						
							$date_post=get_the_date('d.m.Y',@$post_id);
						}		    								                                                                   
						if(count($categories) > 0){
							foreach ($categories as $key => $value) {
								$source_term_id[]=$value->term_id;
							} 
						}          
						?>
						<div class="col-12 col-lg-8">
							<article class="article-content">
								<h1>

									<?php echo $title; ?>
								</h1>
								<div class="date">

									<?php echo $date_post; ?>
								</div>
								<div class="p-mt-10">		        			
									<?php the_content(); ?>
								</div>
							</article>
						</div>
						<?php
					}
					wp_reset_postdata();   
				} 
				?>      
				<div class="col-12 col-lg-4">
					<div class="sidebar">
						<h2 class="sidebar-heading p-up">
							<?php echo t_pll('Bài viết liên quan','Related news'); ?>
						</h2>
						<div class="row">
							<?php 
							$args = array(
								'post_type' => 'post',  
								'orderby' => 'id',
								'order'   => 'DESC',  
								'posts_per_page' => 3,        
								'post__not_in'=>array($post_id),
								'tax_query' => array(
									array(
										'taxonomy' => 'category',
										'field'    => 'term_id',
										'terms'    => @$source_term_id,                   
									),
								),
							);          	
							$the_query=new WP_Query($args);                 	
							if($the_query->have_posts()){
								while ($the_query->have_posts()){
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
									?>
									<div class="col-12">
										<div class="box-news box-news-page box-item sm-box-list">
											<div class="-photo">
												<a href="<?php echo $permalink; ?>" style="background: url('<?php echo $featured_img; ?>') no-repeat center/cover; padding-top: calc(100% / (457 / 303));">

												</a>
											</div>
											<div class="-content">

												<h4 class="-title">
													<a href="<?php echo $permalink; ?>" class="-link">
														<?php echo $title; ?>
													</a>
												</h4>
												<div class="-date"><?php echo $date_post; ?></div>
												<div class="-des">
													<?php echo wp_trim_words(  $excerpt , 20, "..." ); ?>
												</div>
											</div>
										</div>
									</div>
									<?php 
								}
								wp_reset_postdata();    
							}          	
							?>
						</div>
					</div>

				</div>
			</div>
			<!-- pagination -->

			<!-- /pagination -->
		</div>
	</section>
	<?php
	break;
	
	default:
	?>
	<section class="p-pt-50 p991-pt-30">
		<div class="container">
			<h1 class="heading-sect text-center reset-pseudo p-mb-20">				
				<strong><?php echo $categories[0]->name; ?></strong>
				<img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="img">
			</h1>
			<?php 
			if(have_posts()){
				while (have_posts()){
					the_post();                            
					$post_id=get_the_ID(); 
					$title=get_the_title($post_id);          
					$permalink=get_the_permalink($post_id);    
					$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
					$date_post='';
					if(strcmp($acf_pr, '_en') == 0){
						$date_post=get_the_date('m.d.Y',@$post_id);						
					}else{						
						$date_post=get_the_date('d.m.Y',@$post_id);
					}		    								                                                                   
					if(count($categories) > 0){
						foreach ($categories as $key => $value) {
							$source_term_id[]=$value->term_id;
						} 
					}          
				}
				wp_reset_postdata(); 
			}
			?>
			<div class="box-service-list">

				<div class="row">
					<div class="col-12 col-sm-12 col-lg-5 order-lg-7">
						<div class="box-about-photo">
							<img src="<?php echo $featured_img; ?>" class="img-full" alt="img">
						</div>
					</div>
					<div class="col-12 col-sm-12 col-lg-7 order-lg-5 p991-mt-20">
						<div class="box-about-content">

							<h3 class="heading-sect">

								<strong>
									<?php echo $title; ?>
								</strong>

							</h3>
							<div class="heading-opac">
								DILAVI
							</div>
							<div class="f2-df p-mt-20">
								<?php the_content(); ?>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>

			<div class="article-content">
				<table class="table table-striped table-responsive">

					<tbody>
						<tr>

							<td>Mark</td>
							<td>Otto</td>
							<td>@laoreet ultrices ultricies</td>
							<td>Mark</td>
							<td>Otto</td>
							<td>@mdo</td>
						</tr>
						<tr>

							<td>Jacob</td>
							<td>Thornton</td>
							<td>@fat</td>
							<td>laoreet ultrices ultricies</td>
							<td>Otto</td>
							<td>@mdo</td>
						</tr>
						<tr>

							<td>Larry</td>
							<td>the Bird</td>
							<td>@laoreet ultrices ultricies</td>
							<td>Mark</td>
							<td>Otto</td>
							<td>@mdo</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div>
				<h2 class="heading-page reset-pseudo p-mb-10-i">
					<?php echo t_pll('Hình ảnh khách sạn','Gallery'); ?>
				</h2>
				<!-- gallery -->
				<div class="row gallery-list row-xs">
					<?php 
					$source_op_p_slider_rpt=get_field('op_p_slider_rpt','option'); 
					foreach($source_op_p_slider_rpt as $key => $value) { ?>
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
				<!--/ gallery -->
			</div>
			<!-- pagination -->

			<!--/ pagination -->
		</div>
	</section>
	<?php
	break;
}
get_footer(); 
?>