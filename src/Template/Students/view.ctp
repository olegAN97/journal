<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="box-body no-padding">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= h($student->name) ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-condensed">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($student->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Journal') ?></th>
            <td><?= $student->has('journal') ? $this->Html->link($student->journal->title, ['controller' => 'Journals', 'action' => 'view', $student->journal->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $student->has('user') ? $this->Html->link($student->user->id, ['controller' => 'Users', 'action' => 'view', $student->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($student->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Оцінки даного учня') ?></h4>
        <?php if (!empty($student->marks)): ?>
        <table class="table table-condensed">
            <tr>

                <th scope="col"><?= __('Student Id') ?></th>
                <th scope="col"><?= __('Subject Id') ?></th>
                <th scope="col"><?= __('Mark') ?></th>
                <th scope="col"><?= __('N') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->marks as $marks): ?>
            <tr>

                <td><?= h($marks->student_id) ?></td>
                <td><?= h($marks->subject_id) ?></td>
                <td><?= h($marks->mark) ?></td>
                <td><?= h($marks->n) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Marks', 'action' => 'view', $marks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Marks', 'action' => 'edit', $marks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Marks', 'action' => 'delete', $marks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
