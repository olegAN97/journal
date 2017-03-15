<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="box-body no-padding">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= h($subject->title) ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
    <table class="table table-condensed">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($subject->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subject->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Journals') ?></h4>
        <?php if (!empty($subject->journals)): ?>
        <table class="table table-condensed">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Class') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subject->journals as $journals): ?>
            <tr>
                <td><?= h($journals->id) ?></td>
                <td><?= h($journals->title) ?></td>
                <td><?= h($journals->class) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $journals->id], ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $journals->id], ['class' => 'btn btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $journals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $journals->id), 'class' => 'btn btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Teachers') ?></h4>
        <?php if (!empty($subject->teachers)): ?>
        <table class="table table-condensed">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Position') ?></th>
                <th scope="col"><?= __('Experience') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subject->teachers as $teachers): ?>
            <tr>
                <td><?= h($teachers->id) ?></td>
                <td><?= h($teachers->name) ?></td>
                <td><?= h($teachers->position) ?></td>
                <td><?= h($teachers->experience) ?></td>
                <td><?= h($teachers->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $teachers->id], ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $teachers->id], ['class' => 'btn btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $teachers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teachers->id), 'class' => 'btn btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
