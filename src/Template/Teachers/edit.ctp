<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="teachers form large-12 medium-8 columns content">
    <?= $this->Form->create($teacher) ?>
    <fieldset>
        <legend><?= __('Edit Teacher') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('position');
            echo $this->Form->control('experience');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('subjects._ids', ['options' => $subjects]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
