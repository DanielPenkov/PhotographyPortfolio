<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use Cake\ORM\Query;
use Cake\Routing\Router;
use Cake\Utility\Text;

/**
 * ProofGalleries Controller
 *
 * @property \App\Model\Table\ProofGalleriesTable $ProofGalleries
 * @property \App\Model\Table\ProofGalleriesTable $ProofGalleryImages
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

    public function view($id = null)
    {
        $this->loadModel('ProofGalleries');

        $proofGallery = $this->ProofGalleries->find()
            ->where(['ProofGalleries.id' => $id])
            ->contain(['ProofGalleryImages'])
            ->first();

        if ($this->request->query('selected') === 'true') {
            $proofGallery = $this->ProofGalleries->find()
                ->where(['ProofGalleries.id' => $id])
                ->contain(['ProofGalleryImages' => function(Query $q) {
                    return $q->where(['ProofGalleryImages.approved' => true]);
                }])
                ->first();
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
            $proofGallery->access_code = substr(Text::uuid(), 0, 5);
            if ($this->ProofGalleries->save($proofGallery)) {
                $this->Flash->success(__('The proof gallery has been saved.'));

                return $this->redirect(['action' => 'view', $proofGallery->id]);
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

        $this->loadModel('ProofGalleryImages');
        $this->ProofGalleryImages->deleteAll(['proof_gallery_id' => $id]);

        $proofGallery = $this->ProofGalleries->get($id);
        if ($this->ProofGalleries->delete($proofGallery)) {
            $this->Flash->success(__('The proof gallery has been deleted.'));
        } else {
            $this->Flash->error(__('The proof gallery could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function upload($id)
    {
        $this->loadModel('ProofGalleryImages');
        $this->viewBuilder()->setClassName('Json');
        $this->loadComponent('CakephpJqueryFileUpload.JqueryFileUpload');

        $options = array(
            'max_file_size' => 2222048000,
            'max_number_of_files' => 500,
            'access_control_allow_methods' => array(
                'POST'
            ),
            'access_control_allow_origin' => Router::fullBaseUrl(),
            'accept_file_types' => '/\.(jpe?g|png)$/i',
            'upload_dir' => WWW_ROOT . 'img' . DS . 'proof_galeries' . DS . $id . DS,
            'upload_url' => '/files/uploads/',
            'print_response' => false
        );

        $result = $this->JqueryFileUpload->upload($options);


        foreach ($result['files'] as $file) {

            $imageRecord = $this->ProofGalleryImages->newEntity([
                'proof_gallery_id' => $id,
                'name' => $file->name,
                'url' => DS .  'img' . DS . 'proof_galeries' . DS . $id . DS . $file->name
            ]);

            $this->ProofGalleryImages->save($imageRecord);
        }

        $this->set('response', 'success');
        $this->set('_serialize', ['response']);

    }

    public function deleteImage()
    {
        $this->viewBuilder()->setClassName('Json');

        $this->loadModel('ProofGalleryImages');

        $imageId = $this->request->data('id');

        $picture = $this->ProofGalleryImages->get($imageId);

        $this->ProofGalleryImages->delete($picture);

        $this->set('success', true);
    }
}
