	<footer id="footer">
		<div class="container" style="height:auto; color:#fff">
			<div class="row">
			<div class="col-2 logo-section">
				<?php if(is_front_page()){
                    echo '<div class="logo_image"><img src="//androidsfaq.com/wp-content/uploads/2018/10/logo-1.png" alt="logo"/></div>';
                  }               
                  else{
                    echo '<a href="/" class="logo_image"><img src="//androidsfaq.com/wp-content/uploads/2018/10/logo-1.png" alt="logo"/></a>';} ?>
			</div>
			<div class=" col-10 footer-content">
				<div class="footer-links">
					<ul class="links-container">
						<li>
							<?php if(is_page('o-nas')){
									echo '<span>О нас</span>';
								}
								else {
									echo '<a href="//androidsfaq.com/o-nas/" class="links" rel="nofollow">О нас</a>';
								}
							?>
						</li>
						<li>
							<?php if(is_page('pravila')){
									echo '<span>Правила</span>';
								}
								else {
									echo '<a href="//androidsfaq.com/pravila/" class="links" rel="nofollow">Правила</a>';
								}
							?>
						</li>
						<li>
							<?php if(is_page('adv')){
									echo '<span>Реклама</span>';
								}
								else {
									echo '<a href="//androidsfaq.com/adv/" class="links" rel="nofollow">Реклама</a>';
								}
							?>
						</li>
						<li>
							<?php if(is_page('contact')){
									echo '<span>Контакты</span>';
								}
								else {
									echo '<a href="//androidsfaq.com/contact/" class="links" rel="nofollow">Контакты</a>';
								}
							?>
						</li>
						<li>
							<?php if(is_page('kak-stat-avtorom-af')){
									echo '<span>Как стать автором androidsfaq.com</span>';
								}
								else {
									echo '<a href="//androidsfaq.com/kak-stat-avtorom-af/" class="links" rel="nofollow">Как стать автором androidsfaq.com</a>';
								}
							?>
						</li>
						<li>
							<?php if(is_page('sitemap')){
									echo '<span>Карта сайта</span>';
								}
								else {
									echo '<a href="//androidsfaq.com/sitemap/" class="links" rel="nofollow">Карта сайта</a>';
								}
							?>
						</li>
					</ul>
				</div>
				<div class="site-politics">
					<noindex>
						<span class="site-politics-info">androidsfaq.com - Ежедневные обзоры смартфонов, телефонов, планшетов. Полезные советы.</span> <br>
						<span class="site-politics-copy">При использовании материалов сайта обязательным условием является наличие гиперссылки в пределах первого абзаца на страницу расположения исходной статьи с указанием сайта. Источник: http://androidsfaq.com/</span>
					</noindex>
				</div>
				<div class="footer-bottom-section">
					<span class="footer-year"><?php echo date('Y')?></span>
					<span class="footer-url">androidsfaq.com</span>
				</div>
				<div class="footer-counters-section">
					<!--LiveInternet counter--><script type="text/javascript">
					document.write("<a href='//www.liveinternet.ru/click' "+
					"target=_blank><img src='//counter.yadro.ru/hit?t57.1;r"+
					escape(document.referrer)+((typeof(screen)=="undefined")?"":
					";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
					screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
					";h"+escape(document.title.substring(0,150))+";"+Math.random()+
					"' alt='' title='LiveInternet' "+
					"border='0' width='88' height='31'><\/a>")
					</script><!--/LiveInternet-->

					<a href="https://webmaster.yandex.ru/sqi?host=androidsfaq.com">
						<img width="88" height="31" alt="" border="0" src="https://yandex.ru/cycounter?androidsfaq.com&theme=light&lang=en"/>
					</a>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer();?>
	<script src="//serezhq6.beget.tech//wp-content/themes/newDesign/assets/js/main.js"></script> <!-- //Change path -->
	<?php
        if(current_user_can('update_core')) {
            echo '<center>'.get_num_queries().' запросов за ';
            timer_stop(1);
            echo ' секунд</center>';
        }
    ?>
</body>
</html>