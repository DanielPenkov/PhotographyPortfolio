
<div class="pictures form large-9 medium-8 columns content">
    <?= $this->Form->create($picture) ?>
    <fieldset>
        <legend><?= __('Edit Picture') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('url');
            echo $this->Form->input('session_id', ['options' => $sessions, 'empty' => true]);
            echo $this->Form->input('description');
            echo $this->Form->input('type');
            echo $this->Form->input('placement');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
