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
        <br>
        <a id="dlink"  style="display:none;"></a>
        <input type="button"  class="btn btn-primary" onclick="tableToExcel('example1', 'name')" value="Export to Excel">
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
    var tableToExcel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><meta charset="UTF-8"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
            , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
            , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
        return function (table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = { worksheet: name|| 'Worksheet', table: table.innerHTML }
            var sel1=document.getElementById('journal');
            var sel2=document.getElementById('subject');
            document.getElementById("dlink").href = uri + base64(format(template, ctx));
            document.getElementById("dlink").download = sel1.options[sel1.selectedIndex].text+""+sel2.options[sel2.selectedIndex].text+".xls";
            document.getElementById("dlink").click();

        }
    })()
</script>