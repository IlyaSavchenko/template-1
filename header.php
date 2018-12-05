<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title(); ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="//serezhq6.beget.tech//wp-content/themes/newDesign/assets/css/styles.css">  <!-- //Change path -->
	<?php wp_head();?>
</head>
<body>
	<section id="main-menu">
		<div class="container">
			<div class="row">
				<?php 
					if(is_front_page()){
						echo '<div class="col-2 top-logo"><img src="//androidsfaq.com/wp-content/uploads/2018/10/logo-1.png" alt="logo"></div>';   //Change path
					} else {
						echo '<div class="col-2 top-logo"><a href="/" ><img src="//androidsfaq.com/wp-content/uploads/2018/10/logo-1.png" alt="logo"></a></div>';  //Change path
					}
					
					function empty_menu(){
						echo 'Выполните настройку меню.';
					}

					wp_nav_menu([
						'theme_location' => 'header-menu',
						'fallback_cb' => 'empty_menu',
						'container' => 'nav',
						'container_id' => 'top-menu',
						'container_class' => 'col-10 class-menu',
						'menu_id' => 'top-menu-list',  //ul
						'menu_class' => 'row justify-content-between class-menu-list ', //ul
						'depth' => 2
					]);
				?>		
			</div>
		</div>	
	</section>
	
  