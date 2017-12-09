<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;
use Psy\Util\Json;

/**
 * Journals Controller
 *
 * @property \App\Model\Table\JournalsTable $Journals
 */
class JournalsController extends AppController
{

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('Table');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $journals = $this->paginate($this->Journals);

        $this->set(compact('journals'));
        $this->set('_serialize', ['journals']);
    }

    /**
     * View method
     * @param $id int
     *
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $journals = $this->Journals->find('list');
        $subjects= TableRegistry::get('Subjects')->find('list');
        $this->set(compact('journals', 'subjects','id'));
        $this->set('_serialize', ['journals','subjects']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $journal = $this->Journals->newEntity();
        if ($this->request->is('post')) {
            $journal = $this->Journals->patchEntity($journal, $this->request->getData());
            if ($this->Journals->save($journal)) {
                $this->Flash->success(__('The journal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The journal could not be saved. Please, try again.'));
        }
        $subjects = $this->Journals->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('journal', 'subjects'));
        $this->set('_serialize', ['journal']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Journal id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $journal = $this->Journals->get($id, [
            'contain' => ['Subjects']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $journal = $this->Journals->patchEntity($journal, $this->request->getData());
            if ($this->Journals->save($journal)) {
                $this->Flash->success(__('The journal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The journal could not be saved. Please, try again.'));
        }
        $subjects = $this->Journals->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('journal', 'subjects'));
        $this->set('_serialize', ['journal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Journal id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $journal = $this->Journals->get($id);
        if ($this->Journals->delete($journal)) {
            $this->Flash->success(__('The journal has been deleted.'));
        } else {
            $this->Flash->error(__('The journal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Api action to  get data from marks table
     */
    public function dataTable()
    {
        $data = $this->request->getData();
        if ($data['journal_id'] && $data['subject_id']) {
            $str=$this->Table
                ->makeTable(TableRegistry::get('Students')
                    ->findByJournalId($data['journal_id'])
                    ->innerJoinWith('Marks', function ($q) use ($data) {
                        return $q->where(['Marks.subject_id' => $data['subject_id']]);
                    })->contain(['Marks'])->group('Students.id')->toList());
            return (new Response(['body'=>Json::encode($str)]));
        }
        return (new Response(['body'=>Json::encode('Invalid data')]));
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
        if (in_array($action, ['index', 'view','display','dataTable'])) {
            return true;
        }
        return false;
    }
}
