<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="box-body no-padding">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= h($user->login) ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tr>
                    <th scope="row"><?= __('Login') ?></th>
                    <td><?= h($user->login) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Role') ?></th>
                    <td><?= h($user->role) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Student') ?></th>
                    <td><?= $user->has('student') ? $this->Html->link($user->student->name, ['controller' => 'Students', 'action' => 'view', $user->student->id]) : '<span class="badge bg-red">isn\'t student</span>' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Teacher') ?></th>
                    <td><?= $user->has('teacher') ? $this->Html->link($user->teacher->name, ['controller' => 'Teachers', 'action' => 'view', $user->teacher->id]) : '<span class="badge bg-red">isn\'t  teachert</span>' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
            </table>
        </div>
        <div class="box-footer">
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
