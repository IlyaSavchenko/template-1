<?php get_header(); ?>
	<section id="search">
        <div class="container main-container">
            <div class="col-12 col-lg-8 row content-container boreder" >
            	<?php
					if ( function_exists('yoast_breadcrumb') ) {
					  yoast_breadcrumb( '<div id="breadcrumbs">','</div>' );
					}
				?>
                <div class="group-items">
                    <div class="row group-container-items" style="margin-right: 0;margin-left: 0;">
                        <?php if(have_posts()): ?>
                            <?php while(have_posts()) : the_post(); 
                        		$link = get_the_permalink();?>
                                <div class="col-12 border item" >
									<div class="row justify-content-center cat-container">
										<a class="col-8 col-md-3 item-img-link" href="<?php echo $link ?>">
											<div class="item-img"><?php the_post_thumbnail();?></div>
										</a>
										<div class="col-12 col-md-9 item-subcontainer">
											<a href="<?php echo $link ?>">
												<span class="item-title"><?php the_title();?></span>
											</a>
											<div class="item-addition-info">
												<span class="item-author-photo"><?php echo get_avatar( get_the_author_meta('user_email'), 20 );?></span>
												<span class="item-author"><?php the_author();?></span>
												<span class="item-date">▪ <?php  the_date();?></span>
												<span class="item-count-comment">▪ <?php comments_number()?> </span>
											</div>
											<span class="item-small-text"><?php the_excerpt();?></span>
											<a class="item-link-button" href="<?php echo $link ?>">Читать далее</a>
										</div>
									</div>
                                </div>
                                <?php endwhile;?>
                            <?php else :?>
	                        <div class="col-12 row justify-content-center sorry">
	                            <span class=" col-12">
	                                Извините! По Вашему запросу ничего не найдено!<br> Попробуйте воспользоваться <a href="<?php get_site_url() ?>/karta-sajta/">КАРТОЙ САЙТА</a>
	                            </span>
	                            <!-- noindex --><img class="sorry-img col-12 col-sm-7 col-lg-6  searchImg" src="<?php bloginfo('template_directory'); ?>/assets/img/resultSearch.png" alt=""> <!-- noindex -->
	                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <div class="pagination">
                    <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
                </div>
            </div>
            <div class="col-12 col-lg-4 sidebar">
                	<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
						<ul id="sidebar">
							<?php dynamic_sidebar( 'right-sidebar' ); ?>
						</ul>
					<?php endif; ?>
                </div>
        </div>	
    </section>
<?php get_footer(); ?>