(function( $ ) {

    "use strict";
    $( document ).ready( function( ) {
       $( '#foodrecipe_count_post' ).change( function(){
            $(this).parent().submit();
       });
    });
    $( document ).ready( function( ) {
        $( '#foodrecipe_sort_post' ).change( function(){
             $(this).parent().submit();
        });
     });
    // javascript code here. i.e.: $(document).ready( function(){} ); 

})(jQuery);

