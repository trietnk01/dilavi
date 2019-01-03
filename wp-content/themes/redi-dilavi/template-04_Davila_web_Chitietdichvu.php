<?php
/*
Template name: Template Dịch vụ chi tiết
Template Post Type: post, page
*/
global $hidden_breadcrum;
$hidden_breadcrum = true;
?>
<?php get_header() ?>
<section class="p-pt-50 p991-pt-30">
  <div class="container">
    <h1 class="heading-sect text-center reset-pseudo p-mb-20">
    <strong>Dịch vụ</strong>
    <img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="img">
    </h1>
    
    <div class="box-service-list">
      
      <div class="row">
        <div class="col-12 col-sm-12 col-lg-5 order-lg-7">
          <div class="box-about-photo">
            <img src="<?php echo P_IMG_DILA ?>/hinhkhachsan1.png" class="img-full" alt="img">
          </div>
        </div>
        <div class="col-12 col-sm-12 col-lg-7 order-lg-5 p991-mt-20">
          <div class="box-about-content">
            
            <h3 class="heading-sect">
            
            <strong>
            CHO THUÊ VĂN PHÒNG
            </strong>
            
            </h3>
            <div class="heading-opac">
              DILAVI
            </div>
            <div class="f2-df p-mt-20">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum laoreet ultrices ultricies. Phasellus nec ex sit amet nibh fermentum gravida mauris pretium.Lorem ipsum dolor sit amet.
              
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
        Hình ảnh khách sạn
      </h2>
      <!-- gallery -->
      <div class="row gallery-list row-xs">
        <?php for ($i=1; $i <=4 ; $i++) { ?>
        <div class="col-6 col-sm-6 col-lg-6 box-xs" data-src="<?php echo P_IMG_DILA ?>/hinhkhachsan<?php echo $i ?>.png">
          <div class="box-img box-item box-img-page">
            <div class="-photo" style="background: url('<?php echo P_IMG_DILA ?>/hinhkhachsan<?php echo $i ?>.png') no-repeat center/cover; padding-top: calc(100% / (455 / 330));">
              <a href="#" class="full-box">
                <img src="<?php echo P_IMG_DILA ?>/hinhkhachsan<?php echo $i ?>.png" class="img-hidden" alt="img">
                
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
<!-- sect about -->
<?php get_footer() ?>