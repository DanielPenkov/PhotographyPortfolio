<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;

/**
 * Albums Controller
 *
 * @property \App\Model\Table\AlbumsTable $Albums
 * @property \App\Model\Table\CategoriesTable $Categories
 * @property \App\Model\Table\PicturesTable $Pictures
 * @property \App\Model\Table\SessionsTable $Sessions
 */
class AlbumsController extends AppController
{
    public function view($id = null)
    {
        $this->loadModel('Pictures');
        $this->loadModel('Albums');
        $this->loadModel('Sessions');
        $this->viewBuilder()->layout('gallery');

        $pictures = $this->Pictures->find()
            ->where(['Pictures.type' => 'thumbnails'])
            ->matching('Sessions', function (Query $q) use($id) {
                return $q
                    ->where(['Sessions.album_id' => $id])
                    ->contain(['Albums']);
            })
        ->order(['Pictures.placement' => 'ASC']);

        $this->set('pictures', $pictures);
    }
}
