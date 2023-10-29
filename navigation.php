<div class="main-site-nav-wrapper">

        <div class="mobile-control">
            <div class="nav--logo"></div>

            <button class="nav--hamburger">
                <svg id="hamburger" class="Header__toggle-svg" viewbox="0 0 60 40">
                    <g stroke="#000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                        <path id="top-line" d="M10,10 L50,10 Z"></path>
                        <path id="middle-line" d="M10,20 L50,20 Z"></path>
                        <path id="bottom-line" d="M10,30 L50,30 Z"></path>
                    </g>
                </svg>
            </button>
        </div>
       

        <nav class="main-site-nav ">

        <?php
        //insert navigation
        wp_nav_menu(
            array(
                'menu'       => 'Main menu',
                'menu_class' => 'main-menu-flyout primary-navlist',
                'theme_location' => 'Menu Name',
                'depth'      => 0,
                'container'  => false,
                'menu_id' => 'flyout-navigation',
                //'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                //'walker'            => new WP_Bootstrap_Navwalker()
                'walker'            => new Standalone_Wordpress_Navwalker()

            )
        );
        ?>

        <?php
        //insert navigation
        wp_nav_menu(
            array(
                'menu'       => 'Call To Action',
                'menu_class' => 'main-menu-cta primary-navlist',
                'theme_location' => 'Call To Action',
                'depth'      => 0,
                'container'  => false,
                'menu_id' => 'main-cta-navigation',
                //'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                //'walker'            => new WP_Bootstrap_Navwalker()
                'walker'            => new Standalone_Wordpress_Navwalker()

            )
        );
        ?>

        </nav>

    </div>