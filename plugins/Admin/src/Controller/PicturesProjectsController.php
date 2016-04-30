<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PicturesProjects Controller
 *
 * @property \App\Model\Table\PicturesProjectsTable $PicturesProjects
 */
class PicturesProjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects', 'Pictures']
        ];
        $picturesProjects = $this->paginate($this->PicturesProjects);

        $this->set(compact('picturesProjects'));
        $this->set('_serialize', ['picturesProjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Pictures Project id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $picturesProject = $this->PicturesProjects->get($id, [
            'contain' => ['Projects', 'Pictures']
        ]);

        $this->set('picturesProject', $picturesProject);
        $this->set('_serialize', ['picturesProject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $picturesProject = $this->PicturesProjects->newEntity();
        if ($this->request->is('post')) {
            $picturesProject = $this->PicturesProjects->patchEntity($picturesProject, $this->request->data);
            if ($this->PicturesProjects->save($picturesProject)) {
                $this->Flash->success(__('The pictures project has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pictures project could not be saved. Please, try again.'));
            }
        }
        $projects = $this->PicturesProjects->Projects->find('list', ['limit' => 200]);
        $pictures = $this->PicturesProjects->Pictures->find('list', ['limit' => 200]);
        $this->set(compact('picturesProject', 'projects', 'pictures'));
        $this->set('_serialize', ['picturesProject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pictures Project id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $picturesProject = $this->PicturesProjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $picturesProject = $this->PicturesProjects->patchEntity($picturesProject, $this->request->data);
            if ($this->PicturesProjects->save($picturesProject)) {
                $this->Flash->success(__('The pictures project has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pictures project could not be saved. Please, try again.'));
            }
        }
        $projects = $this->PicturesProjects->Projects->find('list', ['limit' => 200]);
        $pictures = $this->PicturesProjects->Pictures->find('list', ['limit' => 200]);
        $this->set(compact('picturesProject', 'projects', 'pictures'));
        $this->set('_serialize', ['picturesProject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pictures Project id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $picturesProject = $this->PicturesProjects->get($id);
        if ($this->PicturesProjects->delete($picturesProject)) {
            $this->Flash->success(__('The pictures project has been deleted.'));
        } else {
            $this->Flash->error(__('The pictures project could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
