<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="box box-primary">
    <fieldset>
        <div class="box-header with-border">
            <h3 class="box-title"><?= __('Add Test') ?></h3>
        </div>
        <div class="box-body">
            <?php
            echo ' <div class="form-group">';
            echo $this->Form->control('subject_id', ['options' => $subjects, 'class' => 'form-control']);
            echo '</div><div class="form-group">';
            echo $this->Form->control('title', ['class' => 'form-control']);
            echo '</div><div class="form-group">';
            echo '</div>';
            ?>
            <div class="">
                <div class="row">
                    <div class='col-sm-6'>
                        <div class="form-group">
                            <label for="title"> Test date</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' id="run_time" class="form-control" name="run_time"/>
                                <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span id="questions"></span>
        </div>

    </fieldset>
    <div class="box-footer">
        <span class="btn btn-success" id="add">Add Question</span>
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary pull-right', 'id' => 'submit']) ?>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://rawgit.com/twbs/bootstrap/master/js/collapse.js"></script>
<script src="https://rawgit.com/twbs/bootstrap/master/js/transition.js"></script>
<script src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script>
<script>
    $('#add').click(function () {
        $('#questions').append('<div class="form-group">' +
            '<div class="box box-success" >' +
            '<div class="input text required">' +
            '<label >Title of question</label>' +
            '<input type="text" name="question" class="form-control" required="required" maxlength="255">' +
            '<label >Result</label>' +
            '<input type="number" class="form-control">' +
            '</div>' +
            '<span class="answers"></span>' +
            '<span class="btn btn-danger add_answer" style="margin-top: 10px" onclick="remove_question(this)">Delete Question</span>' +
            '<div class="box-footer text-center">' +
            '<span class="btn btn-warning add_answer" onclick="add_answer_event(this)">Add Ansewer</span>' +
            '</div>' +
            '</div>' +
            '</div>');
    });

    function add_answer_event(e) {
        $(e).parent().parent().children('.answers').append('<div class="form-group">' +
            '<div class="box-body" style="padding-left: 40px">' +
            '<div class="box box-warning">' +
            '<div class="input text required">' +
            '<label>Title of answer</label>' +
            '<input type="text" name="answer" class="form-control" required="required" maxlength="255" >' +
            '<label class="control control--checkbox pull-left">Is correct' +
            '<input type="checkbox" />' +
            '<div class="control__indicator"></div>' +
            '</label>' +
            '<span class="btn btn-danger delete_answer pull-right" style="margin-top: 5px" onclick="remove_answer(this)">Delete Ansewer</span>' +
            '</div>' +
            '</div>' +
            '</div>');
    }

    function remove_answer(e) {
        $(e).parent().parent().parent().parent().remove()
    }

    function remove_question(e) {
        $(e).parent().parent().remove()
    }

    $('#datetimepicker1').datetimepicker(
        {
            format: 'YYYY-MM-DD HH:mm'
        }
    );
    $("#submit").click(function () {
        var test = {
            title: $('#title').val(),
            subject_id: $('#subject-id').val(),
            run_time: $('#run_time').val()
        };
        var qestion_selector = $('#questions').children('.form-group');
        var questions = [];
        qestion_selector.each(
            function (question) {

                var question_title = $(qestion_selector[question]).children('div.box-success').children('div.input').children(':text').val();
                var question_mark = parseInt($(qestion_selector[question]).children('div.box-success').children('div.input').children(':input[type="number"]').val());
                var answers = [];
                $(qestion_selector[question]).children('div.box-success').children('.answers').children('.form-group').each(
                    function (answer) {
                        var checked = ($($(qestion_selector[question]).children('div.box-success').children('.answers').children('.form-group')[answer]).children('div').children('div').children('.input').children('.control').children('input:checked').val() === "on") ? true : false;
                        var answer_title = $($(qestion_selector[question]).children('div.box-success').children('.answers').children('.form-group')[answer]).children('div').children('div').children('.input').children('input').val();
                        answers.push({is_correct: checked, title: answer_title});
                    });
                questions.push({title: question_title, mark: question_mark, answers: answers});
            });
        test.questions = questions;
        $.post('save',test,function (result) {
            var data = JSON.parse(result);
            (data === 'Success') ? swal("Status", data, "success"): swal("Status", data ,"error")
        })
    });
</script>