<?php get_header(); ?>
	<section id="tag">
        <div class="container main-container">
            <div class="row">
                <div class="col-12 col-lg-8 row content-container boreder" >
                    <div class="group-items">
                        <div class="h2 group-header">Тег:<span class="group-name"><?php echo ' '; single_tag_title();?></span></div>
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
                                <?php endif;?>
                        </div>
                    </div>
                    <div class="pagination">
                        <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>