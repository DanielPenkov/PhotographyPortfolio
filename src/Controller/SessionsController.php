<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sessions Controller
 *
 * @property \App\Model\Table\SessionsTable $Sessions
 */
class SessionsController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Pictures');
        $this->loadModel('Categories');
        $this->loadModel('Sessions');

        $this->viewBuilder()->layout('session');
    }
  
    public function view($id = null)
    {

        $pictures = $this->Pictures->find()
            ->where(['Pictures.session_id' => $id, 'Pictures.type' => 'session'])
            ->order(['Pictures.placement' => 'ASC']);

        $this->set('pictures', $pictures);
    }
    
}
