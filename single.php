<?php get_header(); ?>
	<section id="article" class="bgc">
        <div class="container main-container ">
            <div class="row">
                <div class="col-12 col-md-8 content-container boreder">
                	<?php
						if ( function_exists('yoast_breadcrumb') ) {
						  yoast_breadcrumb( '<div id="breadcrumbs">','</div>' );
						}
					?>
                    <div  itemscope itemtype="http://schema.org/Article" class="single-content" >
                        <h1 itemprop = "name"><?php the_title(); ?></h1>
                        <?php echo  get_the_author_meta( 'nickname' );
						$author = get_the_author_meta( 'user_nicename' );
                        echo 'http://serezhq6.beget.tech/author/'.$author;?>
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
	        </div>
	    </div>
    </section>
<?php get_footer(); ?>