<?php get_header('hbox');?>

<?php do_action( 'bp_before_profile_content' ) ?>


	<?php if ( 'edit' == bp_current_action() ) : ?>
		<?php locate_template( array( 'members/single/profile/edit.php' ), true ) ?>

	<?php elseif ( 'change-avatar' == bp_current_action() ) : ?>
		<?php locate_template( array( 'members/single/profile/change-avatar.php' ), true ) ?>

	<?php else : ?>
		<?php locate_template( array( 'members/single/profile/profile-loop.php' ), true ) ?>

	<?php endif; ?>

<?php do_action( 'bp_after_profile_content' ) ?>
<?php wp_footer('hbox');?>