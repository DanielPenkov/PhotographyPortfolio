<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sessions Controller
 *
 * @property \App\Model\Table\SessionsTable $Sessions
 * @property \App\Model\Table\PicturesTable $Pictures
 */
class SessionsController extends AppController
{
    public function view($id = null)
    {
        $this->loadModel('Pictures');
        $this->viewBuilder()->layout('session');

        $pictures = $this->Pictures->find()
            ->where(['Pictures.session_id' => $id, 'Pictures.type' => 'session'])
            ->order(['Pictures.placement' => 'ASC']);

        $this->set('pictures', $pictures);
    }
}
