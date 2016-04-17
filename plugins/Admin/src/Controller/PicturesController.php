<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use App\Model\Entity\Pictures;

/**
 * Pictures Controller
 *
 * @property \App\Model\Table\PicturesTable $Pictures
 */
class PicturesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Pictures');
        $this->loadModel('Albums');
        $this->loadModel('Sessions');
        $this->loadModel('Projects');
    }

   /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sessions']
        ];
        $pictures = $this->paginate($this->Pictures);

        $this->set(compact('pictures'));
        $this->set('_serialize', ['pictures']);
    }

    /**
     * View method
     *
     * @param string|null $id Picture id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $picture = $this->Pictures->get($id, [
            'contain' => ['Sessions', 'Projects']
        ]);

        $this->set('picture', $picture);
        $this->set('_serialize', ['picture']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $picture = $this->Pictures->newEntity();
        if ($this->request->is('post')) {
            $webroot = '/var/www/html/geri/webroot/';
            $data = $this->request->data;

            if($data['type'] === 'thumbnails') {
                $path = $webroot . 'img' . DS . 'thumbnails';
                file_put_contents($path . DS . $data['url']['name'],file_get_contents($this->request->data['url']['tmp_name']));
                $data['url'] = 'thumbnails/' . $data['url']['name'];
            } elseif ($data['type'] === 'session') {

                $session = $this->Sessions->get($data['session_id'], ['contain' => ['Albums']]);
                $album = $session->album->name;

                $albumPath = $webroot . 'img' . DS . 'sessions' . DS . $album;

                if (!file_exists($albumPath) && !is_dir($albumPath)) {
                    mkdir($albumPath);
                }

                $dirName = str_replace(' ', '_', strtolower($session->name));
                $path = $webroot . 'img' . DS . 'sessions' . DS . $album . DS . $dirName;

                if (!file_exists($path) && !is_dir($path)) {
                    mkdir($path);
                }

                file_put_contents($path . DS . $data['url']['name'],file_get_contents($this->request->data['url']['tmp_name']));
                $data['url'] = 'sessions/' . $album . '/' . $dirName . '/' . $data['url']['name'];
            }

            $picture = $this->Pictures->patchEntity($picture, $data);
            if ($this->Pictures->save($picture)) {
                $this->Flash->success(__('The picture has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The picture could not be saved. Please, try again.'));
            }
        }
        $sessions = $this->Pictures->Sessions->find('list', ['limit' => 200, 'order' => ['Sessions.id' => 'DESC']]);
        $projects = $this->Pictures->Projects->find('list', ['limit' => 200]);
        $this->set(compact('picture', 'sessions', 'projects'));
        $this->set('_serialize', ['picture']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Picture id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $picture = $this->Pictures->get($id, [
            'contain' => ['Projects']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $picture = $this->Pictures->patchEntity($picture, $this->request->data);
            if ($this->Pictures->save($picture)) {
                $this->Flash->success(__('The picture has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The picture could not be saved. Please, try again.'));
            }
        }
        $sessions = $this->Pictures->Sessions->find('list', ['limit' => 200]);
        $projects = $this->Pictures->Projects->find('list', ['limit' => 200]);
        $this->set(compact('picture', 'sessions', 'projects'));
        $this->set('_serialize', ['picture']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Picture id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $picture = $this->Pictures->get($id);
        if ($this->Pictures->delete($picture)) {
            $this->Flash->success(__('The picture has been deleted.'));
        } else {
            $this->Flash->error(__('The picture could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
