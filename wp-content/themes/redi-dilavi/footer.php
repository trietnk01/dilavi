<?php
/*
Footer template
*/
global $acf_pr;
?>
<div class="clearfix"></div>
<?php do_action('p_before_footer') ?>
<?php get_sidebar('footer') ?>


<?php
	global $hidden_block_partner;
 ?>

<?php if ( !$hidden_block_partner ) { ?> 

	<?php include get_template_directory() . "/block/block-partner.php" ?> 
	
<?php } ?>



<footer>
	
	<div class="line-bg-gradient" style="height: 1px;"></div>
	<div class="line-content">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-5 p991-t-c">
				
						<a href="<?php echo home_url('', null ); ?>" class="footer-logo">
							<?php 
							$logo_footer=get_field('logo_header','option');
							?>
						<img src="<?php echo $logo_footer; ?>" alt="Logo Dilavi">
					</a>	
				
					
					<address>
						<?php $company_name=get_field('company_name'.$acf_pr,'option'); ?>
						<h4><?php echo $company_name; ?></h4>
						<p>
							<span class="fa fa-map-marker">
								
							</span>
							<?php $dia_chi=get_field('dia_chi'.$acf_pr,'option'); ?>
							<a href="javascript:void(0);">
								<?php echo $dia_chi; ?>
							</a>
						</p>
						<p>
							<span class="fa fa-map-marker">
								
							</span>
							<a href="tel:<?php echo get_field('tel_alo','option'); ?>">
								<?php echo get_field('sdt','option'); ?>
							</a>
						</p>
						<p>
							<span class="fa fa-map-marker">
								
							</span>
							<a href="mailto:<?php echo get_field('email_info','option'); ?>">
								<?php echo get_field('email_info','option'); ?>
							</a>
						</p>
					</address>
					<div class="d-block d-lg-none">
						<?php include get_template_directory() . "/block/block-social-line-i.php" ?>
					</div>
					<div class="copy-right">
						COPYRIGHT BY <a href="<?php echo home_url() ?>">DILAVI</a> | POWERD BY 
						 <a href="https://redi.vn/" rel="nofollow" class="" target="_blank" title="Thiết kế website chuẩn Marketing">REDI</a>   
					</div>
				</div>
				<div class="col-12 col-lg-3 d-none d-lg-block">
						<h3 class="heading-footer"><?php echo t_pll('Dịch vụ','Services'); ?></h3>
						 <?php
                           
                            $menu_primary = wp_nav_menu( array(
                            'theme_location'  => 'menu_footer',
                            'menu_class'      => 'memu-footer',
                            'container'       => '',
                           
                            'echo'   => true
                            ) );    ?>
					<!--<ul class="memu-footer">
						<?php for ($i=1; $i <=2 ; $i++) { ?>
						<li>
							<a href="#" class="p-up">
								Cho thuê văn phòng
							</a>
						</li>
						<?php } ?>
					</ul>-->
					<?php include get_template_directory() . "/block/block-social-line-i.php" ?>  
				</div>
				<?php 
				$map_img=get_field('map_img','option');
				$map_link=get_field('map_link','option');
				?>
				<div class="col-12 col-lg-4 d-none d-lg-block">
					<h3 class="heading-footer"><?php echo t_pll('Bản đồ đường đi','Google map'); ?></h3>
					<a href="<?php echo $map_link; ?>" target="_blank" rel="nofollow" class="link-map-img">
						<img src="<?php echo $map_img; ?>" alt="img">
						<span class="text-view">Xem bản đồ lớn</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>

<div class="clearfix"></div>
<?php wp_footer() ?>
<?php include get_template_directory() . '/popup.php'; ?>
<?php do_action("p_add_code_end_body") ?>
<?php include get_template_directory() . '/af_body.php'; ?>
</body>
</html>