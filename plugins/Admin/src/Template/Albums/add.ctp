<div class="albums form large-9 medium-8 columns content">
    <?= $this->Form->create($album) ?>
    <fieldset>
        <legend><?= __('Add Album') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('category_id', ['options' => $categories, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
