<div class="slide-menu">
    	<a href="#" class="close-menu">X</a>
    	<div class="site-info">
    		<div class="site-logo center">
    			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
    				<img src="<?php bloginfo('template_url') ?>/img/logo.png" alt="wyTheme">
    			</a>
    		</div>
    		<h1 class="center"><?php bloginfo('name'); ?></h1>
    		<h2 class="center">1Lorem ipsum dolor sit amet, consectetur adipisicing elit. </h2>
    	</div>
        <?php 
            wp_nav_menu(array(
                                'theme_location'  => 'primary',
                                'container'       => 'div', 
                                'container_class' => 'menu-items-container box-shadow',
                                'menu_class'      => 'menu',) );
        ?>
		<div class="searchwrap box-shadow">
            <h4>Поиск</h4>
            <form role="search" method="get" id="searchform">
                <div class="search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" value="Search the site" id="searchBox" name="s" onblur="if(this.value == '') { this.value = 'Search the site'; }" onfocus="if(this.value == 'Search the site') { this.value = ''; }" />
                </div>
            </form>
        </div>
		<?php if(!dynamic_sidebar('sidebar')): ?>

        <?php endif; ?>
    </div>