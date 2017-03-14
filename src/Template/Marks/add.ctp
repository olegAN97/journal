<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="marks form large-12 medium-8 columns content">
    <?= $this->Form->create($mark) ?>
    <fieldset>
        <legend><?= __('Add Mark') ?></legend>
        <?php
            echo $this->Form->control('student_id', ['options' => $students]);
            echo $this->Form->control('subject_id', ['options' => $subjects]);
            echo $this->Form->control('mark');
            echo $this->Form->control('n');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
