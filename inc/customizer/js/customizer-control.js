jQuery( document ).ready( function($) {
	"use strict";
	$( '.jlc-image-select input' ).on( 'change', function () {
		var $this = $( this ), type = $this.attr( 'type' ), selected = $this.is( ':checked' ), $parent = $this.parent(), $others = $parent.siblings();
		if ( selected ) {
			$parent.addClass( 'asw-active' );
			if ( type === 'radio' ) { $others.removeClass( 'asw-active' ); }
		} 
		else{ $parent.removeClass( 'asw-active' ); }
	});
	$( '.jlc-image-select input' ).trigger( 'change' );	

	var $container = $('#customize-header-actions');
    var $button = $('<input type="submit" name="optreset" id="optreset" class="button-secondary button">')
        .attr('value', shareblock_customizer_reset.reset)
        .css({
            'float': 'right',
            'margin-right': '10px',
            'margin-top': '9px'
        });

    $button.on('click', function (event) {
        event.preventDefault();

        var data = {
            wp_customize: 'on',
            action: 'customizer_reset',
            nonce: shareblock_customizer_reset.nonce.reset
        };

        var r = confirm(shareblock_customizer_reset.confirm);

        if (!r) return;

        $button.attr('disabled', 'disabled');

        $.post(ajaxurl, data, function () {
            wp.customize.state('saved').set(true);
            location.reload();
        });
    });

    $container.append($button);	
   
})

