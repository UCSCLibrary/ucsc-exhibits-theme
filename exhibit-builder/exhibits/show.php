<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>
<div id="exhibit-nav">
  <nav id="exhibit-pages">
  	  
  	  <ul>
        <li><a id="exhibit-home" href="/"><?php echo metadata('exhibit', 'title'); ?></a></li>
        <?php set_exhibit_pages_for_loop_by_exhibit(); ?>
        <?php foreach (loop('exhibit_page') as $exhibitPage): ?>
        <?php echo exhibit_builder_page_summary($exhibitPage); ?>
        <?php endforeach; ?>
    </ul>
  </nav>
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-546544957cc72fed" async="async"></script>
<div class="addthis_sharing_toolbox"></div>
</div>
<?php set_current_record('exhibit_page', $exhibit_page); ?>
<div id="exhibit-content">

  <h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></span></h1>
  
  <div role="main">
  <?php exhibit_builder_render_exhibit_page(); ?>
  </div>

</div>
<?php echo foot(); ?>
