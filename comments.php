<?php
if ( post_password_required() ) {
	return;
}
?>
<?php if ( have_comments() ) : ?>
<div class="single_section_comment">
    <div id="comments" class="comments-area">
        <?php endif; // have_comments() ?>
        <?php if ( have_comments() ) :
	$comments_by_type = separate_comments( $comments );
	$jelly_comments_count = count( $comments_by_type['comment'] );
	$jelly_pings_count = count( $comments_by_type['pings'] );
	?>
        <?php if($jelly_pings_count){?>
        <h4 class="comments-title">
            <?php echo esc_html( sprintf( _n( 'One Ping', '%1$s Pings & Trackbacks', $jelly_pings_count, 'shareblock' ), number_format_i18n( $jelly_pings_count ) ) ); ?>
        </h4>
        <ol class="commentlist">
            <?php wp_list_comments( array( 'callback' => 'shareblock_comment', 'style' => 'ol', 'type' => 'pings' ) ); ?>
        </ol>
        <?php }?>

        <?php if($jelly_comments_count){?>
        <h4 class="comments-title">
            <?php echo esc_html( sprintf( _n( 'One Comment', '%1$s Comments', $jelly_comments_count, 'shareblock' ), number_format_i18n( $jelly_comments_count ) ) ); ?>
        </h4>
        <ol class="commentlist">
            <?php wp_list_comments( array( 'callback' => 'shareblock_comment', 'style' => 'ol', 'type' => 'comment' ) ); ?>
        </ol>
        <?php }?>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav id="comment-nav-below" class="navigation" role="navigation">            
            <div class="nav-previous">
                <?php previous_comments_link( esc_html__( '« Older Comments', 'shareblock' ) ); ?>
            </div>
            <div class="nav-next">
                <?php next_comments_link( esc_html__( 'Newer Comments »', 'shareblock' ) ); ?>
            </div>
        </nav>
        <?php endif;?>
        <?php endif; // have_comments() ?>

        <?php comment_form(
		array(
		'comment_notes_after' => '',
		'fields'                => apply_filters( 'comment_form_default_fields', array(
					                        'author' => '<div class="form-fields row"><span class="comment-form-author col-md-4">' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="'. esc_attr( 'Fullname', 'shareblock' ) .'" /></span>',
					                        'email'  => '<span class="comment-form-email col-md-4"><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" placeholder="'. esc_attr( 'Email Address', 'shareblock' ) .'" /></span>',
					                        'url'    => '<span class="comment-form-url col-md-4"><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="'. esc_attr( 'Web URL', 'shareblock' ) .'" /></span></div>'
									   ) ),
		'comment_field'         => '<p class="comment-form-comment"><textarea class="u-full-width" id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="'. esc_attr( 'Comment', 'shareblock' ) .'"></textarea></p>'
		)
		);?>
        <?php if ( have_comments() ) : ?>
    </div>
</div>
<?php endif; // have_comments() ?>