<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<?php ucsc_slideshow();
?>
<div id="primary">
    <div id="ribbonleft">
    	<div id="ribbonright">
        <div id="feature-row">
            <div class="featured" id="recent-exhibits">
                <h2>Recent <strong>Exhibits</strong></h2>
                <div class="featured-first featured-content">
					<?php  
					$exhibits = get_records('Exhibit', array('featured' => true,'sort_field' => 'added', 'sort_dir' => 'd'), 3);
                    	foreach(loop('files', $exhibits) as $exhibit):
                        	echo '<div class="item"><a href="'.$exhibit->getRecordUrl() .'">' .file_image('square_thumbnail', array(), $exhibit->getFile()) .'</a>';
							echo '<h3><a href="'.$exhibit->getRecordUrl() .'">' .$exhibit->title.'</a></h3></div>';
                    	endforeach;
                ?>
                    <p class="more"><a href="/exhibits/browse">More...</a></p>
                </div>
            </div>
        
            <?php if (get_theme_option('Display Featured Item') == 1): ?>
            <!-- Featured Item -->
            <div class="featured" id="featured-item">
                <h2><?php echo __('Featured <strong>Item</strong>'); ?></h2>
                <div class="featured-second featured-content">
                <?php echo random_featured_items(1); ?>
                </div>
            </div><!--end featured-item-->	
            <?php endif; ?>
            
            <div class="featured" id="digital-collections">
                <h2>Digital <strong>Collections</strong></h2>
                <div class="featured-third featured-content">
                   <p><a href="http://digitalcollections.ucsc.edu/">Browse all 36,000+ digital objects in our collection</a></p>
                   <div id="digital-collections-logo">
                   <a href="http://digitalcollections.ucsc.edu/"><img src="/themes/ucsc-omeka/images/digital-collections.png" alt="UCSC Library Digital Collections Logo" /></a>
                   </div>
                </div>
            </div>
        </div>
    	</div>
    </div>
</div><!-- end primary -->

    <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
    <div id="secondary"><?php echo $homepageText; ?></div>
    <?php endif; ?>








    <?php fire_plugin_hook('public_home', array('view' => $this)); ?>

</div><!-- end secondary -->
<?php echo foot(); ?>
