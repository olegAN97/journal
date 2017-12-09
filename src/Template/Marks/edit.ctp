<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="box box-primary">
    <?= $this->Form->create($mark) ?>
    <fieldset>
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Edit Mark') ?></h3>
        </div>
        <div class="box-body">
            <?php
            echo ' <div class="form-group">';
            echo $this->Form->control('student_id', ['options' => $students,'class'=>'form-control']);
            echo '</div><div class="form-group">';
            echo $this->Form->control('subject_id', ['options' => $subjects,'class'=>'form-control']);
            echo '</div><div class="form-group">';
            echo $this->Form->control('mark',['class'=>'form-control']);
            echo '</div><div class="form-group">';
            echo $this->Form->control('n',['class'=>'form-control']);
            echo '</div>';
            ?>
        </div>
    </fieldset>
    <div class="box-footer">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>