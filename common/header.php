<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?> UCSC Library</title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->

    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>


    <!-- Stylesheets -->
    <?php
    queue_css_file('style');
    queue_css_url('//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic');
    echo head_css();

    echo theme_header_background();
    ?>
    
    <!-- JavaScripts -->
    <?php 
    queue_js_file('vendor/modernizr');
    queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)'));
    queue_js_file('vendor/respond');
    queue_js_file('globals');
	queue_js_file('theme-scripts');
    echo head_js(); 
    ?>
    <!-- Nivo Slider Markup -->
    <link rel="stylesheet" href="/themes/ucsc-omeka/nivo-slider/nivo-slider.css" type="text/css" />
    <script src="/themes/ucsc-omeka/nivo-slider/jquery.nivo.slider.pack.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(window).load(function() {
            jQuery('#slider').nivoSlider({
				effect: 'fade', 
				pauseTime: 4000, 
				directionNav: false, 
				controlNav: false 
			});
        });
    </script>
    <!-- Google Analytics script -->
    <script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2259271-22']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>

        <header>
            <div id="ucsc-logo">
                <a id="logo" title="Go to UCSC homepage" href="http://www.ucsc.edu">UC Santa Cruz home</a>
            </div>
            <h1 id="site-name" class="title-standard">
                <a title="Back to homepage" href="http://library.ucsc.edu">University<br>Library</a>
            </h1>
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
            <div id="site-title"><?php echo link_to_home_page(theme_logo()); ?></div>
        </header>
            
        <div class="menu-button">Menu</div>
            
        <div id="wrap">
            <?php echo @$exhibitBanner;?>            
            <div id="content">
                <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
