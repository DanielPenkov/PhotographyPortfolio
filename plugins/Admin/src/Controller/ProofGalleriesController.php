<?php
namespace Admin\Controller;

use Admin\Controller\AppController;

/**
 * ProofGalleries Controller
 *
 * @property \Admin\Model\Table\ProofGalleriesTable $ProofGalleries
 */
class ProofGalleriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $proofGalleries = $this->paginate($this->ProofGalleries);

        $this->set(compact('proofGalleries'));
        $this->set('_serialize', ['proofGalleries']);
    }

    /**
     * View method
     *
     * @param string|null $id Proof Gallery id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $proofGallery = $this->ProofGalleries->get($id, [
            'contain' => []
        ]);

        if ($this->request->is('post')) {
            $webroot = WWW_ROOT;

            debug($this->request);
            die;


            $data = $this->request->data;

            debug($data);
            die;


            if($data['type'] === 'thumbnails') {
                $path = $webroot . 'img' . DS . 'thumbnails';
                file_put_contents($path . DS . $data['url']['name'],file_get_contents($this->request->data['url']['tmp_name']));
                $data['url'] = 'thumbnails/' . $data['url']['name'];
            } elseif ($data['type'] === 'project_thumbnail') {
                $path = $webroot . 'img' . DS . 'thumbnails';
                file_put_contents($path . DS . $data['url']['name'],file_get_contents($this->request->data['url']['tmp_name']));
                $data['url'] = 'thumbnails/' . $data['url']['name'];
                unset($data['session_id']);
                $project = $this->Projects->get($data['project_id']);
                $data['projects']  = [
                    [
                        'id' => $project->id,

                    ]
                ];

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

            } elseif ($data['type'] === 'project') {


                $project = $this->Projects->get($data['project_id']);

                $dirName = str_replace(' ', '_', strtolower($project->title));
                $projectPath = $webroot . 'img' . DS . 'projects' . DS . $dirName;


                if (!file_exists($projectPath) && !is_dir($projectPath)) {
                    mkdir($projectPath);
                }

                file_put_contents($projectPath . DS . $data['url']['name'],file_get_contents($this->request->data['url']['tmp_name']));
                $data['url'] = 'projects' . DS . $dirName . DS . $data['url']['name'];

                unset($data['session_id']);
                $data['projects']  = [
                    [
                        'id' => $project->id,

                    ]
                ];
            }

            $picture = $this->Pictures->patchEntity($picture, $data);
            if ($this->Pictures->save($picture, ['associated' => ['Projects']])) {
                $this->Flash->success(__('The picture has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {


                $this->Flash->error(__('The picture could not be saved. Please, try again.'));
            }
        }

        $this->set('proofGallery', $proofGallery);
        $this->set('_serialize', ['proofGallery']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $proofGallery = $this->ProofGalleries->newEntity();
        if ($this->request->is('post')) {
            $proofGallery = $this->ProofGalleries->patchEntity($proofGallery, $this->request->getData());
            if ($this->ProofGalleries->save($proofGallery)) {
                $this->Flash->success(__('The proof gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The proof gallery could not be saved. Please, try again.'));
        }
        $this->set(compact('proofGallery'));
        $this->set('_serialize', ['proofGallery']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Proof Gallery id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $proofGallery = $this->ProofGalleries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $proofGallery = $this->ProofGalleries->patchEntity($proofGallery, $this->request->getData());
            if ($this->ProofGalleries->save($proofGallery)) {
                $this->Flash->success(__('The proof gallery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The proof gallery could not be saved. Please, try again.'));
        }
        $this->set(compact('proofGallery'));
        $this->set('_serialize', ['proofGallery']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Proof Gallery id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $proofGallery = $this->ProofGalleries->get($id);
        if ($this->ProofGalleries->delete($proofGallery)) {
            $this->Flash->success(__('The proof gallery has been deleted.'));
        } else {
            $this->Flash->error(__('The proof gallery could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
