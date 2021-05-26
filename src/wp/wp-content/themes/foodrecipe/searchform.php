<form action="/" method="get">
    <div style="border: 1px solid black; margin-right: 25px" >
        <input type="text" name="s" id="search" placeholder="Search in Blog" value="<?php the_search_query(); ?>" style="padding-top: 2px; border: none;" />
        <input type="image" alt="Search" src="<?php echo get_template_directory_uri(); ?>/Image/loupe1.png" width="21px" />
    </div>
</form>