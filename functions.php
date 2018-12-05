<?php 
//add_theme_support('menus'); //Add menus
register_nav_menus(['header-menu'=>'Верхнее меню']);

add_theme_support( 'custom-logo' ); //Add logo

add_theme_support( 'html5', array( 'search-form' ) );

add_theme_support('post-thumbnails'); // Add thumbnails
add_image_size( 'thumb185', 185, 185, true );
add_image_size( 'thumb70', 70, 70, true );
add_image_size( 'sliderimg', 200, 150, true );

function register_my_widgets(){
	register_sidebar( array(
		'name' => "Правая боковая панель сайта",
		'id' => 'right-sidebar',
		'description' => 'Эти виджеты будут показаны в правой колонке сайта',
		'before_title' => '<h1>',
		'after_title' => '</h1>'
	) );
}
add_action( 'widgets_init', 'register_my_widgets' );

 function js_variables(){
     $variables = array (
         'ajax_url' => admin_url('admin-ajax.php'),
         'is_mobile' => wp_is_mobile()
         // Тут обычно какие-то другие переменные
     );
     echo '<script type="text/javascript">window.wp_data = ' . json_encode($variables) . ';</script>';
 }
 add_action('wp_head','js_variables');


function new_article_sidebar(){
    $new_post = new WP_Query('showposts=4&post_status=publish' );
    while ( $new_post->have_posts() ) {
        $new_post->the_post();
        $cat = get_the_category(); 
        echo '<a class="pub-item-sidebar" href="'.get_permalink().'">
                    <div class="pub-item-sidebar-container">
                        <div class="category-pub-item-sidebar">'.$cat[0]->name.'</div>
                        <div class="title-pub-item-sidebar">'.get_the_title().'</div>
                        <div class="date-pub-item-sidebar">'.get_the_date().'</div>
                        <div class="view-pub-item-sidebar"><img src="'. get_template_directory_uri().'/assets/img/icons/eye-green.svg" alt="">'.get_post_views(get_the_id()).'</div>
                    </div>
                </a>';
    }
    wp_reset_query();
    die();
}

//Действия для вызова процедуры формирования справочника
add_action('wp_ajax_newa', 'new_article_sidebar');  //Работает для залогиненых пользователей
add_action('wp_ajax_nopriv_newa', 'new_article_sidebar'); //Работает для не залогиненых пользователей

function popular_article_sidebar(){
    $populargb = new WP_Query('showposts=4&meta_key=post_views_count&orderby=meta_value_num' );
    while ( $populargb->have_posts() ) {
        $populargb->the_post();
        $cat = get_the_category(); 
        echo '<a class="pub-item-sidebar" href="'.get_permalink().'">
                    <div class="pub-item-sidebar-container">
                        <div class="category-pub-item-sidebar">'.$cat[0]->name.'</div>
                        <div class="title-pub-item-sidebar">'.get_the_title().'</div>
                        <div class="date-pub-item-sidebar">'.get_the_date().'</div>
                        <div class="view-pub-item-sidebar"><img src="'. get_template_directory_uri().'/assets/img/icons/eye-green.svg" alt="">'.get_post_views(get_the_id()).'</div>
                    </div>
                </a>';
    }
    wp_reset_query();
    die();
}

//Действия для вызова процедуры формирования справочника
add_action('wp_ajax_newp', 'popular_article_sidebar');  //Работает для залогиненых пользователей
add_action('wp_ajax_nopriv_newp', 'popular_article_sidebar'); //Работает для не залогиненых пользователей

//Действия для вызова процедуры формирования справочника
add_action('wp_ajax_pop_a', 'popular_article');  //Работает для залогиненых пользователей
add_action('wp_ajax_nopriv_pop_a', 'popular_article'); //Работает для не залогиненых пользователей

function popular_article(){
	$tax = [1, 95, 96, 97, 105, 106, 107];
	$ind = rand(0, count($tax));
    $populargb = new WP_Query('showposts=4&post_status=publish&orderby=rand');
    while ( $populargb->have_posts() ) {
        $populargb->the_post();
        $cat = get_the_category(); 
		echo '<div class="tile-article">
				<div class="img-popular-publication-item">'.get_the_post_thumbnail().'</div>
				<div class="tile-article-info">
					<a href="'.get_the_permalink().'">
						<span class="tile-article-category">'.$cat[0]->name.'</span><br>
						<span class="tile-article-title">'.get_the_title().'</span>
					</a>
				</div>	
			</div>';
	}
	// echo '<div class="img-popular-publication-item">'.get_the_post_thumbnail().'</div>';
	wp_reset_query();
	die();
}

add_filter( 'excerpt_length', function(){
    return 15;
} );

add_filter('excerpt_more', function($more) {
    return '...';
});

/*homepage*/
function index_category_1(){
	$populargb = new WP_Query('cat=3&showposts=3&orderby=meta_value_num' ); //Change category id
		while ( $populargb->have_posts() ) {
		$populargb->the_post();
		echo '<div class="popular-publication-item-container"><a class="popular-publication-item" href="'.get_permalink().'">
					<div class="img-popular-publication-item">'.get_the_post_thumbnail().'</div>
					<div class="title-popular-publication-item">
						<span class="front-post-title">'.get_the_title().'</span>
					</div>
				</a>
				<div class="addition-info">
					<span class="post-date">'.get_the_date().'</span>
					<span class="count-comment">▪ Комментариев - '.get_comments_number().'</span>
				</div>
				</div>'; //<span class="small-text">'.get_the_excerpt().'</span>
	}
	wp_reset_query();
}

function index_category_2(){
	$populargb = new WP_Query('cat=7&showposts=3&orderby=meta_value_num' ); //Change category id
		while ( $populargb->have_posts() ) {
		$populargb->the_post();
		echo '<div class="popular-publication-item-container"><a class="popular-publication-item" href="'.get_permalink().'">
					<div class="img-popular-publication-item">'.get_the_post_thumbnail().'</div>
					<div class="title-popular-publication-item">
						<span class="front-post-title">'.get_the_title().'</span>
					</div>
				</a>
				<div class="addition-info">
					<span class="post-date">'.get_the_date().'</span>
					<span class="count-comment">▪ Комментариев - '.get_comments_number().'</span>
				</div>
				</div>'; //<span class="small-text">'.get_the_excerpt().'</span>
	}
	wp_reset_query();
}

function index_category_3(){
	$populargb = new WP_Query('cat=6&showposts=3&orderby=meta_value_num' );  //Change category id
		while ( $populargb->have_posts() ) { 
		$populargb->the_post();
		$link = get_permalink();
		$rehub_views = get_post_meta (get_the_ID(),'rehub_views',true);
		echo '<div class="popular-publication-item-container1">
				<div class="container-popular-publication">
					<a class="popular-publication-item" href="'.$link.'">
						<div class="img-popular-publication-item">'.get_the_post_thumbnail().'</div>
					</a>
					<div class="popular-publication-subcontainer">
						<a href="'.$link.'">
							<span class="front-post-title">'.get_the_title().'</span>

							<div class="addition-info">
								<span class="post-author">'.get_the_author().'</span>
								<span class="post-date">▪ '.get_the_date().'</span>
								<span class="post-views-count">▪ просмотров: '.$rehub_views .'</span>
							</div>
						</a>

					<span class="small-text">'.get_the_excerpt().'</span>
					<a class="link-button" href="'.$link.'">Читать далее</a>
					</div>
				</div>
			</div>';
		
	}
	wp_reset_query();
}
?>