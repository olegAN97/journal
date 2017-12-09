<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;

/**
 * Resources Controller
 *
 * @property \App\Model\Table\ResourcesTable $Resources
 *
 * @method \App\Model\Entity\Resource[] paginate($object = null, array $settings = [])
 */
class ResourcesController extends AppController
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
        $resources = $this->paginate($this->Resources);

        $this->set(compact('resources'));
        $this->set('_serialize', ['resources']);
    }



    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resource = $this->Resources->newEntity();
        if ($this->request->is('post')) {
            if(!empty($this->request->getData('file')))
            {
                $file =$this->request->getData('file');
                $extension=pathinfo($file['name'],PATHINFO_EXTENSION);
                $file_name= sha1($file['name'].time());
                move_uploaded_file($file['tmp_name'],WWW_ROOT.'files'.DS.$file_name.'.'.$extension );
                $resource = $this->Resources->patchEntity($resource, [
                    'path'=>$file_name.'.'.$extension,
                    'name'=>$file['name'],
                    'subject_id'=>$this->request->getData('subject_id')
                ]);
                if ($this->Resources->save($resource)) {
                    $this->Flash->success(__('The resource has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The resource could not be saved. Please, try again.'));
            }
        }
        $subjects = $this->Resources->Subjects->find('list', ['limit' => 200]);
        $this->set(compact('resource', 'subjects'));
        $this->set('_serialize', ['resource']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Resource id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resource = $this->Resources->get($id);
        if ($this->Resources->delete($resource)) {
            $this->Flash->success(__('The resource has been deleted.'));
        } else {
            $this->Flash->error(__('The resource could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
