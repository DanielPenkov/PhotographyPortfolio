<?php
/**
 * @var array $pictures
 */
?>

<style>
    .category-description {
        background: #f9f9f9;margin: 1.5em 10px;border-radius: 10px;width: 100%; margin-right: auto; margin-left!important;padding: 10px;
    }

    .category-description h1 {
        font-size: 1.2em;
        font-weight: normal;
        text-align: center;
    }
</style>


<div class="description-container" style="display:none">
    <div class="description-box">
        <h1>
            <?= __('Aalborg based freelance photographer 
            specializing in different kinds of photography - portraits, family, maternity, 
            weddings, babies and events. Please take a moment to look through my portfolio and 
            decide if we\'ll be a great fit for each other.')?>
        </h1>
    </div>
</div>

<div class="pictureOfTheDay">
    <p class="subtitle fancy"><span style="width:100%"> PORTRAITS</span></p>
    <div class="category-description">
            <h1>
                <p>
                <?= __('I offer all kind of portraits: at my home studio in Aalborg center, your home, on location or outdoor in the park.
                Artistic portraits, maternity, couples, families.')?>
                </p>
                <p>
                    <?=__('Perfect business portrait for CV and Linkedin. I photograph on different backgrounds and promise you will get your best expression.')?>
                </p>

            </h1>
    </div>
</div>

<?php $portraitsCount = 0; ?>
<?php foreach ($pictures['portraits'] as $picture) : ?>
    <?php if ($portraitsCount === 4) {
        break;
    } ?>
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
    <?php $portraitsCount ++; ?>
<?php endforeach; ?>

<div class="pictureOfTheDay">
    <p class="subtitle fancy"><span style="width:100%; margin-top: 35%;"> CHILDREN</span></p>
    <div class="category-description">
        <h1>
            <?= __('Children grow up so fast - the pictures we make keep the memories brighter. Babies, toddlers, family portraits with mom & dad, in my photo studio or your home.')?>
        </h1>
    </div>
</div>

<?php $childrenCount = 0; ?>
<?php foreach ($pictures['children'] as $picture) : ?>
    <?php if ($childrenCount === 4) {
        break;
    } ?>
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
    <?php $childrenCount ++; ?>
<?php endforeach; ?>

<div class="pictureOfTheDay">
    <p class="subtitle fancy"><span style="width:100%; margin-top: 35%;"> WEDDINGS</span></p>
    <div class="category-description">
        <h1>
            <?= __('Wedding photography in Aalborg - candid moments, traditional poses or romantic and intimate photo session - you will have it all!')?>
        </h1>
    </div>
</div>

<?php $weddingsCount = 0; ?>
<?php foreach ($pictures[''] as $picture) : ?>
    <?php if ($weddingsCount === 4) {
        break;
    } ?>
    <?php if ($picture->session->album->name !== 'weddings') {
        continue;
    } ?>
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
    <?php $weddingsCount ++; ?>
<?php endforeach; ?>

<div class="pictureOfTheDay">
    <p class="subtitle fancy"><span style="width:100%; margin-top: 35%"> EVENTS</span></p>
    <div class="category-description">
        <h1>
            <?= __('Coverage of different events - festivals, fairs, concerts, theater. The price depends on type, location and duration of the event.')?>
        </h1>
    </div>
</div>

<?php $eventsCount = 0; ?>
<?php foreach ($pictures['events'] as $picture) : ?>
    <?php if ($eventsCount === 4) {
        break;
    } ?>
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
    <?php $eventsCount ++; ?>
<?php endforeach; ?>
