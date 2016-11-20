<?php
use Cake\I18n\FrozenDate;
?>
<div class="pictures form large-9 medium-8 columns content">
    <?= $this->Form->create($picture) ?>
    <fieldset>
        <legend><?= __('Edit Picture') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('url');
            echo $this->Form->input('session_id', ['options' => $sessions, 'empty' => true]);
            echo $this->Form->input('description');
            echo $this->Form->input('type');
            echo $this->Form->input('placement');

        $isPictureOfTheDay = false;
        if (empty($picture->picture_of_the_day_date) === false) {
            $isPictureOfTheDay = (new FrozenDate())->i18nFormat() === $picture->picture_of_the_day_date->i18nFormat();
        }
            echo (__('Picture of the day '));
            echo $this->Form->checkbox('set_picture_of_the_day', [
                'checked' => $isPictureOfTheDay,
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
