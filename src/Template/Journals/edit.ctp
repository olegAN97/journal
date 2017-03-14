<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="journals form large-12 medium-8 columns content">
    <?= $this->Form->create($journal) ?>
    <fieldset>
        <legend><?= __('Edit Journal') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('class');
            echo $this->Form->control('subjects._ids', ['options' => $subjects]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
