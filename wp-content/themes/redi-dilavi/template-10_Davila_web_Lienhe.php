<?php
/*
Template name: Template Liên hệ
Template Post Type: post, page
*/
global $hidden_block_partner;
  $hidden_block_partner = true;
  global $acf_pr;
?>
<?php get_header() ?>
<section class="p-pt-50 sect-contact p-pb-50 p991-pb-30">
  <div class="container">
    <h1 class="heading-sect text-center">
    
    <strong><?php echo t_pll('Liên hệ','Contact'); ?></strong>
    <img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="img">
    </h1>
    <div class="text-center">
      <address>        
        <h4>
          <?php
            $company_name=get_field('company_name'.$acf_pr,'option'); 
            echo $company_name; 
            ?>          
        </h4>
        <?php 
        $source_address=get_field('f_op_rpt_address'.$acf_pr,'option');
        if(count(@$source_address) > 0){
          foreach ($source_address as $key => $value) {
            ?>
            <p>
              <span class="fa fa-map-marker">
                
              </span>
              <a href="javascript:void(0);">
                <?php echo $value['f_op_address'.$acf_pr]; ?>
              </a>
            </p>
            <?php
          }
        }
        ?>        
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
    </div>
    <div class="row">
      <div class="col-12 col-lg-6">
         <div class="wrap-form-contact">
      <form action="" method="POST" name="frm_contact">
       <input type="hidden" name="acf_pr" value="<?php echo $acf_pr; ?>">
        <div class="form-contact">
           <h3 class="form-contact-heading">
            <?php echo t_pll('Nhập thông tin liên hệ','Fill contact information'); ?>        
        </h3>
          <div class="row">
            <div class="col-12">
              
              <input type="text" name="fullname" class="form-control" placeholder="<?php echo t_pll("Họ tên","Full name") ?>" required>
            </div>
            <div class="col-12 col-lg-6">
              <input type="text" name="phone" class="form-control" placeholder="<?php echo t_pll("Số điện thoại","Phone number") ?>" required>
            </div>
            <div class="col-12 col-lg-6">
              
              <input type="email" name="email" class="form-control" placeholder="<?php echo t_pll("Email","Email") ?>">
            </div>
            <div class="col-12">
              
              <input type="text" name="title" class="form-control" placeholder="<?php echo t_pll("Tiêu đề","Title") ?>" required>
            </div>
            <div class="col-12">
              

              <textarea name="message" class="form-control" cols="30" rows="10" placeholder="<?php echo t_pll("Viết nội dung liên hệ","Write contact content") ?>"></textarea>
             
            </div>
            <div class="col-12 p-mt-20">
              <div>
                <div class="contact_btn">
                  <a href="javascript:void(0);" onclick="contactNow();"><?php echo t_pll('Gửi liên hệ','Send contact'); ?>        </a>
                </div>  
                <div class="ajax_loader_contact"></div>
                <div class="clearfix"></div>     
              </div>   
              <div class="note">Cảm ơn đã đặt phòng tại khách sạn của chúng tôi . Chúng tôi sẽ liên hệ lại bạn trong thời gian sớm nhất.</div>       
            </div>
              
          </div>
        </div>
       
      </form>
    </div>
      </div>
      <div class="col-12 col-lg-6 p991-mt-30">
        <div class="contact-map map">
          <?php 
          $google_map=get_field('op_p_contact_google_map','option');
          echo $google_map;
          ?>          
        </div>
      </div>
    </div>
   
  </div>
</section>
<!-- sect about -->
<?php get_footer() ?>