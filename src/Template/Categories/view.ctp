<?php foreach ($category->albums as $album) {
    if (!empty($album->sessions)) {
        $sessionNumber = rand(0,(count($album->sessions) - 1));
    ?>
    <div class="gallery-container">
        <div class="view view-first image-box">
            <?= $this->Html->image($album->sessions[$sessionNumber]->pictures[0]->url,[
                'class' => 'img-box'
            ]) ?>

            <div class="mask">
                <div class="thumbnail-image-category">
                    <?=strtoupper($album->name) ?>
                </div>
                <div class="separator"></div>
                <div class="text-center thumbnail-image-name"><?=ucfirst($category->name) ?></div>
                <?= $this->Html->link('View', '/' . $category->name . '/' . $album->name, ['class' => 'info']); ?>
            </div>
        </div>
    </div>
<?php
    }
}
?>

