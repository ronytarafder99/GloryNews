jQuery(document).ready(function () {

    // open Search
    var searchoutput = jQuery('.search_inner');
    jQuery('.search_icon').on('click', function () {
        searchoutput.animate({
            width: "toggle"
        }, function () {
            // remove the Search overlay when clicking outside the Search
            jQuery(document).one('click', function (e) {
                if (!searchoutput.is(e.target) && searchoutput.has(e.target).length === 0) {
                    searchoutput.animate({
                        width: "toggle"
                    });
                }
            });
        });
    });

    // mobile Drop Menu
    jQuery('#bars').click(function () {
        jQuery('#home').toggle();
        jQuery('.search_icon').toggle();
        jQuery('#bars').toggle();
        jQuery('.cross_icon').toggle();
        jQuery('.scrollmenu').toggle();
        jQuery('.header_mobile_menu').slideToggle();
    });
    jQuery('.cross_icon').click(function () {
        jQuery('#home').toggle();
        jQuery('.search_icon').toggle();
        jQuery('#bars').toggle();
        jQuery('.scrollmenu').toggle();
        jQuery('.cross_icon').toggle();
        jQuery('.header_mobile_menu').slideToggle();
    });

    // Tab post(Leatest-popular)
    jQuery('.leatest_btn').addClass("opened");
    jQuery('.second_item').hide();
    jQuery('.leatest_btn').click(function () {
        jQuery('.leatest_btn').addClass("opened");
        jQuery('.popular_btn').removeClass("opened");
        jQuery('.second_item').hide();
        jQuery('.first_item').show();
    });
    jQuery('.popular_btn').click(function () {
        jQuery('.popular_btn').addClass("opened");
        jQuery('.leatest_btn').removeClass("opened");
        jQuery('.first_item').hide();
        jQuery('.second_item').show();
    });

    // Sticky Nav
    var navoffset = jQuery(".bottom_parent").offset().top;

    jQuery(".bottom_parent").wrap('<div class="nav-placeholder"></div>');
    jQuery(".nav-placeholder").height(jQuery(".bottom_parent").outerHeight());

    jQuery(window).scroll(function () {
        var scrollpos = jQuery(window).scrollTop();
        if (scrollpos >= navoffset) {
            jQuery(".bottom_parent").addClass("fixed");

        } else {
            jQuery(".bottom_parent").removeClass("fixed");
        };
    });


    /* Ajax functions for cat*/
    jQuery(document).on('click', '.sunset-load-more', function () {

        var that = jQuery(this);
        var page = jQuery(this).data('page');
        var newPage = page + 1;
        var ajaxurl = that.data('url');
        var cat = that.data('category');
        jQuery('.animation_image').css("display", "block");

        jQuery.ajax({

            url: ajaxurl,
            type: 'post',
            data: {
                cat: cat,
                page: page,
                action: 'sunset_load_more'

            },
            error: function (response) {
                console.log(response);
            },
            success: function (response) {

                jQuery('.animation_image').css("display", "none");
                that.data('page', newPage);
                jQuery('.sunset-posts-container').append(response);

            }
        });
    });

    // tab Post Ajax
    jQuery('.nav-tabs li a').click(function () {
        var that = jQuery(this);
        var cat = that.data('category');
        var ajaxurl = that.data('url');

        jQuery.ajax({

            url: ajaxurl,
            type: 'post',
            data: {
                cat: cat,
                action: 'home_page_tab_post'

            },
            error: function (response) {
                console.log(response);
            },
            success: function (response) {
                jQuery('#tab_post_container').empty().append(response);
            }
        });
    });

});

jQuery(window).load(function () {
    jQuery('.flexslider').flexslider({
        animation: "slide"
    });
});

jQuery(window).load(function () {
    jQuery('.carousel').flexslider({
        animation: "slide",
        animationLoop: true,
        itemWidth: 250,
        slideshowSpeed: 3000,
        animationSpeed: 2000,
        itemMargin: 5,
        minItems: 3,
        maxItems: 3,
    });
});
//Go to top button
var mybutton = document.getElementById("myBtn");

window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

function topFunction() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
};
