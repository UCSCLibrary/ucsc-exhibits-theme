<?php
echo head(array(
                'title' => metadata('exhibit', 'title'),
                'bodyclass'=>'exhibits summary',
                'exhibitBanner'=>ucsc_get_exhibit_banner(get_current_record('exhibit')->id))); ?>

<div id="exhibit-nav">

  <?php set_exhibit_pages_for_loop_by_exhibit(); ?>
  <?php if (has_loop_records('exhibit_page')): ?>
  <nav id="exhibit-pages">
      <ul>
          <li><a id="exhibit-home" href="/"><?php echo metadata('exhibit', 'title'); ?></a></li>
		  <?php foreach (loop('exhibit_page') as $exhibitPage): ?>
          <?php echo exhibit_builder_page_summary($exhibitPage); ?>
          <?php endforeach; ?>
      </ul>
  </nav>
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-546544957cc72fed" async="async"></script>
<div class="addthis_sharing_toolbox"></div>
  <?php endif; ?>
</div>

<div id="exhibit-content">

  <h1><?php echo metadata('exhibit', 'title'); ?></h1>
  
  <div id="primary">
  <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
  <div class="exhibit-description">
      <?php echo $exhibitDescription; ?>
  </div>
  <?php endif; ?>
  
  <?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
  <div class="exhibit-credits">
      <h3><?php echo __('Credits'); ?></h3>
      <p><?php echo $exhibitCredits; ?></p>
  </div>
  <?php endif; ?>
  </div>

</div>

<?php echo foot(); ?>
