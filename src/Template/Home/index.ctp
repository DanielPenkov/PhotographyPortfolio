<?php foreach ($pictures as $picture) { ?>
    <div class="gallery-container">
        <div class="view view-first image-box">
            <?= $this->Html->image($picture->url,[
                'class' => 'img-box'
            ]) ?>

            <div class="mask">
                <div class="thumbnail-image-category">
                    <?=strtoupper($picture->session->album->name) ?>
                </div>
                <div class="separator"></div>
                <div class="text-center thumbnail-image-name"><?=ucfirst($picture->session->name) ?></div>
                <?= $this->Html->link('View', '/' . strtolower($picture->session->album->name) . '/' . $picture->session->id, ['class' => 'info']); ?>
            </div>
        </div>
    </div>
<?php } ?>

