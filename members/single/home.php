<?php do_action( 'bp_before_member_body' );

        if ( bp_is_user_activity() || !bp_current_component() ) :
          locate_template( array( 'members/single/activity.php'  ), true );

         elseif ( bp_is_user_blogs() ) :
          locate_template( array( 'members/single/blogs.php'     ), true );

        elseif ( bp_is_user_friends() ) :
          locate_template( array( 'members/single/friends.php'   ), true );

        elseif ( bp_is_user_groups() ) :
          locate_template( array( 'members/single/groups.php'    ), true );

        elseif ( bp_is_user_messages() ) :
          locate_template( array( 'members/single/messages.php'  ), true );

        elseif ( bp_is_user_profile() ) :
          locate_template( array( 'members/single/profile.php'   ), true );

        elseif ( bp_is_user_forums() ) :
          locate_template( array( 'members/single/forums.php'    ), true );

        elseif ( bp_is_user_settings() ) :
          locate_template( array( 'members/single/settings.php'  ), true );

        elseif ( bp_is_user_notifications() ) :
          locate_template( array( 'members/single/notifications.php' ), true );

        // If nothing sticks, load a generic template
        else :
          locate_template( array( 'members/single/plugins.php'   ), true );

        endif;

        do_action( 'bp_after_member_body' ); ?>