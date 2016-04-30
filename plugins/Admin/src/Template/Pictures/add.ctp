<script>
   $(function () {
       $('#projectsDropdown').hide();

        $('select[name="type"]').change(function(){
            if ($(this).val() == "project" || $(this).val() == "project_thumbnail") {
                $('#sessionsDropdown').hide();
                $('#projectsDropdown').show();
            } else if ($(this).val() == "session" || $(this).val() == "thumbnails") {
                    $('#sessionsDropdown').show();
                    $('#projectsDropdown').hide();
            }
        });
    });
</script>

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

        <div>
            <?= $this->Form->input('type', ['options' => ['session' => 'session', 'thumbnails' => 'thumbnails', 'project' => 'project', 'project_thumbnail' => 'project thumbnail']]);?>
        </div>

        <div id="sessionsDropdown">
            <?= $this->Form->input('session_id', ['options' => $sessions, 'empty' => true]);?>
        </div>

        <div id="projectsDropdown">
            <?=$this->Form->input('project_id', ['options' => $projects, 'empty' => true]);?>
        </div>

        <div>
            <?= $this->Form->input('placement');?>
        </div>

        <div>
            <?= $this->Form->input('description');?>
        </div>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
