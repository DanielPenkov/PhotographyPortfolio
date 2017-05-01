<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Picture;
use Cake\Collection\Collection;
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
            ->contain(['Sessions.Albums.Categories'])
            ->matching('Sessions', function (Query $q) {
                return $q
                    ->where(['Sessions.is_front' => true])
                    ->contain(['Albums']);
            })
            ->order('rand()');




        $picturesCollection = new Collection($pictures);

        $groupedCollectionPictures = $picturesCollection
            ->groupBy('session.album.category.name')
            ->toArray();


        $this->set('pictures', $groupedCollectionPictures);
    }
}
