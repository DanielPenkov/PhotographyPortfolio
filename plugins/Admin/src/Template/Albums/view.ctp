<div class="albums view large-9 medium-8 columns content">
    <h3><?= h($album->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($album->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= $album->has('category') ? $this->Html->link($album->category->name, ['controller' => 'Categories', 'action' => 'view', $album->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($album->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($album->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sessions') ?></h4>
        <?php if (!empty($album->sessions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Album Id') ?></th>
                <th><?= __('Placement') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($album->sessions as $sessions): ?>
            <tr>
                <td><?= h($sessions->id) ?></td>
                <td><?= h($sessions->name) ?></td>
                <td><?= h($sessions->description) ?></td>
                <td><?= h($sessions->album_id) ?></td>
                <td><?= h($sessions->pictures[0]->placement) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sessions', 'action' => 'view', $sessions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sessions', 'action' => 'edit', $sessions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sessions', 'action' => 'delete', $sessions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sessions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
