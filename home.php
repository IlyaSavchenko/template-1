<?php get_header(); ?>
<div class="container">   
    <div class="row">
    	<div class="tiles-cont">
    		<div class="cat1">
                <span class="cat1-name">Рекомендуем</span>
            </div>
    		<div id="tiles" class="col-12 tiles"></div>
    	</div>
    	
	    <div class="col-12 col-lg-8 main-side">            
	        <div class="container-cat-posts">
	            <div class="cat1">
	                <span class="cat1-name">Решение проблем</span>
	            </div>
	            <div class="container-popular-publication"> 
	                <?php index_category_1();?> 
	            </div>

	            <div class="cat2">
	                <span class="cat2-name">Программы и приложения</span>
	            </div>
	            <div class="container-popular-publication"> 
	                <?php index_category_2();?> 
	            </div>

	            <div class="cat3">
	                <span class="cat3-name">Полезные советы</span>
	            </div>
	            <div class="container-popular-publication1"> 
	                <?php index_category_3();?> 
	            </div>
	        </div>
	    </div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>