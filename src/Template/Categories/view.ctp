<div style="text-align: center; margin-top: 100px; color:#777; font-size: 1.2em;">
    Click on the image to see full gallery
</div>

<?php
shuffle($categoryPictures->albums) ;
foreach ($categoryPictures->albums as $album) {
    if (!empty($album->sessions)) {
        shuffle($album->sessions);
        foreach ($album->sessions as $session) { ?>
            <div class="gallery-container">
                <div class="view view-first image-box">
                    <?= $this->Html->image($session->pictures[0]->url,[
                        'class' => 'img-box',
                        'url' => '/' . strtolower($album->name) . '/' . $session->id
                    ]) ?>

                    <?php $sessionUrl = $this->Url->build('/' . strtolower($album->name) . '/' . $session->id, true); ?>

                    <div class="mask" style="cursor: pointer;" onclick="window.location='<?= $sessionUrl?>';">
                        <div class="thumbnail-image-category">
                            <?=strtoupper($album->name) ?>
                        </div>
                        <div class="separator"></div>
                        <div class="text-center thumbnail-image-name"><?=ucfirst($session->name) ?></div>
                        <div class="fa fa-play-circle-o" style="color:white; margin-top: 20px; font-size: 35px;"></div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
} ?>
<?php
shuffle($cvSessions->albums) ;
foreach ($cvSessions->albums as $album) {
    if (!empty($album->sessions)) {
        shuffle($album->sessions);
        foreach ($album->sessions as $session) { ?>
            <div class="gallery-container">
                <div class="view view-first image-box">
                    <?= $this->Html->image($session->pictures[0]->url,[
                        'class' => 'img-box',
                        'url' => '/' . strtolower($album->name) . '/' . $session->id
                    ]) ?>

                    <?php $sessionUrl = $this->Url->build('/' . strtolower($album->name) . '/' . $session->id, true); ?>

                    <div class="mask" style="cursor: pointer;" onclick="window.location='<?= $sessionUrl?>';">
                        <div class="thumbnail-image-category">
                            <?=strtoupper($album->name) ?>
                        </div>
                        <div class="separator"></div>
                        <div class="text-center thumbnail-image-name"><?=ucfirst($session->name) ?></div>
                        <div class="fa fa-play-circle-o" style="color:white; margin-top: 20px; font-size: 35px;"></div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
} ?>
