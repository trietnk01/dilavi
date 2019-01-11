<?php unset( $_GET['q'] ); global $acf_pr;  $acf_pr = p_var_ar("acf_pr"); ?>
<!DOCTYPE html>
<html <?php language_attributes() ?> data-user-agent="<?php echo $_SERVER['HTTP_USER_AGENT'] ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="icon" href="<?php echo p_acf_o("logo_favicon") ? p_acf_o("logo_favicon") : P_IMG  . '/wp.png' ?>" sizes="16x16" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if ( is_singular() && pings_open( get_queried_object())) { ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php } ?>
	<!-- Yoast seo build title,description. (No code title,des,keywords)  -->
	<?php wp_head(); ?>

	
	<?php if( !is_localhost() ) { //  google analytics ?> 
	
	
	<?php } ?>

	<?php do_action("p_add_code_head") ?>
	
</head>
<body <?php body_class() ?> id="body-top">
<?php do_action("p_add_code_start_body") ?>
<?php include get_template_directory() . '/pre_body.php'; ?>


        <div class="menu-mobile">
            
            <div class="mobile-lang">
                
                 <a class="<?php echo !is_pvi() ? "active" : ""; ?>" href="<?php echo link_change_lang('en'); ?>">EN</a>
                 <a class="<?php echo is_pvi() ? "active" : ""; ?>" href="<?php echo link_change_lang('vi'); ?>">VN</a>
            </div>
             <?php
                // menu mobile
                wp_nav_menu( array(
                    'theme_location'  => 'mobile',
                    'fallback_cb' => 'custom_primary_menu_fallback',
                    'menu_class'      => 'menu show-ipad-pro hidden-lg hidden-md',
                    'container'       => '',
                    'walker'          => new P_Walker_Nav_Mobile(),
                ) );
            ?>
            <div class="mobile-search">
                 <form action="<?php echo trailingslashit( home_url() ) ?>" method="GET">

                    <div id="search-form-mobile" class="search-form-inner">
                        <input type="text" class="form-control" placeholder="<?php echo t_pll("Tìm kiếm","Search")?>" required name="s" autocomplete="off">
                        <button type="submit"> 
                             <img src="<?php echo P_IMG_DILA ?>/svg/icon-search.svg" class="" alt="img">
                         </button>      
                    </div>                        

                </form>
            </div>
      
        </div>
        <div class="overlay-menu"></div>
        <div class="set-margin-menu-fixed"></div>
        <div class="sc-menu-fixed1">

            <div class="header-menu-mobile p-pt-0 p991-pt-0 hidden-lg hidden-md show-ipad-pro">
                <div class="d-f-box-all">                    
                
              
                <div class="p767-t-c">
                    <div class="p-t-c m-logo">
                       
                        <a href="<?php echo home_url() ?>">
                            <img src="<?php echo p_acf_o("logo_header") ?>"  alt="logo">
                        </a>
                       
                        
                    </div>
                </div>
                
                 <div>
                    <span class="m-btn-toggle">
                        <i class='fa fa-bars'></i>
                    </span>
                </div>
                </div>
            </div>

            <div class="header hidden-xs hidden-sm hidden-ipad-pro">
                <div class="container">
                     <div class="row">
                    <div class="col-md-3">
                        <a href="<?php echo home_url() ?>" class="header-logo">
                           <img src="<?php echo p_acf_o("logo_header") ?>" class="" alt="logo">
                        </a>
                    </div>
                    <div class="col-md-9">
                       <div class="d-f-right head-wrap-menu">
                           
                      
                        <div class="main-menu">
                            
                            <?php
                            // menu primary2
                            $menu_primary = wp_nav_menu( array(
                            'theme_location'  => 'primary',
                            'menu_class'      => 'list-unstyled list-menu1 p-mb-0 p-t-l p991-t-c d-f-box-e',
                            'container'       => '',
                            //'walker'          => new Ptheme_Walker_Nav_Mobile(),
                            'echo'   => true
                            ) );    ?>
                        </div>
                        <div class="header-lang-text">                                                    
                            <div class="dropdown">
                              <button type="button" class="btn-lang dropdown-toggle" data-toggle="dropdown">
                                <?php                                  
                                if(strcmp($acf_pr, '_en')==0){
                                    echo 'EN';                                    
                                }else{        
                                    echo 'VN';                            
                                }
                                ?>                                
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo link_change_lang('en'); ?>">EN</a>
                                <a class="dropdown-item" href="<?php echo link_change_lang('vi'); ?>">VN</a>                                
                              </div>
                            </div>
                        </div>
                       <div class="header-search">
                                <a href="#search" class="header-search-icon">

                                     <img src="<?php echo P_IMG_DILA ?>/svg/icon-search2.svg" class="" alt="img">

                                </a>
                               
                            </div>
                       </div>
                    </div>
                </div>
                </div>
               
            </div>
            <div class="line-bg-gradient" style="height: 2px;"></div>
        </div>


<!-- Search Form -->
<div id="search"> 
    <span class="close">X</span>
    <form role="search" id="searchform" action="<?php echo trailingslashit( home_url() ) ?>" method="get">
        <div class="search-inner">
            <input value="" name="s" type="search" placeholder="<?php echo t_pll('Tìm kiếm',"Search") ?>" autocomplete="off"/>
            <button type="submit" class="" value="">
                <img src="<?php echo P_IMG_DILA ?>/svg/search-w.svg" class="" alt="img">            
            </button>    
        </div>
        
    </form>
</div>
<?php 
/*
	@hooked p_add_breadcrum() - 10
*/
do_action('p_after_header') ?>
