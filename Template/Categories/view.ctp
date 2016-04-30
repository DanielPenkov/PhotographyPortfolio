<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Picture'), ['controller' => 'Picture', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Picture'), ['controller' => 'Picture', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($category->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Picture') ?></h4>
        <?php if (!empty($category->picture)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Url') ?></th>
                <th><?= __('Session Id') ?></th>
                <th><?= __('Description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->picture as $picture): ?>
            <tr>
                <td><?= h($picture->id) ?></td>
                <td><?= h($picture->name) ?></td>
                <td><?= h($picture->category_id) ?></td>
                <td><?= h($picture->url) ?></td>
                <td><?= h($picture->session_id) ?></td>
                <td><?= h($picture->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Picture', 'action' => 'view', $picture->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Picture', 'action' => 'edit', $picture->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Picture', 'action' => 'delete', $picture->id], ['confirm' => __('Are you sure you want to delete # {0}?', $picture->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>