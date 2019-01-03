<?php
/*
Template name: Template giới thiệu
Template Post Type: post, page
*/
global $hidden_breadcrum;
$hidden_breadcrum = true;
global $acf_pr;
?>
<?php get_header() ?>
<div class="wrap-about">

<div class="sect-about">
	<div class="row">
		<?php 
		$op_about_us_title=get_field('op_about_us_title'.$acf_pr,'option');
		$op_about_us_img=get_field('op_about_us_img'.$acf_pr,'option');		
		$op_about_us=get_field('op_about_us'.$acf_pr,'option');
		$op_our_service_title=get_field('op_our_service_title'.$acf_pr,'option');
		$op_our_service_img=get_field('op_our_service_img'.$acf_pr,'option');
		$op_our_service=get_field('op_our_service'.$acf_pr,'option');
		?>
		<div class="col-12 col-sm-12 col-lg-6">
			<div class="box-about-photo">
				<img src="<?php echo $op_about_us_img; ?>" class="img-full" alt="img">
			</div>
		</div>
		<div class="col-12 col-sm-12 col-lg-6 p-pt-50 p991-pt-0 p991-mt-20">
			<div class="box-about-content">
				<h1 class="heading-sect-small">
				<?php echo $op_about_us_title; ?>
				</h1>
				<h3 class="heading-sect">
				<strong><?php echo t_pll("Về","About"); ?></strong>
				<img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="img">
				</h3>
				<div class="f2-df p-mt-20">
					<?php echo $op_about_us; ?>
				</div>
			</div>
		</div>
	</div>
	
	
</div>

<div class="sect-about  p-ptb-50 p991-ptb-30" style="background-color: transparent;">
	<div class="row">

		<div class="col-12 col-sm-12 col-lg-6 order-lg-2">
			<div class="box-about-photo">
				<img src="<?php echo $op_our_service_img; ?>" class="img-full" alt="img">
			</div>
		</div>

		<div class="col-12 col-sm-12 col-lg-6 order-lg-1 p991-mt-20">
			<div class="box-about-content">
				
				<h3 class="heading-sect">
					<img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="img"><br />
					<strong>
						<?php echo $op_our_service_title; ?>
					</strong>
				
				</h3>
				<div class="f2-df p-mt-20">
					<?php echo $op_our_service; ?>
				</div>
			</div>
		</div>

	</div>
	
	
</div>
	
</div>

<div class="sect-customer">
	<div class="container">
		<div class="row">			
			<?php 
			$source_op_about_us_employee=get_field('op_about_us_employee'.$acf_pr,'option');
			?>
			<?php foreach ($source_op_about_us_employee as $key => $value) { ?>
			<div class="col-12 col-sm-6 col-lg-3">
				<div class="box-circle box-customer">
					<div class="-photo" style="background: url('<?php echo $value["op_about_us_employee_img".$acf_pr] ?>') no-repeat center/cover;">
						
					</div>
					<div class="-content">
						<h4 class="-title"><?php echo $value["op_about_us_employee_name".$acf_pr] ?></h4>
						<div class="-position"><?php echo $value["op_about_us_employee_position".$acf_pr] ?></div>
						<div class="-des">
							<?php echo mb_substr( $value["op_about_us_employee_intro".$acf_pr],0, 200, 'UTF-8' ).'...'; ?>
						</div>
					</div>
				</div>
			</div>
				<?php } ?>
		</div>
	</div>
</div>



<!-- sect about -->
<?php get_footer() ?>