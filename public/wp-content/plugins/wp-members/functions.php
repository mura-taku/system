<?php 
   add_filter( 'wpmem_sb_forgot_link_str', 'my_forgot_link_str' );
   function my_forgot_link_str( $str ) {
       global $user_login, $wpmem;
       return ' </fieldset><a href="' . add_query_arg( 'a', 'pwdreset', $wpmem->user_pages['profile'] ) . '" id="forgot_link">パスワードを わすれた おろかものは こちら　≫</a>';
   }