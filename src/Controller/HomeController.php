<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Galery Controller
 *
 * @property \App\Model\Table\GaleryTable $Galery
 */
class HomeController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Pictures');
        $this->loadModel('Albums');
        $this->loadModel('Sessions');

        $this->viewBuilder()->layout('gallery');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('gallery');
        
        $pictures = $this->Pictures->find()
            ->where(['Pictures.type' => 'thumbnails'])
            ->matching('Sessions', function ($q) {
                return $q
                    ->where(['Sessions.is_front' => true])
                    ->contain(['Albums']);
            })
            ->order(['Pictures.placement' => 'ASC']);

        $this->set('pictures', $pictures);
    }
}
