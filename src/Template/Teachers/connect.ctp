<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="box box-primary">
    <?= $this->Form->create($teachers_subjects) ?>
    <fieldset>
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Connect Teacher with Journal and Subject') ?></h3>
        </div>
        <div class="box-body">
        <?php
        echo' <div class="form-group">';
        echo $this->Form->control('journal_id', ['options' => $journals,'class'=>'form-control']);
        echo'</div><div class="form-group">';
            echo $this->Form->control('teacher_subject_id', ['options' => $data,'class'=>'form-control']);
        echo'</div>';
        ?>
        </div>
    </fieldset>
    <div class="box-footer">
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
