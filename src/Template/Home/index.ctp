<div class="gallery-container">
    <div class="view view-first image-box">
        <?= $this->Html->image('thumbnails/Business_yoga_thumbnail.png',[
            'class' => 'img-box'
        ]) ?>

        <div class="mask">
            <div class="thumbnail-image-category">BUSINESS</div>
            <div class="separator"></div>
            <div class="text-center thumbnail-image-name">Business Yoga</div>
            <?= $this->Html->link('View', '/business/2', ['class' => 'info']); ?>
        </div>
    </div>
</div>