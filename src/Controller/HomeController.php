<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Picture;
use Cake\ORM\Query;

/**
 * HomeController
 *
 * @property \App\Model\Table\PicturesTable $Pictures
 */
class HomeController extends AppController
{

    public function index()
    {
        $this->loadModel('Pictures');
        $this->loadModel('Albums');
        $this->loadModel('Sessions');

        $this->viewBuilder()->layout('gallery');

        $pictures = $this->Pictures->find()
            ->where(['Pictures.type' => 'thumbnails'])
            ->matching('Sessions', function (Query $q) {
                return $q
                    ->where(['Sessions.is_front' => true])
                    ->contain(['Albums']);
            })
            ->order('rand()');

        $this->set('pictures', $pictures);
    }
}
