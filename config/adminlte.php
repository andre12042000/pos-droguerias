<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => '',
    'title_prefix' => 'Fácil POS | ',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>POS</b>-VENTA',
    'logo_img' => 'img/Logo500px.png',
    'logo_img_class' => 'brand-image img-circle elevation-5',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'img/Logo150px.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => false,
        'img' => [
            'path' => 'img/Logo150px.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-secondary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => true,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:




        [
            'text'          => 'Inicio ',
            'classes'       => 'text-white',
            'icon'          => 'fa fa-home',
            'icon_color'    => 'info',
            'route'         => 'home',
        ],
        [
            'text'          => 'Notificaciones ',
            'classes'       => 'text-white',
            'icon'          => 'fa fa-bell',
            'icon_color'    => 'info',
            'route'         => 'notificaciones.index',
        ],
        [
            'text'       => 'Reportes',
            'classes'    => 'text-white',
            'icon'       => 'fas fa-chart-bar',
            'icon_color' => 'info',
            'can'        => 'Acceso Reportes',
            'submenu'    => [
                [
                    'text'       => 'Reporte por día',
                    'classes'    => 'text-white',
                    'icon'       => 'far fa-calendar-check',
                    'icon_color' => 'white',
                    'route'      => 'reporte.dia',
                ],
                [
                    'text'       => 'Reporte por fecha',
                    'classes'    => 'text-white',
                    'icon'       => 'far fa-calendar-alt',
                    'icon_color' => 'white',
                    'route'      => 'reporte.fecha',
                ],
            ],
        ],
        [
            'text'       => 'Movimientos',
            'classes'    => 'text-white',
            'icon'       => 'fas fa-cash-register',
            'icon_color' => 'info',
            'can'        => 'Acceso Movimientos',
            'submenu' => [
                [
                    'text'       => 'POS',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-cash-coin',
                    'icon_color' => 'white',
                    'route'      => 'ventas.pos',
                    'can'        => 'Acceso Pos',
                ],
                [
                    'text'       => 'Ventas de Mesa',
                    'classes'    => 'text-white',
                    'icon'       => 'fas fa-table',
                    'icon_color' => 'white',
                    'route'      => 'ventas.restaurant',
                    'can'        => 'Acceso Venta Mesa',
                ],

                [
                    'text'       => 'Cotizaciones',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-file-earmark-diff-fill',
                    'icon_color' => 'white',
                    'route'      => 'cotizaciones.cotizaciones.list',
                    'can'        => 'Acceso Cotizaciones',

                ],
                [
                    'text'       => 'Consumo Interno',
                    'classes'    => 'text-white',
                    'icon'       => 'fas fa-book',
                    'icon_color' => 'white',
                    'route'      => 'consumo_interno.index',
                    'can'        => 'Acceso Consumo Interno',

                ],
                [
                    'text'       => 'Gastos',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-cash-stack',
                    'icon_color' => 'white',
                    'route'      => 'gastos.list',
                    'can'        => 'Acceso Gastos',

                ],
                 [
                    'text'       => 'Ordenes de trabajo',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-list-ol',
                    'icon_color' => 'white',
                    'route'      => 'orders.index',
                    'can'        => 'Acceso Ordenes Trabajo',
                ],
            ],
        ],
        [
            'text'       => 'Facturación',
            'classes'    => 'text-white',
            'icon'       => 'fas fa-receipt',
            'icon_color' => 'info',
            'can'        => 'Acceso Facturacion',
            'submenu' => [
                [
                    'text'       => 'Facturas',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-cart-plus',
                    'icon_color' => 'white',
                    'route'      => 'facturacion.index',
                ],

            ],
        ],
        [
            'text'       => 'Inventarios',
            'classes'    => 'text-white',
            'icon'       => 'bi bi-columns-gap',
            'icon_color' => 'info',
            'can'  => 'Acceso Inventario',
            'submenu' => [
                [
                    'text'       => 'Compras',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-cart-plus',
                    'icon_color' => 'white',
                    'route'      => 'inventarios.purchase',
                    'can'        => 'Acceso Compras',
                ],
                [
                    'text'       => 'Productos',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-basket',
                    'icon_color' => 'white',
                    'route'      => 'inventarios.product',
                    'can'        => 'Acceso Producto',


                ],
                [
                    'text'       => 'Producto stock bajo',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-exclamation-triangle-fill',
                    'icon_color' => 'white',
                    'route'      => 'inventarios.stock.min',
                    'can'        => 'Acceso Producto Stock Bajo',
                ],
            ],
        ],

          [
            'text'       => 'Mantenimiento',
            'classes'    => 'text-white',
            'icon'       => 'fas fa-tools',
            'icon_color' => 'info',
            'can'  => 'Acceso Mantenimiento',
            'submenu' => [
                [
                    'text'       => 'Equipos',
                    'classes'    => 'text-white',
                    'icon'       => 'fas fa-motorcycle',
                    'icon_color' => 'white',
                    'route'      => 'mantenimiento.equipos.list',
                     'can'       => 'Acceso Equipo',
                ],

            ],
        ],

        [
            'text'       => 'Terceros',
            'classes'    => 'text-white',
            'icon'       => 'far fa-address-card',
            'icon_color' => 'info',
            'can'  => 'Acceso Terceros',

            'submenu' => [
                [
                    'text'       => 'Clientes',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-person-lines-fill',
                    'icon_color' => 'white',
                    'route'      => 'terceros.client',
                    'can'        => 'Acceso Clientes',

                ],
                [
                    'text'       => 'Proveedores',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-truck',
                    'icon_color' => 'white',
                    'route'      => 'terceros.provider',
                    'can'        => 'Acceso Proveedores',

                ],
            ],
        ],
        [
            'text'       => 'Parametros',
            'classes'    => 'text-white',
            'icon'       => 'bi bi-collection',
            'icon_color' => 'info',
            'can'  => 'Acceso Parametros',

            'submenu' => [
                [
                    'text'       => 'Categorías',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-bar-chart-steps',
                    'icon_color' => 'white',
                    'route'      => 'parametros.category',
                ],
                [
                    'text'       => 'Subcategorias',
                    'classes'    => 'text-white',
                    'icon'       => 'fas fa-stream',
                    'icon_color' => 'white',
                    'route'      => 'parametros.subcategoria',
                ],
                [
                    'text'       => 'Categoría Gastos',
                    'classes'    => 'text-white',
                    'icon'       => 'fas fa-comment-dollar',
                    'icon_color' => 'white',
                    'route'      => 'parametros.categoriagastos',
                ],
                [
                    'text'       => 'Marcas',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-bookmarks',
                    'icon_color' => 'white',
                    'route'      => 'parametros.brand',
                ],

                [
                    'text'       => 'Métodos De Pago',
                    'classes'    => 'text-white',
                    'icon'       => 'far fa-credit-card',
                    'icon_color' => 'white',
                    'route'      => 'parametros.metodos',
                ],

                [
                    'text'       => 'Presentaciones',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-boxes',
                    'icon_color' => 'white',
                    'route'      => 'parametros.presentaciones',
                ],
                [
                    'text'       => 'Laboratorios',
                    'classes'    => 'text-white',
                    'icon'       => 'fas fa-flask',
                    'icon_color' => 'white',
                    'route'      => 'parametros.laboratorios',
                ],
                [
                    'text'       => 'Ubicaciones',
                    'classes'    => 'text-white',
                    'icon'       => 'fas fa-map-marker-alt',
                    'icon_color' => 'white',
                    'route'      => 'parametros.ubicacion',
                ],
                [
                    'text'       => 'Motivo Anulación',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-slash-circle',
                    'icon_color' => 'white',
                    'route'      => 'parametros.motivoanulacion',
                ],
                [
                    'text'       => 'Seguimiento temperatura',
                    'classes'    => 'text-white',
                    'icon'       => 'fas fa-temperature-high',
                    'icon_color' => 'white',
                    'route'      => 'parametros.sitios.temperatura',
                ],

            ],
        ],

        [
            'text'       => 'Seguridad',
            'classes'    => 'text-white',
            'icon'       => 'bi bi-shield-shaded',
            'icon_color' => 'info',
            'can'  => 'Acceso Seguridad',

            'submenu' => [
                [
                    'text'       => 'Usuarios',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-people-fill',
                    'icon_color' => 'white',
                    'route'      => 'usuarios.index',
                    'can'        => 'Acceso Usuario',

                ],
                [
                    'text'       => 'Roles',
                    'classes'    => 'text-white',
                    'icon'       => 'bi bi-person-badge',
                    'icon_color' => 'white',
                    'route'      => 'roles.index',
                    'can'        => 'Acceso Roles',

                ],
            ],
        ],

        [
            'text'          => 'Configuración',
            'classes'       => 'text-white',
            'icon'          => 'bi bi-gear',
            'icon_color'    => 'info',
            'can'  => 'Acceso Configuración',
            'submenu' => [
                [
                    'text'          => 'Empresa',
                    'classes'       => 'text-white',
                    'icon'          => 'bi bi-building',
                    'icon_color'    => 'white',
                    'route'         => 'empresas',

                ],
                 [
                    'text'          => 'Impresora',
                    'classes'       => 'text-white',
                    'icon'          => 'bi bi-printer',
                    'icon_color'    => 'white',
                    'route'         => 'impresoras',
                ],
            ],
        ],




         [
            'type'         => 'navbar-notification',
            'id'           => 'my-notification',
            'icon'         => 'fas fa-bell ',
            'icon_color' => 'navy',
            'route'         => 'notificaciones.index',


            'topnav_right' => true,
            'dropdown_mode'   => false,
            'dropdown_flabel' => 'Todas las notificaciones',
            'update_cfg'   => [
                'url' => 'notifications/get',
                'period' => 30,
            ],
        ],

        [
            'type'         => 'navbar-notification',
            'id'           => 'my-notifications',
            'icon'         => 'fas fa-temperature-high',
            'icon_color' => 'navy',
            'route'         => 'control.temperatura',


            'topnav_right' => true,
            'dropdown_mode'   => false,

        ],

        [
            'type'         => 'navbar-notification',
            'id'           => 'my-notificatiosn',
            'icon'         => 'far fa-calendar-alt',
            'icon_color' => 'navy',
            'route'         => 'control.vencimientos',


            'topnav_right' => true,
            'dropdown_mode'   => false,

        ],




    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => true,
];
