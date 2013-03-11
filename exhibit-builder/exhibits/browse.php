<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyid' => 'exhibit', 'bodyclass' => 'browse'));
?>

<div class="row">
    <div class="span12">
        <h1><?php echo $title; ?> <small><?php echo __('(%s total)', $total_results); ?></small></h1>
        <?php if (count($exhibits) > 0): ?>
            <nav class="navigation" id="secondary-nav">
                <?php echo nav(array(
                    array(
                        'label' => __('Browse All'),
                        'uri' => url('exhibits')
                    ),
                    array(
                        'label' => __('Browse by Tag'),
                        'uri' => url('exhibits/tags')
                    ),
                ))->setUlClass('nav nav-tabs'); ?>
            </nav>

            <div class="pagination"><?php echo pagination_links(); ?></div>

            <?php $exhibitCount = 0; ?>
                <?php foreach (loop('exhibit') as $exhibit): ?>
                    <?php $exhibitCount++; ?>
                    <div class="exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
                        <h2><?php echo link_to_exhibit(); ?></h2>
                        <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                        <div class="description lead"><?php echo $exhibitDescription; ?></div>
                        <?php endif; ?>
                        <?php if ($exhibitTags = tag_string('exhibit', 'exhibits')): ?>
                        <p class="tags well"><?php echo $exhibitTags; ?></p>
                        <?php endif; ?>
                    </div>
                    <hr />
                <?php endforeach; ?>
            <div class="pagination"><?php echo pagination_links(); ?></div>

        <?php else: ?>
        <p><?php echo __('There are no exhibits available yet.'); ?></p>
        <?php endif; ?>
    </div>
</div>


<?php echo foot(); ?>