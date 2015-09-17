jQuery(document).ready(function() {
	
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
	
/* Remove inline widths */

	jQuery('#avalon_player iframe').attr('width', '100%');
	
/* Add hide/show for item pages */

	jQuery('body.item div#dublin-core-creator').insertAfter ('div#itemfiles');
	jQuery('body.item div#item-citation').insertAfter ('div#dublin-core-creator');
	jQuery('div#dublin-core-creator, div#item-citation').wrapAll('<div id="primary-element-set">');
	jQuery('div.element-set, div#collection, div#item-tags').wrapAll('<div id="tertiary-element-set">');
	jQuery('div#tertiary-element-set').addClass('hidden');
	if(jQuery('body.item div#dublin-core-description').length > 0){
		jQuery('body.item div#dublin-core-description').insertAfter ('div#primary-element-set');
		jQuery('body.item div#dublin-core-description').wrap('<div id="secondary-element-set">');
		jQuery('<p class="more" style="clear:both">Show Details</p>').insertAfter('#secondary-element-set');	
	}
	else {
		jQuery('<p class="more" style="clear:both">Show Details</p>').insertAfter('#primary-element-set');
	};
	if(jQuery('#tertiary-element-set').length > 0){
	  jQuery('p.more').click(function(){
		  jQuery('div#tertiary-element-set').slideToggle();            
		  jQuery('p.more').html(jQuery('p.more').text() == 'Show Details' ? 'Hide Details' : 'Show Details');
	  });
	};
	
/* Add active class */
		
		jQuery(function () {
		  	setNavigation();
		});
  
		function setNavigation() {
			var path = window.location.pathname;
			path = path.replace(/\/$/, "");
			path = decodeURIComponent(path);
			jQuery('nav#exhibit-pages a').each(function () {
				var href = jQuery(this).attr('href');
				if (path === href) {
				  jQuery(this).addClass('active');
				}
			});
		}
	
/* Scripts for exhibit pages */

	if(jQuery( 'body' ).hasClass( 'exhibits' )){
	
/* Add banner images and link to main exhibit page link */

		var firstUrl = jQuery('nav#exhibit-pages ul li + li a').attr('href');
	  	var endUrl = firstUrl.substring(firstUrl.lastIndexOf('/'));
	  	var homeLink = firstUrl.replace(endUrl, '');
		var exhibitName = homeLink.substr(homeLink.lastIndexOf('/') + 1);
		var bannerPath = '<div id="banner-img"><img src="/exhibits/themes/ucsc-omeka/images/' + exhibitName + '.jpg"></div>';
		jQuery(bannerPath).insertBefore('div#content');
	  	jQuery('a#exhibit-home').attr("href", homeLink);
		
/* Add image to main exhibit page */

	if(jQuery('body.summary div.exhibit-description address').length > 0){
		jQuery('div.exhibit-description address').addClass('hidden');
		jQuery('div.exhibit-description pre').addClass('hidden');
		imgNum = jQuery('body.summary div.exhibit-description address').text();
		itemNum = jQuery('body.summary div.exhibit-description pre').text();
		imgLink = '<div id="exhibit-image"><a href="/exhibits/exhibits/show/' + exhibitName + '/item/' + itemNum + '"><img title="Main Exhibit Image" alt="Main Exhibit Image" src="http://exhibit-dev.library.ucsc.edu/exhibits/files/square_thumbnails/' + imgNum + '.jpg"></a></div>';
		jQuery('div#exhibit-content').prepend(imgLink);
	};
	
	};
});