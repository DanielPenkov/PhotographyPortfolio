
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($category->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Albums') ?></h4>
        <?php if (!empty($category->albums)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Category Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->albums as $albums): ?>
            <tr>
                <td><?= h($albums->id) ?></td>
                <td><?= h($albums->name) ?></td>
                <td><?= h($albums->description) ?></td>
                <td><?= h($albums->category_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Albums', 'action' => 'view', $albums->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Albums', 'action' => 'edit', $albums->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Albums', 'action' => 'delete', $albums->id], ['confirm' => __('Are you sure you want to delete # {0}?', $albums->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
