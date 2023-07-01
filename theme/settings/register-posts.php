<?php 
add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type( 'blog', [
		'label'  => null,
		'labels' => [
			'name'               => 'Блог', // основное название для типа записи
			'singular_name'      => 'Пост', // название для одной записи этого типа
			'add_new'            => 'Добавить Пост', // для добавления новой записи
			'add_new_item'       => 'Добавление Поста блога', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование поста', // для редактирования типа записи
			'new_item'           => 'Ново пост', // текст новой записи
			'view_item'          => 'Смотреть пост блока', // для просмотра записи этого типа.
			'search_items'       => 'Искать пост', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Блог', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-welcome-write-blog',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

?>