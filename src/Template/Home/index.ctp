<script>
    $(function () {
        document.getElementById('pictureDay').ondragstart = function() { return false; };
    });
</script>
<div class="pictureOfTheDay">

    <p class="subtitle fancy"><span style="width:100%">PICTURE OF THE DAY</span></p>

    <?= $this->Html->image($pictureOfTheDay->url, ['id' => 'pictureDay', 'width'=>'100%', 'max-width' => '800px']) ?>
    <br><br><br>
    <p class="subtitle fancy"><span style="width:100%"> LATEST Galleries</span></p>
</div>

<?php foreach ($pictures as $picture) { ?>
    <div class="gallery-container home-gallery">
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

