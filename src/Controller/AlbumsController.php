<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class AlbumsController extends AppController
{

    /**
     * {@inheritDoc}
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Pictures');
        $this->loadModel('Albums');
        $this->loadModel('Sessions');

        $this->viewBuilder()->layout('gallery');
    }

    public function view($id = null)
    {

        $pictures = $this->Pictures->find()
            ->where(['Pictures.type' => 'thumbnails'])
            ->matching('Sessions', function ($q) use($id) {
                return $q
                    ->where(['Sessions.album_id' => $id])
                    ->contain(['Albums']);
            })
        ->order(['Pictures.placement' => 'ASC']);

        $this->set('pictures', $pictures);
    }
    
}
