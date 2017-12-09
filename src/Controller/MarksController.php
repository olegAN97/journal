<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Marks Controller
 *
 * @property \App\Model\Table\MarksTable $Marks
 */
class MarksController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mark = $this->Marks->newEntity();
        if ($this->request->is('post')) {
            $mark = $this->Marks->patchEntity($mark, $this->request->getData());
            if ($this->Marks->save($mark)) {
                $this->Flash->success(__('The mark has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The mark could not be saved. Please, try again.'));
        }
        $students = $this->Marks->Students->find('list', ['limit' => 200]);
        $subjects = $this->Marks->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('mark', 'students', 'subjects'));
        $this->set('_serialize', ['mark']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mark id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mark = $this->Marks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mark = $this->Marks->patchEntity($mark, $this->request->getData());
            if ($this->Marks->save($mark)) {
                $this->Flash->success(__('The mark has been saved.'));

                return $this->redirect(['action' => 'edit']);
            }
            $this->Flash->error(__('The mark could not be saved. Please, try again.'));
        }
        $students = $this->Marks->Students->find('list', ['limit' => 200]);
        $subjects = $this->Marks->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('mark', 'students', 'subjects'));
        $this->set('_serialize', ['mark']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mark id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mark = $this->Marks->get($id);
        if ($this->Marks->delete($mark)) {
            $this->Flash->success(__('The mark has been deleted.'));
        } else {
            $this->Flash->error(__('The mark could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'add']);
    }
}
