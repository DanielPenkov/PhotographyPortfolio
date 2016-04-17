
<div class="pictures form large-9 medium-8 columns content">
    <?= $this->Form->create($picture,  ['enctype' => 'multipart/form-data', 'type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Picture') ?></legend>

        <div class="form-group">
            <label for="logo" class="col-sm-2 control-label"><?= __('Image'); ?></label>

            <div class="col-sm-9 col-md-offset-1">
                <?php
                echo $this->Form->file('url', [
                    'type' => 'file',
                    'class' => 'form-control',
                    'label' => false,
                    'accept' => 'image/*',
                    'required' => false,
                ]);
                ?>
            </div>
        </div>

        <?php echo $this->Form->input('session_id', ['options' => $sessions, 'empty' => true]);
            echo $this->Form->input('type', ['options' => ['session' => 'session', 'thumbnails' => 'thumbnails']]);
            echo $this->Form->input('placement');
           // echo $this->Form->input('projects._ids', ['options' => $projects]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
