<?php
namespace Client\Controller;
use App\Model\Entity\ProofGallery;
use Cake\ORM\Query;


/**
 * ProofGalleryImages Controller
 *
 * @property \App\Model\Table\ProofGalleriesTable $ProofGalleries
 * @property \App\Model\Table\ProofGalleryImagesTable $ProofGalleryImages
 */
class ProofGalleryImagesController extends AppController
{
    public $paginate = [
        'limit' => 1000,
    ];

    public function initialize()
    {
        parent::initialize();

        $galleryId = isset($this->request->params['pass'][0]) ? $this->request->params['pass'][0] : 0;
        $authorized = $this->request->session()->read('authorized');

        if (empty($this->request->session()->read('galleryId'))) {
            $this->request->session()->write('galleryId', $galleryId);
        } elseif (!empty($this->request->session()->read('galleryId')) &&
            $this->request->session()->read('galleryId') !== $galleryId &&
            $this->request->param('action') !== 'select') {
            return $this->redirect(['controller' => 'Login', 'action' => 'index']);
        }

       if (empty($authorized) && $this->request->param('action') !== 'select') {
           return $this->redirect(['controller' => 'Login', 'action' => 'index']);
       }

    }

    public function view($id = null)
    {
        $this->loadModel('ProofGalleryImages');
        $this->loadModel('ProofGalleries');

        /** @var ProofGallery $proofGallery */
        $proofGallery = $this->ProofGalleries->find()
            ->where(['ProofGalleries.id' => $id])
            ->first();

        if  (empty($proofGallery)) {
            return $this->response->withStatus(404);
        }

        $pictures = $this->ProofGalleryImages->find()
            ->matching('ProofGalleries', function (Query $q) use ($id) {
                return $q->where(['ProofGalleries.id' => $id]);
            });

        if (!empty($this->request->query('selected'))) {
            $pictures  = $pictures ->where(['ProofGalleryImages.approved' => true]);
        }

        $count =  $this->ProofGalleryImages->find()
            ->matching('ProofGalleries', function (Query $q) use ($id) {
                return $q->where(['ProofGalleries.id' => $id]);
            })
            ->where(['ProofGalleryImages.approved' => true])
            ->count();

        $this->set('count', $count);
        $this->set('pictures', $pictures);
        $this->set('gallery', $proofGallery);
    }

    public function select()
    {
        $this->viewBuilder()->setClassName('Json');

        $this->loadModel('ProofGalleryImages');

        $imageId = $this->request->data('id');

        $picture = $this->ProofGalleryImages->get($imageId);

        $picture->approved = !($picture->approved == true);

        $this->ProofGalleryImages->save($picture);

        $this->set('success', true);
    }
}
