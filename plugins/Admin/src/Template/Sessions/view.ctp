<div class="sessions view large-9 medium-8 columns content">
    <h3><?= h($session->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($session->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Album') ?></th>
            <td><?= $session->has('album') ? $this->Html->link($session->album->name, ['controller' => 'Albums', 'action' => 'view', $session->album->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($session->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Front') ?></th>
            <td><?= ($session->is_front) ? 'Yes' : 'No'?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($session->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pictures') ?></h4>
        <?php if (!empty($session->pictures)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Picture') ?></th>
                <th><?= __('Session Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Placement') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($session->pictures as $pictures): ?>
            <tr>
                <td><?= h($pictures->id) ?></td>
                <td><?= h($pictures->name) ?></td>
                <td><?= $this->Html->image('http://localhost/geri/img/' . $pictures->url, ['width' => '50', 'fullBase' => false]) ?></td>
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
