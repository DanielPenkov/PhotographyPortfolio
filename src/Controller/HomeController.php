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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('gallery');
    }
}
