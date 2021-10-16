<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => '',
    'title_prefix' => 'INFOasistencia | ',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>INFO</b>asistencia',
    /*'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',*/
    'logo_img' => 'favicons/favicon.ico',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'INFOasistencia',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#71-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#721-authentication-views-classes
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#722-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#73-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#74-control-sidebar-right-sidebar
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => '/',

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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#92-laravel-mix
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#8-menu-configuration
    |
    */

    'menu' => [
        [
            'text'   => 'search',
            'search' => true,
            'topnav' => true,
            'url'    => '',
            'method' => 'post'
        ],
        [
            'text'   => 'link 1',
            'url'    => '#',
            'topnav' => true
        ],
        [
            'text' => 'link 2',
            'url'  => '#',
            'topnav_right' => true
        ],
        [
            'text' => 'link 3',
            'url'  => '#',
            'topnav_user' => true
        ],
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],

        [
            'text'  =>'Dashboard',
            'route' => 'admin.home',
            'icon'  => 'fas fa-fw fa-home',
            'label' => 'Inicio',
            'label_color' => 'danger',
            'icon_color'  =>'green',
            'can'   => 'admin.home',
        ],


        ['header' => 'OPCIONES DE BLOG'],
        [
            'text'   => 'Categorías',
            'route'  => 'admin.categories.index',
            'icon'   => 'fab fa-fw fa-buffer',
            'active' => ['admin/categories*'],
            'can'    => 'admin.categories.index',
        ],
        [
            'text'   => 'Etiquetas (tags)',
            'route'  => 'admin.tags.index',
            'icon'   => 'far fa-fw fa-bookmark',
            'active' => ['admin/tags*'],
            'can'    => 'admin.tags.index',
        ],
        [
            'text'  => 'Artículos (posts)',
            'route' => 'admin.posts.index',
            'icon'  => 'fas fa-fw fa-clipboard',
            'active' => ['admin/posts/*'],
            'can'   => 'admin.posts.index',
        ],
        [
            'text'  => 'Ofertas',
            'route' => 'admin.ofertas.index',
            'icon'  => 'fas fa-fw fa-clipboard',
            'active' => ['admin/ofertas*'],
            'can'   => 'admin.ofertas.index',
        ],
        [
            'text'  => 'Servicios',
            'route' => 'admin.servicios.index',
            'icon'  => 'fas fa-fw fa-file',
            'active' => ['admin/servicios*'],
            'can'   => 'admin.servicios.index',
        ],


        ['header' => 'OPCIONES DE COSTOS'],
        [
            'text'    => 'Grupos de Datos',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'Grupo de Equipos',
                    'route'  => 'admin.grupo_equipos.index',
                ],
                [
                    'text' => 'Grupo de Materiales',
                    'route'  => 'admin.grupo_materials.index',
                ],
                [
                    'text' => 'Grupo de Mano de obra',
                    'route'  => 'admin.grupo_obreros.index',
                ],
            ],
        ],
        [
            'text'    => 'Datos',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'Equipos',
                    'route'  => 'admin.equipos.index',
                ],
                [
                    'text' => 'Materiales',
                    'route'  => 'admin.materials.index',
                ],
                [
                    'text' => 'Mano de obra',
                    'route'  => 'admin.obreros.index',
                ],
                [
                    'text' => 'Transportes',
                    'route'  => 'admin.transportes.index',
                ],
                [
                    'text'   => 'Generales',
                    'route'  => 'admin.generals.index',
                ],
                [
                    'text' => 'Indirectos',
                    'route'  => 'admin.indirectos.index',
                ],
                [
                    'text' => 'Indices',
                    'route'  => 'admin.indices.index',
                ],
            ],
        ],
        [
            'text'   => 'Precios unitarios',
            'route'  => 'admin.precios.index',
            'icon'   => 'fab fa-fw fa-buffer',
        ],
        [
            'text'   => 'Proyectos',
            'route'  => 'admin.proyectos.index',
            'icon'   => 'far fa-fw fa-bookmark',
        ],


        ['header' => 'CONFIGURACION DE CUENTA'],
        [
            'text'  => 'Areas de actividad ',
            'route' => 'admin.zonas.index',
            'icon'  => 'fas fa-map-marker-alt',
            'active'=> ['admin/zonas*'],
            'can'   => 'admin.zonas.index',
        ],
        [
            'text'  => 'Grupos de usuario',
            'route' => 'admin.groups.index',
            'icon'  => 'fas fa-users fa-fw',
            'active' => ['admin/groups*'],
            'can'    => 'admin.groups.index',
        ],
        [
            'text'  => 'Usuarios',
            'route' => 'admin.users.index',
            'icon'  => 'fas fa-fw fa-clipboard',
            'active' => ['admin/users*'],
            'can'   => 'admin.users.index',
        ],
        [
            'text'  => 'Permisos',
            'route' => 'admin.permissions.index',
            'icon'  => 'fas fa-user-lock fa-fw',
            'active' => ['admin/permissions*'],
            'can'   => 'admin.permissions.index'
        ],
        [
            'text'  => 'Roles',
            'route' => 'admin.roles.index',
            'icon'  => 'fas fa-user-cog fa-fw',
            'active' => ['admin/roles*'],
            'can'   => 'admin.roles.index',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#83-custom-menu-filters
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#91-plugins
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
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
            'active' => false,
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
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
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
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#93-livewire
    */

    'livewire' => true,
];
