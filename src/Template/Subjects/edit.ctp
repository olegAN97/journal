<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="box box-primary">
    <?= $this->Form->create($subject) ?>
    <fieldset>
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Edit Subject') ?></h3>
        </div>
        <div class="box-body">
        <?php
        echo'<div class="form-group">';
            echo $this->Form->control('title',['class'=>'form-control']);
        echo'</div><div class="form-group">';
            echo $this->Form->control('teachers._ids', ['options' => $teachers,'class'=>'form-control']);
        echo'</div>';
        ?>
        </div>
    </fieldset>
    <div class="box-footer">
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
