<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'item show')); ?>

<div id="exhibit-nav">
  <nav id="exhibit-pages">
  	  
  	  <ul>
        <li id="item-home"><a href="<?php echo $_SERVER['REQUEST_URI'];?>" id="item-home-link">Item Page</a></li>
    </ul>
  </nav>
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-546544957cc72fed" async="async"></script>
<div class="addthis_sharing_toolbox"></div>
</div>

<div id="exhibit-content">
<h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>

<!-- The following returns all of the files associated with an item. -->
<?php if (metadata('item', 'has files')): ?>
<div id="itemfiles" class="element">
    <?php echo files_for_item(array('imageSize' => 'fullsize')); ?>
</div>
<?php endif; ?>

<?php echo all_element_texts('item'); ?>

<!-- The following prints a citation for this item. -->
<div id="item-citation" class="element">
    <h3><?php echo __('Citation'); ?>:</h3>
    <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
</div>

<!-- If the item belongs to a collection, the following creates a link to that collection. -->
<?php if (metadata('item', 'Collection Name')): ?>
<div id="collection" class="element">
    <h3><?php echo __('Collection'); ?>:</h3>
    <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
</div>
<?php endif; ?>

<!-- The following prints a list of all tags associated with the item -->
<?php if (metadata('item', 'has tags')): ?>
<div id="item-tags" class="element">
    <h3><?php echo __('Tags'); ?>:</h3>
    <div class="element-text"><?php echo tag_string('item'); ?></div>
</div>
<?php endif;?>

<?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

</div>

<?php echo foot(); ?>
