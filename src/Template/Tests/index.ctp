<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Test[]|\Cake\Collection\CollectionInterface $tests
  */
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?= __('Tests') ?></h3>
    </div>
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('run_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tests as $test): ?>
            <tr>
                <td><?= $this->Number->format($test->id) ?></td>
                <td><?= $test->has('subject') ? $this->Html->link($test->subject->title, ['controller' => 'Subjects', 'action' => 'view', $test->subject->id]) : '' ?></td>
                <td><?= h($test->title) ?></td>
                <td><?= h($test->run_time) ?></td>
                <td><?= h($test->created) ?></td>
                <td><?= h($test->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $test->id],['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('Run'), ['action' => 'run', $test->id],['class' => 'btn btn-success']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $test->id],['class' => 'btn btn-warning']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $test->id], ['confirm' => __('Are you sure you want to delete # {0}?', $test->id),'class' => 'btn btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script>

        $('#example1').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": true
        });

    </script>

