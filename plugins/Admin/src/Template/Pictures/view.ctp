<div class="pictures view large-9 medium-8 columns content">
    <h3><?= h($picture->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($picture->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Session') ?></th>
            <td><?= $picture->has('session') ? $this->Html->link($picture->session->name, ['controller' => 'Sessions', 'action' => 'view', $picture->session->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($picture->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($picture->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Placement') ?></th>
            <td><?= $this->Number->format($picture->placement) ?></td>
        </tr>
    </table>
    <div class="row">
        <?= $this->Html->image('http://localhost/geri/img/' . $picture->url, ['fullBase' => false]) ?>

    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($picture->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Projects') ?></h4>
        <?php if (!empty($picture->projects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($picture->projects as $projects): ?>
            <tr>
                <td><?= h($projects->id) ?></td>
                <td><?= h($projects->title) ?></td>
                <td><?= h($projects->description) ?></td>
                <td><?= h($projects->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $projects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $projects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $projects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
