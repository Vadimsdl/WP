    <div class="footer">
            <div class="footer-top">
                <div class="container">              
                    <?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
                        <ul id="sidebar" class="row">
                            <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                        </ul><!--#sidebar .row-->
                    <?php } ?><!--close if(...){}-->
                </div><!--.container-->
            </div><!--.footer-top-->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-12 order-1 col-sm-5 order-sm-1">
                            <div class="caption-left">
                                Copyright &copy; 2015 All Rights Reserved
                            </div>
                        </div><!--.col-12 .order-1 .col-sm-5 .order-sm-1-->
                        <div class="col-12 order-3 col-sm-2 order-sm-2">
                            <h3 class="button-link">
                                <a>^</a>
                            </h3>
                        </div>
                        <div class="col-12 order-2 col-sm-5 order-sm-3">
                            <div class="caption-right">
                                Theme by BestWebSoft
                            </div>
                        </div><!--.col-12 .order-2 .col-sm-5 .order-sm-3-->
                    </div><!--.row .d-flex-->
                </div><!--.container-->
            </div><!--.footer-bottom-->
        </div><!--.footer-->
    </div><!--.wraper-->
    <?php wp_footer(); ?>
</body>
</html>