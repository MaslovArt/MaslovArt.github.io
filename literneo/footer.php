	
	<div class="lfooter">
		<div class="lfootcont">
			<div class="lfootitem">
				<span class="title">Авторские права</span>
				<div class="lficont">
					<span>2018 © LITERNEO</span>
					<span>Все права защищены</span>
				</div>
			</div>
			<div class="lfootitem hidden-md">
				<span class="title">Страницы</span>
				<div class="lficont">
					<?php 
						$args = array(
							'theme_location'    => 'primary',
							'container'     		=> 'ul',
							'conatiner_class'   => 'lfipages',
							'menu_class'        => 'lfipages',
							'a_class'						=> 'defhref smoothlink',
							'walker'        		=> new footer_walker_nav_menu()
						);
						wp_nav_menu( $args );
    			?>
				</div>
			</div>
			<div class="lfootitem">
				<span class="title">Контакты</span>
				<div class="lficont">
					<ul class="lfipages">
						<li><a class="defhref" href="#"><i class="icon-instagram socicon"></i></a></li>
						<li><a class="defhref" href="#"><i class="icon-vkontakte socicon"></i></a></li>
					</ul>
					<span>Воронеж, Россия</span>
				</div>
			</div>
		</div>
		<div class="backwrap flex-center">
			<button class="totop">
				<span>BACK, BABY</span>
				<img src="<?php bloginfo('template_directory'); ?>/img/totop.png" alt="">
			</button>
		</div>
	</div>
</div>