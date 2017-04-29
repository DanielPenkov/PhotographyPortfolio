<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Proof Galleries'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="proofGalleries form large-9 medium-8 columns content">
    <?= $this->Form->create($proofGallery) ?>
    <fieldset>
        <legend><?= __('Add Proof Gallery') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('access_code');
            echo $this->Form->control('expired', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
