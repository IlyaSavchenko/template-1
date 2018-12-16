<?php get_header();  ?>
	<section id="article" class="bgc">
        <div class="container main-container ">
            <div class="row">
                <div class="col-12 col-lg-8 content-container boreder">
                	<?php
						if ( function_exists('yoast_breadcrumb') ) {
						  yoast_breadcrumb( '<div id="breadcrumbs">','</div>' );
						}
					?>
                    <div itemscope itemtype="http://schema.org/Article" class="single-content" >
                        <h1 itemprop = "name"><?php the_title(); ?></h1>
                        <div class="post-info">
                        	<div class="row reading-post-info">
                        		<div class="col-12 col-md-6"><?php echo reading_time(get_the_ID());?></div>
                        		<div class="col-6"><?php do_action( 'wprl_btn' );?></div>
                        	</div>
                        	<div class="row base-post-info">
                        		<div class="col-12 col-md-5 row author-post-cont">
                        			<div class="col-2 author-avatar"><?php echo get_avatar( get_the_author_meta('user_email'), 40 );?></div>
                        			<div class="col-10">
                        				<div class="author-name">
                        					<a href="http://serezhq6.beget.tech/author/<?php echo get_the_author_meta( 'user_nicename')?>" style="color: #000;"><?php the_author();?></a>
                        				</div>
                        				<div class="post-date"><?php the_date('d.m.Y'); ?></div>
                        			</div>
                        		</div>
                        		<div class="col-12 col-md-7 row justify-content-end">
                        			<div class="col-6 col-md-7 post-views" ><i class="far fa-eye"></i><?php echo ' Просмотров: '.get_post_views(get_the_ID());?></div>
                        			<div class="col-6 col-md-5 post-comments" ><i class="far fa-comment-dots" style="color: #777"></i><?php echo ' Комментариев: '.get_comments_number();?></div>
                        		</div>
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
                    <div class="service-button">
                        <button class="article-share__bookmark" type="button">
                            <span id="bookmark-this">Добавить в Избранное</span>
                        </button>
                        <button class="article-share__print" type="button">
                            <span class="print-title">Распечатать</span>
                        </button>
                    </div>
                    <div class="tags-container"><?php the_tags();?></div>
                    <div class="rel-posts-container">
                        <span class="rel-posts-title">Похожие статьи</span>
                    </div>
                    <?php comments_template(); ?>  
	            </div>
                <?php get_sidebar(); ?>
	        </div>
	    </div>
    </section>
<?php get_footer(); set_post_views(get_the_ID());?>