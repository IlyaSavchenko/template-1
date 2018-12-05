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
        success : function(data){jQuery('#1').html(data);},
        error : function(error){console.log(error)}
    });

    jQuery('.tab-panel2').click(function(){
        jQuery.ajax({
            type: 'POST',
            url: window.wp_data.ajax_url,
            data: {action : 'newa'},
            success : function(data){jQuery('#2').html(data);},
            error : function(error){console.log(error)}
        });
    });
});

var text;
jQuery(".menu-item-has-children>a").each(function(){
	text = jQuery(this).text();
	jQuery(this).replaceWith("<span>"+text+"⮟</span>");
	text = 0;
})

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