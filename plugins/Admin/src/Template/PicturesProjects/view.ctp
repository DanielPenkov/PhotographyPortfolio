<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pictures Project'), ['action' => 'edit', $picturesProject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pictures Project'), ['action' => 'delete', $picturesProject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $picturesProject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pictures Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pictures Project'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="picturesProjects view large-9 medium-8 columns content">
    <h3><?= h($picturesProject->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Project') ?></th>
            <td><?= $picturesProject->has('project') ? $this->Html->link($picturesProject->project->title, ['controller' => 'Projects', 'action' => 'view', $picturesProject->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Picture') ?></th>
            <td><?= $picturesProject->has('picture') ? $this->Html->link($picturesProject->picture->name, ['controller' => 'Pictures', 'action' => 'view', $picturesProject->picture->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($picturesProject->id) ?></td>
        </tr>
    </table>
</div>
