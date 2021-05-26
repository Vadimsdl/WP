<?php get_header(); ?>
    <div class="content-wraper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-9">
                    <div class="top-navigation">
                        <div class="row">
                            <div class="col-12 col-sm-5 col-md-6">
                                <?php 
                                    global $wp_query;
                                    echo sprintf( '%s posts found', $wp_query->found_posts ); 
                                ?>
                            </div><!--.col-12.col-sm-5.col-md-6-->
                            <div class="col-12 col-sm-7 col-md-6">
                                <form method="POST">
                                    <span class="count_post">
                                    <?php _e( 'Show','foodrecipe' ); ?>
                                        <select id="foodrecipe_count_post" name="foodrecipe_count_post">
                                            <option value="10" <?php selected($_SESSION[ 'foodrecipe_count_post' ], 10); ?>>10 <?php _e( 'items','foodrecipe' ); ?> </option>
                                            <option value="15" <?php selected($_SESSION[ 'foodrecipe_count_post' ], 15); ?>>15 <?php _e( 'items','foodrecipe' ); ?> </option>
                                            <option value="20" <?php selected($_SESSION[ 'foodrecipe_count_post' ], 20); ?>>20 <?php _e( 'items','foodrecipe' ); ?> </option>
                                        </select><!--#foodrecipe_count_post.foodrecipe_count_post-->
                                    </span><!--.count_post-->
                                    <span class="sort_post">
                                        <?php _e( 'Sort by ','foodrecipe' ); ?>
                                        <select id="foodrecipe_sort_post" name="foodrecipe_sort_post">
                                            <option value="title" <?php selected($_SESSION[ 'foodrecipe_sort_post' ], 'title'); ?>><?php _e( 'Title','foodrecipe' ); ?></option>
                                            <option value="date" <?php selected($_SESSION[ 'foodrecipe_sort_post' ], 'date'); ?>><?php _e( 'Date','foodrecipe' ); ?></option>
                                        </select><!--#foodrecipe_sort_post.foodrecipe_sort_post-->
                                    </span><!--.sort_post-->
                                </form><!--method POST end form-->
                            </div><!--.col-12.col-sm-7.col-md-6-->
                        </div><!--.row-->
                    </div><!--.top-navigation-->
                    <div class="post-container">
                        <!-- Start the Loop. -->
                        <?php if ( have_posts() ) : 
                            while ( have_posts() ) : the_post(); ?>
                                <div class="post">
                                    <!-- Display the Title as a link to the Post's permalink. -->
                                    <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'foodrecipe' ); ?><?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                    <small><!--POSTED BY / DAYS AGO / LIKES / COMMENTS-->
                                        <?php echo __( 'Posted by', 'foodrecipe' ) . ' '; ?>
                                        <?php the_author_posts_link(); ?><!-- who posted post and link on this author -->
                                        <span>/</span>
                                        <!-- this i counting the number of days, mounts and years-->
                                        <?php $now = time(); // live time
                                            $your_date = strtotime(get_the_date('Y-m-d')); // date posts
                                            $datediff = -$your_date+$now; // counting in seconds

                                            $days = floor($datediff / (60 * 60  * 24)); // transform to days
                                            switch($days){
                                                case $days<31://if day less 31 days then i cout count of days ago
                                                    echo $days . ' days ago';
                                                break;
                                                case $days>=31://if day more or equally 31 days then i cout count mounth ago
                                                    echo floor($days / (24)) . ' mounths ago';//transform to mounths
                                                break;
                                                case $days>=365://if day more or equally 365 days then i cout count years ago
                                                    echo floor($days / (24 * 12)) . ' years ago';//transform to years
                                                break;
                                                    default://if something went wrong
                                                    echo 'Have not date';
                                                    break;
                                            }
                                        ?>
                                        <span>/</span>
                                        <span> 13 likes /</span>
                                        <?php _e( 'comments', 'foodrecipe' ); ?>
                                        <?php echo get_comments_number(); ?><!--counting comments-->
                                    </small><!--POSTED BY / DAYS AGO / LIKES / COMMENTS-->
                                    <?php the_post_thumbnail('foodrecipe-post-thumbnail'); ?>
                                    <!-- Display the Post's content in a div box. -->
                                    <div class="entry">
                                        <?php the_excerpt(); ?>
                                    </div><!--.entry-->
                                </div><!--.post-->
                                <!-- Stop The Loop (but note the "else:" - see next line). -->
                            <?php endwhile; 
                        else : ?>
                            <!-- The very first "if" tested to see if there were any Posts to -->
                            <!-- display.  This "else" part tells what do if there weren't any. -->
                            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                        <!-- REALLY stop The Loop. -->
                        <?php endif; ?>
                    </div><!--.post-container-->
                    <div class="bottom-navigation">
                        <?php 
                            $big = 999999999; // need an unlikely integer    
                            echo paginate_links( array(
                                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format' => '?paged=%#%',
                                'current' => max( 1, get_query_var('paged') ),
                                'total' => $wp_query->max_num_pages
                            ) );
                        ?>
                    </div><!--.bottom-navigation-->
                </div><!--.col-12 .col-sm-8 .col-md-9-->
                <div class="col-12 col-sm-4 col-md-3 sidbar">
                    <?php get_sidebar(); ?>
                </div><!--.col-12.col-sm-4.col-md-3.sidbar-->
            </div><!--.row-->
        </div><!--.container-->
    </div><!--.content-wraper-->
<?php get_footer(); ?>