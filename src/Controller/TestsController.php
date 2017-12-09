<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;
use Psy\Util\Json;

/**
 * Tests Controller
 *
 * @property \App\Model\Table\TestsTable $Tests
 * @property \App\Model\Table\SubjectsTable $Subjects
 * @property \App\Model\Table\QuestionsTable $Questions
 * @property \App\Model\Table\AnswersTable $Answers
 *
 * @method \App\Model\Entity\Test[] paginate($object = null, array $settings = [])
 */
class TestsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Subjects']
        ];
        $tests = $this->paginate($this->Tests);

        $this->set(compact('tests'));
        $this->set('_serialize', ['tests']);
    }

    /**
     * View method
     *
     * @param string|null $id Test id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $test = $this->Tests->get($id, [
            'contain' => ['Subjects', 'Questions' => 'Answers']
        ]);
        $subjects = $this->Tests->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('test', 'subjects'));
        $this->set('_serialize', ['test']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $test = $this->Tests->newEntity();
        $subjects = $this->Tests->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('test', 'subjects'));
        $this->set('_serialize', ['test']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Test id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $test = $this->Tests->get($id, [
            'contain' => ['Questions' => 'Answers']
        ]);
        $subjects = $this->Tests->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('test', 'subjects'));
        $this->set('_serialize', ['test']);
    }

    public function update()
    {
        if (isset($this->request->getData()['removed']))
            $removed = $this->request->getData()['removed'];
        $data = $this->request->getData()['test'];
        if (TableRegistry::get('Subjects')->get($data['subject_id'])
            && !empty($data['title'])
            && !empty($data['run_time'])
            && !empty($data['id'])) {
            try {
                $test = $this->Tests->get($data['id']);
                $test = $this->Tests->patchEntity($test, $data, ['associated' => ['Questions.Answers']]);
                $this->Tests->save($test);
                if (!empty($removed['answers']))
                    foreach ($removed['answers'] as $answer) {
                        $answer = TableRegistry::get('Answers')->get($answer);
                        TableRegistry::get('Answers')->delete($answer);
                    }
                if (!empty($removed['questions']))
                    foreach ($removed['questions'] as $question) {
                        $question = TableRegistry::get('Questions')->get($question);
                        TableRegistry::get('Questions')->delete($question);
                    }
            } catch (\Exception $e) {
                return (new Response(['body' => Json::encode('Invalid data' . $e->getMessage())]));
            }
            return (new Response(['body' => Json::encode('Success')]));
        }

        return (new Response(['body' => Json::encode('Invalid data')]));
    }

    /**
     * Delete method
     *
     * @param string|null $id Test id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $test = $this->Tests->get($id);
        if ($this->Tests->delete($test)) {
            $this->Flash->success(__('The test has been deleted.'));
        } else {
            $this->Flash->error(__('The test could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function save()
    {
        $data = $this->request->getData();
        if (TableRegistry::get('Subjects')->get($data['subject_id']) && !empty($data['title']) && !empty($data['run_time'])) {
            try {
                $test = $this->Tests->newEntity($data, ['associated' => ['Questions.Answers']]);
                $this->Tests->save($test);
            } catch (\Exception $e) {
                return (new Response(['body' => Json::encode('Invalid data')]));
            }
            return (new Response(['body' => Json::encode('Success')]));
        }
        return (new Response(['body' => Json::encode('Invalid data')]));
    }

    public function show()
    {
        $this->paginate = [
            'contain' => ['Subjects']
        ];
        $tests = $this->paginate($this->Tests);

        $this->set(compact('tests'));
        $this->set('_serialize', ['tests']);
    }

    /**
     * Check is current user authorized
     *
     * @param $user
     * @return bool
     */
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        $user = $this->Auth->user();
        if ($user['role'] == "teacher") {
            return true;
        }
        if (in_array($action, ['index', 'display', 'show'])) {
            return true;
        }
        if (in_array($action, ['run'])&& isset($this->request->getAttribute('params')['pass'][0]))
        {
            $test=TableRegistry::get('Tests')->get($this->request->getAttribute('params')['pass'][0]);
            if($test && strtotime($test->run_time)+45*MINUTE >= time()&& time()>strtotime($test->run_time) )
            {
                return true;
            }
        }
        if (in_array($action, ['check'])&& !empty($this->request->getData('id')))
        {
            $test=TableRegistry::get('Tests')->get($this->request->getData('id'));
            if($test && strtotime($test->run_time)+45*MINUTE >= time()&& time()>strtotime($test->run_time) )
            {
                return true;
            }
        }
        return false;
    }

    public function run($id)
    {
        $test = $this->Tests->get($id, [
            'contain' => ['Questions' => 'Answers']
        ]);
        $subjects = $this->Tests->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('test', 'subjects'));
        $this->set('_serialize', ['test']);
    }

    public function check()
    {
        $student=TableRegistry::get('Students')->findByUserId($this->Auth->user()['id'])->first();
        $mark = 0;
        $data = $this->request->getData();
        if (!empty($data['id'])) {
            $test = $this->Tests->get($data['id'], [
                'contain' => ['Questions' => 'Answers']
            ]);

            foreach ($test->questions as $question) {
                $checker = true;
                foreach ($data['questions'] as $user_question) {
                    foreach ($question->answers as $answer) {
                        if ($question->id == $user_question['id']) {
                            foreach ($user_question['answers'] as $user_answer) {
                                if ($user_answer['id'] == $answer->id) {
                                    $checker = $checker && (filter_var($user_answer['is_correct'], 258) == $answer->is_correct);
                                }
                            }
                        }
                    }
                }
                $mark += $checker ? $question->mark : 0;
            }
            $mark=TableRegistry::get('Marks')->newEntity([
                'student_id'=>$student->id,
                'subject_id'=>$test->subject_id,
                'mark'=>$mark,
                'n'=>0
            ]);
            TableRegistry::get('Marks')->save($mark);

            return (new Response(['body' => Json::encode('Success')]));
        }
        return (new Response(['body' => Json::encode('Invalid data')]));
    }

}
