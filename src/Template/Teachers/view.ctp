<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="box-body no-padding">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= h($teacher->name) ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
    <table class="table table-condensed">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($teacher->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($teacher->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $teacher->has('user') ? $this->Html->link($teacher->user->id, ['controller' => 'Users', 'action' => 'view', $teacher->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($teacher->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Experience') ?></th>
            <td><?= $this->Number->format($teacher->experience) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Subjects') ?></h4>
        <?php if (!empty($teacher->subjects)): ?>
        <table  class="table table-condensed">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($teacher->subjects as $subjects): ?>
            <tr>
                <td><?= h($subjects->id) ?></td>
                <td><?= h($subjects->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Subjects', 'action' => 'view', $subjects->id],['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Subjects', 'action' => 'edit', $subjects->id],['class' => 'btn btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Subjects', 'action' => 'delete', $subjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subjects->id), 'class' => 'btn btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
