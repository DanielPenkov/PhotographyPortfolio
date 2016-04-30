<div class="project">
    <div class="title">
        <h1><?= $project->title?></h1>
    </div>

    <div class="project-description">
       <p>
           <?= $project->description ?>
        </p>
    </div>


    <div class="project-images-container">
        <?php foreach ($project->pictures as $picture) { ?>
            <?= $this->Html->image($picture->url,[
                'class' => 'project-image'
            ]) ?>
            <?php if(!empty($picture->description)) { ?></php>
            <div class="image-description">
                <p><?=$picture->description ?></p>
            </div>
            <?php } ?>
        <?php } ?>
    </div>

</div>