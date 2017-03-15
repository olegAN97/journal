<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="box box-primary">
    <?= $this->Form->create($teacher) ?>
    <fieldset>
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Add Teacher') ?></h3>
        </div>
        <div class="box-body">
        <?php
        echo' <div class="form-group">';
            echo $this->Form->control('name',['class'=>'form-control']);
        echo'</div><div class="form-group">';
            echo $this->Form->control('position',['class'=>'form-control']);
        echo'</div><div class="form-group">';
            echo $this->Form->control('experience',['class'=>'form-control']);
        echo'</div><div class="form-group">';
            echo $this->Form->control('user_id', ['options' => $users,'class'=>'form-control']);
        echo'</div>';
        ?>
        </div>
    </fieldset>
    <div class="box-footer">
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
