<?php
shuffle($category->albums) ;
foreach ($category->albums as $album) {
    if (!empty($album->sessions)) {
        shuffle($album->sessions);
        foreach ($album->sessions as $session) { ?>
            <div class="gallery-container">
                <div class="view view-first image-box">
                    <?= $this->Html->image($session->pictures[0]->url,[
                        'class' => 'img-box'
                    ]) ?>
                    <div class="mask">
                        <div class="thumbnail-image-category">
                            <?=strtoupper($album->name) ?>
                        </div>
                        <div class="separator"></div>
                        <div class="text-center thumbnail-image-name"><?=ucfirst($session->name) ?></div>
                        <?= $this->Html->link('View', '/' . strtolower($album->name) . '/' . $session->id, ['class' => 'info']); ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
} ?>

