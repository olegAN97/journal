<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="marks view large-12 medium-8 columns content">
    <h3><?= h($mark->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Student') ?></th>
            <td><?= $mark->has('student') ? $this->Html->link($mark->student->name, ['controller' => 'Students', 'action' => 'view', $mark->student->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= $mark->has('subject') ? $this->Html->link($mark->subject->title, ['controller' => 'Subjects', 'action' => 'view', $mark->subject->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('N') ?></th>
            <td><?= h($mark->n) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mark->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mark') ?></th>
            <td><?= $this->Number->format($mark->mark) ?></td>
        </tr>
    </table>
</div>
