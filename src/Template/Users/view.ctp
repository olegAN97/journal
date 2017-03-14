<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="users view large-12 medium-8 columns content">
    <h3><?= h($user->login) ?></h3>
    <table class="vertical-table">
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
            <td><?= $user->has('student') ? $this->Html->link($user->student->name, ['controller' => 'Students', 'action' => 'view', $user->student->id]) : 'is\'t student' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teacher') ?></th>
            <td><?= $user->has('teacher') ? $this->Html->link($user->teacher->name, ['controller' => 'Teachers', 'action' => 'view', $user->teacher->id]) : 'isn\'t teacher' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
</div>
