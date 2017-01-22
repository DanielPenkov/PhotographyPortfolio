<?= $this->Html->script([
        'owl.carousel.js',
]) ?>

<?= $this->Html->css([
    'owl.carousel.css',
    'owl.theme.css'
]) ?>

<script>
    $(function () {

        $("#owl-demo").owlCarousel({

            navigation : true, // Show next and prev buttons
            slideSpeed : 1000,
            paginationSpeed : 600,
            singleItem:true,
            autoHeight : true
        });
        document.getElementById('pictureDay').ondragstart = function() { return false; };
    });
</script>

<style>
    #owl-demo .item img{
        display: block;
        width: 100%;
        max-width: 650px;
        margin: auto;
    }
</style>

<div class="pictureOfTheDay">

    <p class="subtitle fancy"><span style="width:100%">PICTURE OF THE DAY</span></p>

     <?= $this->Html->image($pictureOfTheDay->url, ['id' => 'pictureDay', 'width'=>'100%', 'max-width' => '800px']) ?>
    <br><br><br>
    <p class="subtitle fancy"><span style="width:100%"> LATEST GALLERIES</span></p>
</div>


<?php foreach ($pictures as $picture) { ?>
    <div class="gallery-container home-gallery">
        <div class="view view-first image-box">
            <?= $this->Html->image($picture->url,[
                'class' => 'img-box',
                'url' => '/' . strtolower($picture->session->album->name) . '/' . $picture->session->id
            ]) ?>

            <?php $sessionUrl = $this->Url->build('/' . strtolower($picture->session->album->name) . '/' . $picture->session->id, true); ?>

            <div class="mask" style="cursor: pointer;" onclick="window.location='<?= $sessionUrl?>';">
                <div class="thumbnail-image-category">
                    <?=strtoupper($picture->session->album->name) ?>
                </div>
                <div class="separator"></div>
                <div class="text-center thumbnail-image-name"><?=ucfirst($picture->session->name) ?></div>
                <div class="fa fa-play-circle-o" style="color:white; margin-top: 20px; font-size: 35px;"></div>
            </div>

        </div>
    </div>
<?php } ?>

