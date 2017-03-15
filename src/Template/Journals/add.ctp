<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="box box-primary">
    <?= $this->Form->create($journal) ?>
    <fieldset>
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Add Journal') ?></h3>
        </div>
        <div class="box-body">
            <?php
            echo '<div class="form-group">';
            echo $this->Form->control('title', ['class' => 'form-control']);
            echo '</div><div class="form-group">';
            echo $this->Form->control('class', ['class' => 'form-control']);
            echo '</div><div class="form-group">';
            echo $this->Form->control('subjects._ids', ['options' => $subjects, 'class' => 'form-control']);
            echo '';
            ?>
        </div>
    </fieldset>
    <div class="box-footer">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
