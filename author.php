<?php get_header();$uid = get_current_user_id();$user = get_userdata($uid);?>

	<section id="author" style="margin-top: 60px">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-4 " >
					<div class="row boreder author-meta">
						<div class="col-12 author-photo"><?php echo get_avatar( get_the_author_meta('user_email'), 100 );?></div>
						<div class="col-12 author-name"><?php the_author();?></div>
						
						<div class="col-12 count-author-posts"><?php echo '<span class="author-meta-field"><i class="far fa-newspaper"></i> Всего статей:</span> '.count_user_posts($uid);?></div>
						<div class="col-12 author-registered"><?php  $user_reg = get_the_author_meta('user_registered');$datetime = new DateTime($user_reg); echo '<span class="author-meta-field"><i class="far fa-user"></i> Регистрация:</span> '.$datetime->format('d.m.Y');?></div>
						<div class="col-12 author-description">
							<div class="author-description-title">Об авторе</div>
							<div class="author-description-text"><?php echo get_the_author_meta('description',$uid);?></div>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-8 row boreder m15" >
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
													<span class="item-date"><?php  the_date();?></span>
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
	        </div>
		</div><!-- #content -->
		  
	</section><!-- #primary -->
<?php get_footer();  ?>