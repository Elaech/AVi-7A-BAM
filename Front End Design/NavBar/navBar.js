<script type="text/javascript">
jQuery(document).ready(function($) {
/*test for touch events support and if not supported, attach .no-touch class to the HTML tag.
 Uncomment and use the snipplet below if you don't use latest versions of Modernizr.js
 https://www.prowebdesign.ro/how-to-deal-with-hover-on-touch-screen-devices/    The source of this code
 */
 
    /*if (!("ontouchstart" in document.documentElement)) {
    document.documentElement.className += " no-touch";
    */}

    /*make filters hover behavior switch to tap/clcik on touch screens*/
    if (!$('html').hasClass('no-touch')) { /*Execute code only on a touch screen device*/
     
        /*Show #filter1 drop-down and hide #filter2 drop-down if it was open*/
        $('#filter1').bind('touchstart', function(e) {
            $("#filter1 ul.children").toggle();
            $("#filter2 ul.children").css('display','none');
            e.stopPropagation(); /*Make all touch events stop at the #filter1 container element*/
        });
        /*Show #filter2 drop-down and hide #filter1 drop-down if it was open*/
        $('#filter2').bind('touchstart', function(e) {
            $("#filter2 ul.children").toggle();
            $("#filter1 ul.children").css('display','none');
            e.stopPropagation(); /*Make all touch events stop at the #filter2 container element*/
        });
         
        $(document).bind('touchstart', function(e) {
                $(".filters ul.children").fadeOut(300); /*Close filters drop-downs if user taps ANYWHERE in the page*/
        }); 
         
        $('.filters ul.children').bind('touchstart', function(event){
                event.stopPropagation(); /*Make all touch events stop at the #filter1 ul.children container element*/
        });
         
        $(".filters ul.children a").click(function () {
              $(".filters ul.children").fadeOut(300); /*Close filters drop-downs if user taps on any link in drop-down*/
        });
     
    }
         
});
</script>