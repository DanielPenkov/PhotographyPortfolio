<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Picture;

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
            ->order('rand()');

        $today = date("Y-m-d");

        $pictureOfTheDay = $this->Pictures->find()
            ->where(['Pictures.picture_of_the_day_date' => $today])
            ->first();
        
        if (empty($pictureOfTheDay)) {
            $pictureOfTheDay = $this->Pictures->getPictureOfTheDAy();
        }

        $this->set('pictureOfTheDay', $pictureOfTheDay);
        $this->set('pictures', $pictures);
    }
}
