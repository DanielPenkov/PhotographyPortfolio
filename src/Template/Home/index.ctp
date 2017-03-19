<?php
/**
 * @var array $pictures
 */
?>

<div class="description-container">
    <div class="description-box">
        <h1>
            <?= __('Aalborg based freelance photographer 
            specializing in different kinds of photography - portraits, family, maternity, 
            weddings, babies and events. Please take a moment to look through my portfolio and 
            decide if we\'ll be a great fit for each other.')?>
        </h1>
    </div>
</div>

<?php foreach ($pictures as $picture) : ?>
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
<?php endforeach; ?>

