<?php foreach ($projects as $project) { ?>
    <div class="gallery-container">
        <div class="view view-first image-box">
            <?= $this->Html->image($project->pictures[0]->url,[
                'class' => 'img-box'
            ]) ?>
            <div class="mask">
                <div class="thumbnail-image-category">
                    <?=__('PROJECTS') ?>
                </div>
                <div class="separator"></div>
                <div class="text-center thumbnail-image-name"><?=ucfirst($project->title) ?></div>
                <?= $this->Html->link('View', '/projects/view/' . $project->id, ['class' => 'info']); ?>
            </div>
        </div>
    </div>
<?php } ?>
