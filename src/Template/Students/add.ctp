<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="box box-primary">
    <?= $this->Form->create($student) ?>
    <fieldset>
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Add Student') ?></h3>
        </div>
        <div class="box-body">
            <?php
            echo ' <div class="form-group">';
            echo $this->Form->control('name', ['class' => 'form-control']);
            echo '</div><div class="form-group">';
            echo $this->Form->control('journal_id', ['options' => $journals, 'class' => 'form-control']);
            echo '</div><div class="form-group">';
            echo $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control']);
            echo '</div>';
            ?>
        </div>
    </fieldset>
    <div class="box-footer">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>

