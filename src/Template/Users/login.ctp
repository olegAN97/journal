<div class="box box-primary">
    <?= $this->Form->create() ?>
    <div class="box-header with-border">
        <h3 class="box-title"><?= __('Login') ?></h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            <?= $this->Form->input('login',['class'=>'form-control']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->input('password',['class'=>'form-control']) ?>
        </div>
    </div>
    <div class="box-footer">
        <?= $this->Form->button('Login', ['class' => 'btn btn-success']) ?>
    </div>
    <?= $this->Form->end() ?>

</div>
