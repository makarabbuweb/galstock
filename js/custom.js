jQuery(document).ready(function ($) {
"use strict";
$('.menu_mobile_icons, .mobile_menu_overlay').on("click", function() {
    $('#content_nav').toggleClass('jl_mobile_nav_open');
    $('.mobile_menu_overlay').toggleClass('mobile_menu_active');
    $('.mobile_nav_class').toggleClass('active_mobile_nav_class');
});


$('.widget_nav_menu ul > li.menu-item-has-children').on( 'click', function(){
        var parentMenu = jQuery(this);        
        parentMenu.toggleClass('active');        
        return false;
    });

$("#mobile_menu_slide .menu-item-has-children > a").append($("<span/>", {
    class: 'arrow_down'
}).html('<i class="jli-down-chevron-1" aria-hidden="true"></i>'));
$('#mobile_menu_slide .arrow_down i').on("click", function() {
    var $submenu = $(this).closest('.menu-item-has-children').find(' > .sub-menu');
    $(this).toggleClass("jli-down-chevron-1").toggleClass("jli-up-chevron-1");
    if ($submenu.hasClass('menu-active-class')) {
        $submenu.removeClass('menu-active-class');
    } else {
        $submenu.addClass('menu-active-class');
    }
    return false;
});
$('.search_form_menu_personal_click').on("click", function() {
    $('.search_form_menu_personal').toggleClass('search_form_menu_personal_active');
    $('.mobile_nav_class').toggleClass('active_mobile_nav_class');
    setTimeout(function() {
        $('.search_form_menu_personal').find('.search_btn').focus()
    }, 100)

});

$(document).keyup(function(e) {
    if (e.keyCode == 27) {
        $('.search_form_menu_personal.search_form_menu_personal_active').toggleClass('search_form_menu_personal_active');    
        $('.mobile_nav_class.active_mobile_nav_class').toggleClass('active_mobile_nav_class');
    }
});

$('.search_form_menu_click').on('click', function(e) {
    e.preventDefault();
    $('.search_form_menu').toggle();
    $(this).toggleClass('active');
});
if ($('.sb-toggle-left').length) {
    $('.sb-toggle-left').on("click", function() {
        $('#nav-wrapper').toggle(100);
    });
    $("#menu-main-menu .menu-item-has-children > a").append($("<span/>", {
        class: 'arrow_down'
    }).html('<i class="jli-down-chevron-1"></i>'));
}

$('#nav-wrapper .menu .arrow_down').on("click", function() {
    var $submenu = $(this).closest('.menu-item-has-children').find(' > .sub-menu');

    if ($submenu.hasClass('menu-active-class')) {
        $submenu.removeClass('menu-active-class');
    } else {
        $submenu.addClass('menu-active-class');
    }

    return false;
});

$('.jl_pop_vid').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,
          fixedContentPos: true
});

$(document).on( 'click', '.del_list', function() {
        var id = $(this).data('id');
        var nonce = $(this).data('nonce');
        var post = $(this).parents('.post:first');
        $.ajax({
            type: 'post',
            url: ajaxcalls_vars.ajaxurl,
            data: {
                action: 'my_delete_post',
                nonce: nonce,
                id: id
            },
            success: function( result ) {
                if( result == 'success' ) {
                    post.fadeOut( function(){
                        post.remove();
                    });
                document.location.href = ajaxcalls_vars.list_media_page;
                }
            }
        })
        return false;
    })


});

