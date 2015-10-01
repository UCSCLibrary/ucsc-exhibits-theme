jQuery(document).ready(function() {
	
/* Move audio and video to correct location */

	jQuery('#exhibit-content video').insertAfter ('#exhibit-content h1');
	
	if(jQuery('#moving-image-item-type-metadata-player').length > 0){
		jQuery('#itemfiles .image-jpeg').addClass('hidden');
		jQuery('#moving-image-item-type-metadata-player').parent().prependTo('#itemfiles');
		jQuery('#moving-image-item-type-metadata-player').parent().removeClass('element-set').addClass('itemfile');
	};
	
/* Add page title to first menu item on exhibit item pages */

	var pageTitle = jQuery( '#content h1' ).text();
	jQuery( 'a#item-home-link' ).html( pageTitle );
	
/* Add return to exhibit link on exhibit item pages */

	var windowLoc = window.location.pathname;
	if (windowLoc.indexOf("/exhibits/show/") >= 0) {
		jQuery('<li><a href="#" class="return-to-exhibit">Return to Exhibit</a></li>').insertAfter('li#item-home');
	}
	jQuery('a.return-to-exhibit').click(function(){
    	parent.history.back();
        return false;
    });
	
/* remove inline widths and hide thumbnails for Avalon items */

	jQuery('#avalon_player iframe').attr('width', '100%');
	if(jQuery('#avalon_player iframe').length > 0){
		jQuery('a.download-file').addClass('hidden');
	};
	
/* Add hide/show for item pages */

	jQuery('.element-set, #collection, #item-tags, #item-citation').wrapAll('<div id="tertiary-element-set">');
	jQuery('#tertiary-element-set').addClass('hidden');
	
	if(jQuery('#itemfiles').length > 0){
		if(jQuery('#dublin-core-creator').length > 0){
			jQuery('#dublin-core-creator').insertAfter ('#itemfiles');
			jQuery('#item-citation').insertAfter ('#dublin-core-creator');
		} else {
			jQuery('#item-citation').insertAfter ('#itemfiles');
		};
	} else {
		if(jQuery('#dublin-core-creator').length > 0){
			jQuery('#dublin-core-creator').insertAfter ('#exhibit-content h1');
			jQuery('#item-citation').insertAfter ('#dublin-core-creator');
		} else {
			jQuery('#item-citation').insertAfter ('#exhibit-content h1');
		};
	};
	
	jQuery('#dublin-core-creator, #item-citation').wrapAll('<div id="primary-element-set">');
	if(jQuery('#itemfiles').length > 0){
		if(jQuery('#dublin-core-description').length > 0){
			jQuery('#dublin-core-description').wrap('<div id="secondary-element-set">');
			if(jQuery('#primary-element-set').length > 0){
				jQuery('#secondary-element-set').insertAfter ('#primary-element-set');	
			} else {
				jQuery('#secondary-element-set').insertAfter ('#itemfiles');
			};
		}
	} else {
		if(jQuery('#dublin-core-description').length > 0){
			jQuery('#dublin-core-description').wrap('<div id="secondary-element-set">');
			if(jQuery('#primary-element-set').length > 0){
				jQuery('#secondary-element-set').insertAfter ('#primary-element-set');	
			} else {
				jQuery('#secondary-element-set').insertAfter ('#exhibit-content h1');
			};
		}
	};
	if(jQuery('#tertiary-element-set').length > 0){
		if(jQuery('#itemfiles').length > 0){
			if(jQuery('#secondary-element-set').length > 0){
				jQuery('<p class="more" style="clear:both">Show Details</p>').insertAfter('#secondary-element-set');
			} else if(jQuery('#primary-element-set').length > 0){
				jQuery('<p class="more" style="clear:both">Show Details</p>').insertAfter('#primary-element-set');
			} else {
				jQuery('<p class="more" style="clear:both">Show Details</p>').insertAfter('#itemfiles');
			};
		} else {
			if(jQuery('#secondary-element-set').length > 0){
				jQuery('<p class="more" style="clear:both">Show Details</p>').insertAfter('#secondary-element-set');
			} else if(jQuery('#primary-element-set').length > 0){
				jQuery('<p class="more" style="clear:both">Show Details</p>').insertAfter('#primary-element-set');
			} else {
				jQuery('<p class="more" style="clear:both">Show Details</p>').insertAfter('#exhibit-content h1');
			};
		};
		jQuery('p.more').click(function(){
		  	jQuery('div#tertiary-element-set').slideToggle();            
		  	jQuery('p.more').html(jQuery('p.more').text() == 'Show Details' ? 'Hide Details' : 'Show Details');
	  	});
	};
	
/* Scripts for exhibit pages */

	if(jQuery( 'body' ).hasClass( 'exhibits' )){
	
/* Link to main exhibit page link */

	    var firstUrl = jQuery('nav#exhibit-pages ul li + li a').attr('href');
	    var endUrl = firstUrl.substring(firstUrl.lastIndexOf('/'));
	    var homeLink = firstUrl.replace(endUrl, '');
	    jQuery('a#exhibit-home').attr("href", homeLink);
		
/* Add image to main exhibit page */

		if(jQuery('body.summary div.exhibit-description address').length > 0){
			jQuery('div.exhibit-description address').addClass('hidden');
			jQuery('div.exhibit-description pre').addClass('hidden');
			imgNum = jQuery('body.summary div.exhibit-description address').text();
			itemNum = jQuery('body.summary div.exhibit-description pre').text();
			imgLink = '<div id="exhibit-image"><a href="/exhibits/show/' + exhibitName + '/item/' + itemNum + '"><img title="Main Exhibit Image" alt="Main Exhibit Image" src="/files/square_thumbnails/' + imgNum + '.jpg"></a></div>';
			jQuery('div#exhibit-content').prepend(imgLink);
		};
		
		/* Add active class and hide sub-items of non-active menu items */
		var path = window.location.pathname;
		path = path.replace(/\/$/, "");
		path = decodeURIComponent(path);
		jQuery('nav#exhibit-pages a').each(function () {
			var href = jQuery(this).attr('href');
			jQuery(this).parent().addClass('nav-item');
			if (path === href) {
			  jQuery(this).parent().addClass('active');
			  jQuery(this).parent().children('.nav-item').addClass('active-path');
			  jQuery(this).parents('.nav-item').addClass('active-path');
			}
		});
		jQuery('nav#exhibit-pages a').each(function () {
			if (jQuery(this).parent().children().length>1) {
				if (jQuery(this).parent().hasClass('active-path')) {
					jQuery(this).append('<img class="navarrow" src="/themes/ucsc-omeka/images/arrow-open.png" alt="open arrow">');
				} else {
					jQuery(this).append('<img class="navarrow" src="/themes/ucsc-omeka/images/arrow-closed.png" alt="closed arrow">');
				}
			}
		});
		jQuery('nav#exhibit-pages li ul li').addClass('hidden-nav');
		jQuery('nav#exhibit-pages li.active').children('ul').children('li').removeClass('hidden-nav');
		jQuery('nav#exhibit-pages li.active').removeClass('hidden-nav');
		jQuery('nav#exhibit-pages li.active').siblings().removeClass('hidden-nav');
		jQuery('nav#exhibit-pages li.active').parents().removeClass('hidden-nav');
		jQuery('nav#exhibit-pages li.active').parents().siblings().removeClass('hidden-nav');
		jQuery('*[class=""]').removeAttr('class');
	
	};
});