<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pictures Project'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pictures'), ['controller' => 'Pictures', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Pictures', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="picturesProjects index large-9 medium-8 columns content">
    <h3><?= __('Pictures Projects') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('project_id') ?></th>
                <th><?= $this->Paginator->sort('picture_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($picturesProjects as $picturesProject): ?>
            <tr>
                <td><?= $this->Number->format($picturesProject->id) ?></td>
                <td><?= $picturesProject->has('project') ? $this->Html->link($picturesProject->project->title, ['controller' => 'Projects', 'action' => 'view', $picturesProject->project->id]) : '' ?></td>
                <td><?= $picturesProject->has('picture') ? $this->Html->link($picturesProject->picture->name, ['controller' => 'Pictures', 'action' => 'view', $picturesProject->picture->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $picturesProject->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $picturesProject->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $picturesProject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $picturesProject->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
