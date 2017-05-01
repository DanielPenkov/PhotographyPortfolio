<?php
namespace Client\Controller;
use Cake\ORM\Query;


/**
 * Login Controller
 *
 * @property \App\Model\Table\ProofGalleriesTable $ProofGalleries
 */
class LoginController extends AppController
{
    public function index($id = null)
    {
        $this->loadModel('ProofGalleries');

        if ($this->request->is('POST')) {
            $galleryId = $this->request->session()->read('galleryId');
            $code = $this->request->data('code');

            $proofGallery = $this->ProofGalleries->find()
                ->where([
                    'ProofGalleries.id' => $galleryId,
                    'ProofGalleries.access_code' => $code,
                ])
                ->first();
            if (empty($proofGallery)) {

                $this->Flash->error('Invalid access code!');
            } else {
                $this->request->session()->write('authorized', true);
                return $this->redirect(['controller' => 'proofGalleryImages', 'action' => 'view', $galleryId]);
            }
        }

    }
}
