<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="box-body no-padding">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=__('View Journals') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <?php
            echo '<div class="form-group">';
            echo $this->Form->control('journal_id', ['options' => $journals,
                'class' => 'form-control',
                'onchange'=>'tableFill()',
                'id'=>'journal'
            ]);
            echo '</div><div class="form-group">';
            echo $this->Form->control('subject_id', ['options' => $subjects,
                'class' => 'form-control',
                'onchange'=>'tableFill()',
                'id'=>'subject'
            ]);
            echo '</div>';
            ?>
            <table id="example1" class="table table-bordered table-striped"></table>

            </div>
        </div>
</div>
<script>
    document.getElementById('journal').value= <?=$id?>;
    function tableFill() {
        var journal_id=document.getElementById('journal').value;
        var subject_id=document.getElementById('subject').value;
        $.post('/journals/data-table',{'journal_id':journal_id,'subject_id':subject_id},function (data) {
            document.getElementById('example1').innerHTML=JSON.parse(data);
        });

    }
    tableFill();

</script>