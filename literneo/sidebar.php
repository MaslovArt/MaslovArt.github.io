<div id="mainmenu" class="lmenuwrap">
    <?php 
        wp_nav_menu(array(
            'theme_location'  => 'primary',
            'container'       => 'ul', 
            'container_class' => 'lmenu',
            'a_class'					=> 'mbtn from-left smoothlink',
            'li_class'				=> 'litem',
            'menu_class'      => 'lmenu',
            'walker'        	=> new footer_walker_nav_menu()
          ) 
      );
    ?>
</div>