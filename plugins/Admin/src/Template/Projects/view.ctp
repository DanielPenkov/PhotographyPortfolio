<div class="projects view large-9 medium-8 columns content">
    <h3><?= h($project->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($project->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($project->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($project->created) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($project->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pictures') ?></h4>
        <?php if (!empty($project->pictures)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Url') ?></th>
                <th><?= __('Session Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Placement') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->pictures as $pictures): ?>
            <tr>
                <td><?= h($pictures->id) ?></td>
                <td><?= h($pictures->name) ?></td>
                <td><?= $this->Html->image($pictures->url, ['width' => '50', 'fullBase' => true]) ?></td>
                <td><?= h($pictures->session_id) ?></td>
                <td><?= h($pictures->description) ?></td>
                <td><?= h($pictures->type) ?></td>
                <td><?= h($pictures->placement) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Pictures', 'action' => 'view', $pictures->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Pictures', 'action' => 'edit', $pictures->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pictures', 'action' => 'delete', $pictures->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pictures->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
