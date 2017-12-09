<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Test $test
 * @var \App\Model\Entity\Subject $subjects
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
                <label class="control control--checkbox pull-left">Is correct
                    <input disabled type="checkbox" '.$check.' />
                    <div class="control__indicator"></div>
                </label>
            </div>
        </div>
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
                                    <input disabled type='text' id="run_time" class="form-control" name="run_time" value="<?=$test->run_time?>"/>
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
    </div>