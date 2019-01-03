<?php
/*
Template name: Template Booking
Template Post Type: post, page
*/
global $acf_pr;
get_header();
?>
<section class="p-pt-20">
  <div class="container">
    <h1 class="heading-sect text-center p-mt-30 p991-mt-20 p-mb-40 p991-mb-20">
    
        <strong><?php echo t_pll("Đặt phòng","Booking"); ?></strong>
        <img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="img">
    </h1>
    <div class="wrap-form-booking">
      <form action="" method="POST" name="frm_booking">
        <input type="hidden" name="acf_pr" value="<?php echo $acf_pr; ?>">
        <div class="form-booking">
          <div class="row">
            <div class="col-12 col-lg-6">
              <label for="fullname">

                <?php echo t_pll("Họ tên","Full name") ?>


              </label>

              <input type="text" id="fullname" name="customer_name" class="form-control"  placeholder="<?php echo t_pll("Vui lòng nhập họ tên","Please input yourname") ?>" >

            </div>
             <div class="col-12 col-lg-6">
              <label for="phone">

                <?php echo t_pll("Điện thoại","Phone") ?>

              </label>

              <input type="text" id="phone" name="customer_phone" class="form-control" placeholder="<?php echo t_pll("Vui lòng nhập điện thoại","Please input your phone") ?>" >

            </div>
             <div class="col-12 col-lg-6">
              <label for="email">

                <?php echo t_pll("Email","Email") ?>

              </label>

              <input type="email" id="email" name="customer_email" class="form-control" placeholder="<?php echo t_pll("Vui lòng nhập email","Please input email") ?>" >

            </div>
             <div class="col-12 col-lg-6">
              <label for="department">

                <?php echo t_pll("Chi nhánh","Department") ?>
                <img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="img" height="17">
              </label>
              <?php 
              $term_booking_branch = get_terms( array(
        'taxonomy' => 'za_booking_branch',
        'hide_empty' => false, 
        'parent' => 0 ) );  
              ?>
              <select name="branch_id" id="department" class="form-control" placeholder="<?php echo t_pll("Vui lòng chọn chi nhánh(Dilavi quận 1,Dilavi quận 3)","Please chose department(Dilavi District 1, District 3)") ?>">
                <option selected value="0">
                    <?php echo t_pll("Chọn chi nhánh","Choose branch") ?>
                 </option>
                <?php 
                foreach ($term_booking_branch as $key => $value) {
                  ?>
                  <option value="<?php echo $value->term_id; ?>"><?php echo $value->name; ?></option>
                  <?php
                }
                ?>
                                      
              </select>

            </div>
             <div class="col-12 col-lg-4">
              <label for="ngaydat">

                <?php echo t_pll("Ngày đặt","Put date") ?>

              </label>
              <?php 
              $checkin_date=""; 
              if(isset($_GET["checkin_date"])){
                $checkin_date=$_GET["checkin_date"];
              }             
              ?>
              <input type="text"  name="customer_checkin_date" class="form-control date-picker" placeholder="<?php echo t_pll("Vui lòng chọn ngày đặt phòng","Please select the date of your stay") ?>" value="<?php echo $checkin_date; ?>" >

            </div>
             <div class="col-12 col-lg-4">
              <label for="ngaytra">

                <?php echo t_pll("Ngày trả","Return date") ?>

              </label>
              <?php 
              $checkout_date=""; 
              if(isset($_GET["checkout_date"])){
                $checkout_date=$_GET["checkout_date"];
              }             
              ?>
              <input type="text" id="ngaytra" name="customer_checkout_date" class="form-control date-picker" placeholder="<?php echo t_pll("Vui lòng chọn ngày trả phòng","Please select the date of your stay") ?>"  value="<?php echo $checkout_date; ?>">

            </div>
             <div class="col-12 col-lg-4">
              <label for="songuoi">

                <?php echo t_pll("Số người","persons") ?>

              </label>
<?php 
              $term_booking_number_customer = get_terms( array(
        'taxonomy' => 'za_booking_number_customer',
        'hide_empty' => false, 
        'parent' => 0 ) );                                            
              $number_person_id=0; 
              if(isset($_GET["number_person_id"])){
                $number_person_id=$_GET["number_person_id"];
              }             
              ?>
              <select name="number_customer_id" id="songuoi" class="form-control custom-select">
                <?php 
                if(isset($_GET["number_person_id"])){
                  ?>
                  <option value="0">
                    <?php echo t_pll("Chọn số người","Choose persons") ?>
                  </option>
                  <?php
                  foreach ($term_booking_number_customer as $key => $value) {
                    if((int)$number_person_id == (int)$value->term_id){
                      ?>
                      <option selected value="<?php echo $value->term_id; ?>"><?php echo $value->name; ?></option>
                      <?php
                    }else{
                      ?>
                      <option value="<?php echo $value->term_id; ?>"><?php echo $value->name; ?></option>
                      <?php
                    }                    
                  } 
                }else{
                  ?>
                  <option selected value="0">
                    <?php echo t_pll("Chọn số người","Choose persons") ?>
                  </option>
                  <?php 
                  foreach ($term_booking_number_customer as $key => $value) {
                    ?>
                    <option value="<?php echo $value->term_id; ?>"><?php echo $value->name; ?></option>
                    <?php
                  }                  
                }
                ?>                               
              </select>

            </div>
            <div class="col-12">
              <div>
                <div class="booking_btn">
                  <a href="javascript:void(0);" onclick="bookNow();">
                    <?php echo t_pll("Đặt phòng","Book now"); ?>
                  </a>
                </div>
                <div class="ajax_loader"></div>
                <div class="clearfix"></div>                
              </div>   
              <div class="note">Cảm ơn đã đặt phòng tại khách sạn của chúng tôi . Chúng tôi sẽ liên hệ lại bạn trong thời gian sớm nhất.</div>           
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<script type="text/javascript" language="javascript">
  jQuery(document).ready(function($){   
    <?php 
    if(strcmp($acf_pr, "_en") == 0){
      ?>
      $( ".date-picker" ).datepicker({
        dateFormat: "mm/dd/yy",        
        changeYear: true,
        changeMonth: true,
        yearRange: "2000:2050"
      });
      <?php
    }else{
      ?>
      $( ".date-picker" ).datepicker({
        dateFormat: "dd/mm/yy",        
        changeYear: true,
        changeMonth: true,
        yearRange: "2000:2050"
      });
      <?php
    }
    ?>
  });
</script>
<!-- sect about -->
<?php get_footer() ?>