var visible = 0;
var text = 0;
jQuery(document).ready(function(){
    jQuery.ajax({
        type: 'POST',
        url: window.wp_data.ajax_url,
        data: {action : 'pop_a'},
        success : function(data){jQuery('.tiles').html(data);},
        error : function(error){console.log(error)}
    });

    jQuery.ajax({
        type: 'POST',
        url: window.wp_data.ajax_url,
        data: {action : 'newp'},
        success : function(data){jQuery('#t1').html(data);},
        error : function(error){console.log(error)}
    });

    jQuery('.tab-panel2').click(function(){
        jQuery.ajax({
            type: 'POST',
            url: window.wp_data.ajax_url,
            data: {action : 'newa'},
            success : function(data){jQuery('#t2').html(data);},
            error : function(error){console.log(error)}
        });
        jQuery('.panel1').removeClass('active');
        jQuery('.panel2').addClass('active');
        jQuery('#t1').removeClass('tab-active');
        jQuery('#t2').addClass('tab-active');
        return false;
        
    });

     jQuery('.tab-panel1').click(function(){
        jQuery('.panel2').removeClass('active');
        jQuery('.panel1').addClass('active');
        jQuery('#t2').removeClass('tab-active');
        jQuery('#t1').addClass('tab-active');
        return false;
    });

    if(jQuery(window).width() < 992) {
    	
    	jQuery('.menu-button').click(function(){
    		if(visible == 0){
	    		jQuery('#top-menu').fadeIn();
	    		visible = 1;
			}
			else{
	    		jQuery('#top-menu').fadeOut();
	    		visible = 0;
			}
    	});
	    	

    	jQuery(".menu-item-has-children").click(function(){
    		if(text == 0){
    			jQuery(".sub-menu").fadeIn();
    			text = 1;
    		}
    		else {
    			jQuery(".sub-menu").fadeOut();
    			text = 0;
    		}
        })
    }
   //  jQuery('.text-article iframe').css('margin', '0 auto !important');
});

/*CHANGE STYLE TOC*/
if(jQuery('div').is('#toc_container')){
    jQuery('.text-article h2:not(:eq(0))').before('<a href="#toc_container" class="back-to-toc">Вернуться к содержанию</a>');
    jQuery('.single-content').after('<a href="#toc_container" class="back-to-toc">Вернуться к содержанию</a>');
}




var j = 1;
jQuery('.toc_list>li>a').each(function(){
    jQuery(this).before('<span class="number-toc">' + j + '</span>');
    j++;
});


j =1;
jQuery('.text-article h2').each(function(){
    jQuery(this).prepend('<span class="number-h2">' + j + '</span>')
    j++;
});


j = 1;
var wid;
jQuery('.single-content p a img, .single-content li a img').each(function () {
    wid = jQuery(this).width();
    jQuery(this).after(jQuery('<div class="img-title" style="background-color:#83bc03; padding-top:3px; height:30px;color:#fff !important; text-align:center;width:'+wid+'px !important;margin: -8px auto 0 !important;">').html('Рис.'+j+'.  '+jQuery(this).attr('alt')));
    j++;
});


jQuery(".menu-item-has-children>a").each(function(){
	text = jQuery(this).text();
	jQuery(this).replaceWith("<span>"+text+" "+"<i class='fas fa-angle-down'></i></span>");
	text = 0;
})

/*PROGRESS BAR*/
jQuery(function() {
    jQuery(window).on("scroll resize", function() {
        var x = jQuery(window).scrollTop() / (jQuery(document).height() - jQuery(window).height());
        // console.log(x);
        jQuery(".progress-bar").css({
            "width": (100 * x | 0) + "%"
        });
        jQuery('progress')[0].value = x;
    });
});

/*RANDOM STYLE OF LI*/
jQuery('.ah-content>ul:not(.toc_list)').each(function(){
    j = Math.floor((Math.random() * 4) + 1);
    // console.log('li - '+j);
    if (j == 1){
        jQuery(this).find('li').addClass('li1');
    }
    else if(j == 2){
        jQuery(this).find('li').addClass('li2');
    }
    else if(j == 3){
        jQuery(this).find('li').addClass('li3');
    }
    else {
        jQuery(this).find('li').addClass('li4');
    }
});

/*RANDOM STYLE BLOCKQUOTE*/
jQuery('blockquote').each(function(){
    j = Math.floor((Math.random() * 4) + 1);
    // console.log(j);
    if (j == 1){
        jQuery(this).addClass('blockquote1');
        jQuery(this).prepend('<img src="//androidsfaq.com/wp-content/themes/rehub1/images/attention.svg" alt="attention" class="bq-img1">');  // chanGe path
        var top1;
        top1 = jQuery('.blockquote1').height() / 2 - 15 ; 
        jQuery('.bq-img1').css('top', top1 + 'px');
    }
    else if(j == 2){
        jQuery(this).addClass('blockquote2');
        jQuery(this).prepend('<img src="//androidsfaq.com/wp-content/themes/rehub1/images/attach.svg" alt="attach" class="bq-img2">');  // chanGe path
        var top2;
        top2 = jQuery('.blockquote2').height() / 2 - 15; 
        jQuery('.bq-img2').css('top', top2 + 'px');
    }
    else if(j == 3){
        jQuery(this).addClass('blockquote3');
    }
    else {
        jQuery(this).addClass('blockquote4');
    }
});

var height = jQuery('#main-menu').height();
console.log(height);
jQuery(window).scroll(function() {
    if (jQuery(window).scrollTop() > height) {
        jQuery('.button-up').fadeIn();
    } 
    else{
        jQuery('.button-up').fadeOut();
    }
});

jQuery('.button-up').click(function(){
    jQuery(document).scrollTop(0);
});

/*BOOKMARKS*/
  jQuery(function(jQuery) {
    jQuery('#bookmark-this').click(function(e) {
      var bookmarkURL = window.location.href;
      var bookmarkTitle = document.title;
      if ('addToHomescreen' in window && addToHomescreen.isCompatible) {
        // Mobile browsers
        addToHomescreen({ autostart: false, startDelay: 0 }).show(true);
      } else if (window.sidebar && window.sidebar.addPanel) {
        // Firefox <=22
        window.sidebar.addPanel(bookmarkTitle, bookmarkURL, '');
      } else if ((window.sidebar && /Firefox/i.test(navigator.userAgent)) || (window.opera && window.print)) {
        // Firefox 23+ and Opera <=14
        jQuery(this).attr({
          href: bookmarkURL,
          title: bookmarkTitle,
          rel: 'sidebar'
        }).off(e);
        return true;
      } else if (window.external && ('AddFavorite' in window.external)) {
        // IE Favorites
        window.external.AddFavorite(bookmarkURL, bookmarkTitle);
      } else {
        // Other browsers (mainly WebKit & Blink - Safari, Chrome, Opera 15+)
        alert('Нажмите ' + (/Mac/i.test(navigator.platform) ? 'Cmd' : 'Ctrl') + '+D для добавления данной страницы в закладки.');
      }
      return false;
    });
  });

  /*PRINT */
  jQuery('.article-share__print').on('click', function() {
    window.print();
    // return false;
});