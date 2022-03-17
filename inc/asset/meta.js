jQuery(document).ready(function($){
    $('.colorpicker').wpColorPicker();	    

    var $jlmedia_upload_button = jQuery('.jlmedia-gallery-upload-btn');
    var $jlmedia_clear_button = jQuery('.jlmedia-gallery-clear-btn');
    
    wp.media.customlibEditGallery1 = {

      frame: function() {

        if ( this._frame )
          return this._frame;

        var selection = this.select();

        this._frame = wp.media({
          id: 'jlmedia_portfolio-image-gallery',
          frame: 'post',
          state: 'gallery-edit',
          title: wp.media.view.l10n.editGalleryTitle,
          editing: true,
          multiple: true,
          selection: selection
        });

        this._frame.on('update', function() {

          var controller = wp.media.customlibEditGallery1._frame.states.get('gallery-edit');
          var library = controller.get('library');
          var ids = library.pluck('id');

          $input_gallery_items.val(ids);

          jQuery.ajax({
            type: "post",
            url: ajaxurl,
            data: "action=shareblock_jlmedia_gallery_upload_get_images&ids=" + ids,
            success: function(data) {

              $thumbs_wrap.empty().html(data);

            }
          });

        });

        return this._frame;
      },

      init: function() {

        $jlmedia_upload_button.on("click", function(event) {

          $thumbs_wrap = $(this).parent().prev().prev();
          $input_gallery_items = $thumbs_wrap.next();

          event.preventDefault();
          wp.media.customlibEditGallery1.frame().open();

        });

        $jlmedia_clear_button.on("click", function(event) {

          $thumbs_wrap = $jlmedia_upload_button.parent().prev().prev();
          $input_gallery_items = $thumbs_wrap.next();

          event.preventDefault();
          $thumbs_wrap.empty();
          $input_gallery_items.val("");
        });
      },

      select: function() {

        var shortcode = wp.shortcode.next('gallery', '[gallery ids="' + $input_gallery_items.val() + '"]'),
          defaultPostId = wp.media.gallery.defaults.id,
          attachments, selection;

        if (!shortcode)
          return;

        shortcode = shortcode.shortcode;

        if (_.isUndefined(shortcode.get('id')) && !_.isUndefined(defaultPostId))
          shortcode.set('id', defaultPostId);

        attachments = wp.media.gallery.attachments(shortcode);
        selection = new wp.media.model.Selection(attachments.models, {
          props: attachments.props.toJSON(),
          multiple: true
        });

        selection.gallery = attachments.gallery;

        selection.more().done(function() {
          selection.props.set({
            query: false
          });
          selection.unmirror();
          selection.props.unset('orderby');
        });

        return selection;

      }

    };
    $(wp.media.customlibEditGallery1.init);


  if ( $('.jl_nab_tab').length > 0 ) {
    custom_meta_tab();
  }
  function custom_meta_tab() {

    var $group = $('.group'),
      $navtabs = $('.jl_nab_tab a'),
      active_tab = '';

    $group.hide();

    if ( typeof(localStorage) != 'undefined' ) {
      active_tab = localStorage.getItem('active_tab');
    }

    if ( active_tab != '' && $(active_tab).length ) {
      $(active_tab).show();
      $(active_tab + '-tab').addClass('nav-tab-active');
    } else {
      $('.group:first').show();
      $('.jl_nab_tab a:first').addClass('nav-tab-active');
    }

    $navtabs.click(function(e) {

      e.preventDefault();

      $navtabs.removeClass('nav-tab-active');

      $(this).addClass('nav-tab-active').blur();

      if (typeof(localStorage) != 'undefined' ) {
        localStorage.setItem('active_tab', $(this).attr('href') );
      }

      var selected = $(this).attr('href');

      $group.hide();
      $(selected).show();

    });
  }


  JlCustomFonts = {
    init: function()
    {
      this._fileUploads();
    },
    _fileUploads: function()
    {
      var file_frame;
      window.inputWrapper = '';
      $( document.body ).on('click', '.jl-custom-fonts-upload', function(event) {
        event.preventDefault();
        var button = $(this),
            button_type = button.data('upload-type');
            window.inputWrapper = $(this).closest('.jl-custom-fonts-file-wrap');

          if ( file_frame ) {
            file_frame.open();
            return;
          }

          file_frame = wp.media.frames.file_frame = wp.media({
            multiple: false
          });

          file_frame.on( 'select', function() {

              var attachment = file_frame.state().get('selection').first().toJSON();
                window.inputWrapper.find( '.jl-custom-fonts-link' ).val(attachment.url);
            });
        file_frame.open();
      });
      var file_frame;
      window.inputWrapper = '';
    },
  }

  $( document ).ajaxComplete(function( event, request, settings ) {
    if( settings.data && "action=add-tag" === settings.data.split("&")[0]){
      location.reload();
    }
    });

  $(function(){
    JlCustomFonts.init();
  });

  
});

if (jQuery('#jelly_cat_header_image_id').val() == 0)
         jQuery('.jelly_remove_header').hide();

        var jelly_header_file_frame;
        jQuery(document).on( 'click', '.jelly_upload_header', function( event ){

          event.preventDefault();

          if ( jelly_header_file_frame ) {
            jelly_header_file_frame.open();
            return;
          }

          jelly_header_file_frame = wp.media.frames.downloadable_file = wp.media({
            title: 'Choose an image',
            button: {
              text: 'Use image',
            },
            multiple: false
          });

          jelly_header_file_frame.on( 'select', function() {
            attachment = jelly_header_file_frame.state().get('selection').first().toJSON();
            jQuery('#jelly_cat_header_image_id').val( attachment.id );
            jQuery('#jelly_cat_header img').attr('src', attachment.url );
            
          });

          jelly_header_file_frame.open();
        });

        jQuery(document).on( 'click', '.jelly_remove_header', function( event ){
          jQuery('#jelly_cat_header img').attr('src', '');
          jQuery('#jelly_cat_header_image_id').val('');
          
          return false;
        });