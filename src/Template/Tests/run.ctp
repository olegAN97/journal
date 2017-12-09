<?php
/**
 * @var \App\View\AppView $this
 */

function render_answer ($question){
    $str='';
    foreach ($question['answers'] as $answer)
    {
        $check =$answer->is_correct? "checked":"" ;
        $str.='<div class="form-group">
            <div class="box-body" style="padding-left: 40px">
            <div class="box box-warning">
            <div class="input text required">
            <label>Title of answer</label>
            <input  disabled type="text" name="answer" class="form-control" required="required" maxlength="255" value="'.$answer->title.'">
            <input type="hidden" value="'.$answer->id.'">
            <label class="control control--checkbox pull-left">Is correct
            <input type="checkbox"  />
            <div class="control__indicator"></div>
            </label>
            </div>
            </div></div>
            </div>';
    }
    return $str;
}
?>
<div class="box box-primary">
    <?= $this->Form->create($test) ?>
    <fieldset>
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Edit Test') ?></h3>
        </div>
        <div class="box-body">
            <input type="hidden" id="test_id" value="<?= $test->id ?>">
            <?php
            echo ' <div class="form-group">';
            echo $this->Form->control('subject_id', ['options' => $subjects, 'class' => 'form-control','disabled']);
            echo '</div><div class="form-group">';
            echo $this->Form->control('title', ['class' => 'form-control','disabled']);
            echo '</div><div class="form-group">';
            echo '</div>';
            ?>
            <?= $this->Form->end() ?>
            <div class="">
                <div class="row">
                    <div class='col-sm-6'>
                        <div class="form-group">
                            <label for="title"> Test date</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' id="run_time" class="form-control" name="run_time" disabled value="<?=$test->run_time?>"/>
                                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <span id="questions">
                <?php foreach ($test['questions'] as $question){
                    echo'<div class="form-group">
                         <div class="box box-success" >
                        <div class="input text required">
                        <label >Title of question</label>
                        <input disabled type="text" name="question" class="form-control" required="required" maxlength="255" value="'.$question->title.'">
                        <label >Result</label>
                        <input type="hidden" value="'.$question->id.'">
                        <input disabled type="number" class="form-control" value="'.$question->mark.'">
                        </div>
                        <span class="answers">'.render_answer($question).'</span>
                        <div class="box-footer text-center">
                        </div>
                        </div>
                        </div>';
                }
                ?>
            </span>
        </div>

    </fieldset>
    <div class="box-footer">
        <?= $this->Form->button(__('Send Result'), ['class' => 'btn btn-primary pull-right', 'id' => 'submit']) ?>
    </div>
    <p id="demo"></p>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://rawgit.com/twbs/bootstrap/master/js/collapse.js"></script>
<script src="https://rawgit.com/twbs/bootstrap/master/js/transition.js"></script>
<script src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script>
<script>
    $("#submit").click(function () {
        var test = {
            id: $('#test_id').val()
        };
        var qestion_selector = $('#questions').children('.form-group');
        var questions = [];
        qestion_selector.each(
            function (question) {
                var q_id = $(qestion_selector[question]).children('div.box-success').children('div.input').children(':hidden').val();
                var answers = [];
                $(qestion_selector[question]).children('div.box-success').children('.answers').children('.form-group').each(
                    function (answer) {
                        var checked = ($($(qestion_selector[question]).children('div.box-success').children('.answers').children('.form-group')[answer]).children('div').children('div').children('.input').children('.control').children('input:checked').val() === "on") ? true : false;
                        var a_id = $($(qestion_selector[question]).children('div.box-success').children('.answers').children('.form-group')[answer]).children('div').children('div').children('.input').children(':hidden').val();
                        answers.push({id:a_id? parseInt(a_id): null, is_correct: checked ,question_id:parseInt(q_id)});
                    });
                questions.push({ id:q_id? parseInt(q_id): null,  answers: answers , test_id:parseInt(test.id)});
            });
        test.questions = questions;
        console.log(test.run_time)
        $.post('/tests/check',test,function (result) {
            var data = JSON.parse(result);
            (data === 'Success') ? swal("Status", data, "success"): swal("Status", data ,"error")
        })
    });
</script>