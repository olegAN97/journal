<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="box box-primary">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Edit User') ?></h3>
        </div>
        <div class="box-body">
        <?php
            echo' <div class="form-group">';
            echo $this->Form->control('login',['class'=>'form-control']);
            echo'</div><div class="form-group">';
            echo $this->Form->control('password',['class'=>'form-control']);
            echo'</div><div class="form-group">';
            echo $this->Form->control('role',['class'=>'form-control']);
            echo'</div>';
        ?>
        </div>
    </fieldset>
    <div class="box-footer">
     <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
