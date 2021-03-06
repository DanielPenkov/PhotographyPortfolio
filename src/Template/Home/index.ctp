<?php
/**
 * @var array $pictures
 */
?>

<style>
    .category-description {
        background: #f9f9f9;
        border-radius: 10px;
        width: 100%;
        margin-right: auto;
        margin-left!important;
        padding: 10px;
    }

    .category-description h1 {
        font-size: 1.2em;
        font-weight: normal;
        text-align: center;
    }
</style>

<div class="promo-img" style="text-align: center; margin-top: 80px;">
    <a href="https://www.facebook.com/media/set/?set=a.2040650129304343&type=1&l=e887bc7e96" target="_blank"><img src="/images/cv_obqva.png" style="width:100%;max-width: 800px;"></a>
</div>

<div class="description-container" style="display:none">
    <div class="description-box">
        <H1>
            <?= __('Аalborg based freelance photographer 
            specializing in different kinds of photography - portraits, family, maternity, 
            weddings, babies and events. Please take a moment to look through my portfolio and 
            decide if we\'ll be a great fit for each other.')?>
        </H1>
    </div>
</div>

<div class="pictureOfTheDay">
    <p class="subtitle fancy"><span style="width:100%"> PORTRAITS </span></p>
    <div class="category-description">
            <H1>
                I offer all kind of portraits: at my home studio in Sofia center, your home, on location or outdoor in the park.
                Artistic portraits, maternity, couples, families.
                <br><br>
                Perfect business portrait for CV and Linkedin on different backgrounds and promise  you will get your best expression.
            </H1>
    </div>
</div>


<div class="gallery-container home-gallery">
    <div class="view view-first image-box">
        <?= $this->Html->image($pictures['cv'][0]->url,[
            'class' => 'img-box',
            'url' => '/' . strtolower($pictures['cv'][0]->session->album->name) . '/' . $pictures['cv'][0]->session->id
        ]) ?>

        <?php $sessionUrl = $this->Url->build('/portraits/cv-linkedin', true); ?>

        <div class="mask" style="cursor: pointer;" onclick="window.location='<?= $sessionUrl?>';">
            <div class="thumbnail-image-category">
                <?=strtoupper($pictures['cv'][0]->session->album->name) ?>
            </div>
            <div class="separator"></div>
            <div class="fa fa-play-circle-o" style="color:white; margin-top: 20px; font-size: 35px;"></div>
        </div>
    </div>
</div>

<div class="gallery-container home-gallery">
    <div class="view view-first image-box">
        <?= $this->Html->image($pictures['women'][0]->url,[
            'class' => 'img-box',
            'url' => '/' . strtolower($pictures['women'][0]->session->album->name) . '/' . $pictures['women'][0]->session->id
        ]) ?>

        <?php $sessionUrl = $this->Url->build('/portraits/women', true); ?>

        <div class="mask" style="cursor: pointer;" onclick="window.location='<?= $sessionUrl?>';">
            <div class="thumbnail-image-category">
                <?=strtoupper($pictures['women'][0]->session->album->name) ?>
            </div>
            <div class="separator"></div>
            <div class="fa fa-play-circle-o" style="color:white; margin-top: 20px; font-size: 35px;"></div>
        </div>
    </div>
</div>

<div class="gallery-container home-gallery">
    <div class="view view-first image-box">
        <?= $this->Html->image($pictures['maternity'][0]->url,[
            'class' => 'img-box',
            'url' => '/' . strtolower($pictures['maternity'][0]->session->album->name) . '/' . $pictures['maternity'][0]->session->id
        ]) ?>

        <?php $sessionUrl = $this->Url->build('/maternity', true); ?>

        <div class="mask" style="cursor: pointer;" onclick="window.location='<?= $sessionUrl?>';">
            <div class="thumbnail-image-category">
                <?=strtoupper($pictures['maternity'][0]->session->album->name) ?>
            </div>
            <div class="separator"></div>
            <div class="fa fa-play-circle-o" style="color:white; margin-top: 20px; font-size: 35px;"></div>
        </div>
    </div>
</div>

<div class="gallery-container home-gallery">
    <div class="view view-first image-box">
        <?= $this->Html->image($pictures['couples'][0]->url,[
            'class' => 'img-box',
            'url' => '/' . strtolower($pictures['couples'][0]->session->album->name) . '/' . $pictures['couples'][0]->session->id
        ]) ?>

        <?php $sessionUrl = $this->Url->build('/portraits/couples', true); ?>

        <div class="mask" style="cursor: pointer;" onclick="window.location='<?= $sessionUrl?>';">
            <div class="thumbnail-image-category">
                <?=strtoupper($pictures['couples'][0]->session->album->name) ?>
            </div>
            <div class="separator"></div>
            <div class="fa fa-play-circle-o" style="color:white; margin-top: 20px; font-size: 35px;"></div>
        </div>
    </div>
</div>


<div class="pictureOfTheDay">
    <p class="subtitle fancy"><span style="width:100%; margin-top: 35%;"> CHILDREN</span></p>
    <div class="category-description">
        <H1>
            Children grow up so fast - Save those precious moments. Babies, toddlers, family portraits with mom & dad, in my photo studio or your home.
        </H1>
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
        <H1>
            <?= __('Wedding photography in Sofia - candid moments, traditional poses or romantic and intimate photo session - you will have it all!')?>
        </H1>
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
        <H1>
            <?= __('Coverage of different events - festivals, fairs, concerts, theater. The price depends on type, location and duration of the event.')?>
        </H1>
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
