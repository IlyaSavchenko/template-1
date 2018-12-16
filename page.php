<?php get_header(); ?>
	<section id="page" class="bgc">
        <div class="container main-container ">
            <div class="row">
                <div class="col-12 col-md-8 content-container boreder">
                	<?php
						if ( function_exists('yoast_breadcrumb') ) {
						  yoast_breadcrumb( '<div id="breadcrumbs">','</div>' );
						}
					?>
                    <div itemscope itemtype="http://schema.org/Article" class="single-content" >
                        <h1 itemprop = "name"><?php the_title(); ?></h1>
                        <div class="post-info">
                        	<div class="row reading-post-info">
                        		<div class="col-6"><?php echo reading_time(get_the_ID());?></div>
                        		<div class="col-6"><?php do_action( 'wprl_btn' );?></div>
                        	</div>
                        </div>
                        <div itemprop="articleBody" class="text-article">
                            <?php
                                global $more;
                                while( have_posts() ) : the_post();
                                    $more = 1; // отображаем полностью всё содержимое поста
                                    the_content(); // выводим контент
                                endwhile; 
                                // wp_reset_postdata();  //удалить
                            ?>
                        </div>
                    </div>   
	            </div>
            	<?php get_sidebar(); ?>
	        </div>
	    </div>
    </section>
<?php get_footer(); ?>