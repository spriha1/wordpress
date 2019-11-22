<!DOCTYPE html>
<html>
    <head>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header class="sticky-top">
            <div class="container navbar">
                <ul class="navbar-nav mr-auto"> 
                    <li class="nav-item active">
                        <?php wp_nav_menu (
                            array(
                                'theme_location' => 'top-menu',
                                'menu_class'     => 'navigation'
                            )
                        ); ?>
                    </li>
                </ul>
            </div>
        </header>