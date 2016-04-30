<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Picture'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pictures index large-9 medium-8 columns content">
    <h3><?= __('Pictures') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('session_id') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('placement') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pictures as $picture): ?>
            <tr>
                <td><?= $this->Number->format($picture->id) ?></td>
                <td><?= h($picture->name) ?></td>
                <td><?= $picture->has('session') ? $this->Html->link($picture->session->name, ['controller' => 'Sessions', 'action' => 'view', $picture->session->id]) : '' ?></td>
                <td><?= h($picture->type) ?></td>
                <td><?= $this->Number->format($picture->placement) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $picture->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $picture->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $picture->id], ['confirm' => __('Are you sure you want to delete # {0}?', $picture->id)]) ?>
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
