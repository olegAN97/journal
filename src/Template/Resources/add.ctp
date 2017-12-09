<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="box box-primary">
    <?= $this->Form->create($resource,['type'=>'file']) ?>
    <div class="box-header with-border">
        <h3 class="box-title"><?= __('Add Resources') ?></h3>
    </div>
    <div class="box-body">
        <?php
            echo $this->Form->control('subject_id', ['options' => $subjects,'class'=>'form-control']);
        ?>
        <div class="box-body">
         <input type="file" name="file">
        </div>
        <div class="box-footer">
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>