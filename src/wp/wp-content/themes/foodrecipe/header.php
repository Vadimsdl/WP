<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="wraper">
        <div class="header">
            <div class="header-top">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-10 order-1 col-sm-6 order-sm-1 col-md-3 order-md-1 logo">
                            <?php    
                                if ( function_exists( 'the_custom_logo' ) ) {
                                    the_custom_logo();
                                }
                                bloginfo( 'name', 'description' );
                            ?>
                        </div><!--.logo-->
                        <div class="col-2 order-2 col-sm-1 order-sm-3 col-md-7 order-md-2 menu">
                            <nav class="navbar navbar-expand-md navbar-light">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button><!--.navbar-toggler-->
                                <div class="collapse navbar-collapse" id="navbar">
                                    <?php
                                        wp_nav_menu( array(
                                            'theme_location' => 'primary',
                                        ) );
                                    ?>
                                </div><!--.collapse.navbar-collapse#navbar-->
                            </nav><!--.navbar.navbar-expand-md.navbar-light-->
                        </div><!--.menu-->
                        <div class="col-12 order-3 col-sm-5 order-sm-2 col-md-2 order-md-3 register-area">
                            <?php if(get_option( 'users_can_register' ) === '1'){?>
                                <div class="button-register">
                                    <h5>
                                        <a class="link-register" href="<?php echo esc_url( wp_registration_url() ); ?>"><?php esc_html_e( 'Register', 'foodrecipe' ); ?></a>
                                    </h5>
                                </div><!--.button-register--> 
                            <?php }?><!--if(get_option( 'users_can_register' ) === '1'){-->
                            <h2 class="button-area">
                                <a class="link-area" href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>" alt="<?php esc_attr_e( 'Login', 'foodrecipe' ); ?>">
                                    <?php _e( 'Login', 'foodrecipe' ); ?>
                                </a>
                            </h2><!--.button-area--> 
                        </div><!--.register-area-->
                    </div><!--.row-->
                </div><!--.container-->
            </div><!--.hader-top-->
            <div class="slider">
             <?php 
                foodrecipe_display_inslider();
             ?>
            </div><!--.slider-->
        </div><!--.header-->