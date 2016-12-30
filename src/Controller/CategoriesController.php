<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;


/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 * @property \App\Model\Table\AlbumsTable $Albums
 * @property \App\Model\Table\SessionsTable $Sessions
 */
class CategoriesController extends AppController
{
    public function view($id = null)
    {
        $this->loadModel('Pictures');
        $this->loadModel('Categories');
        $this->loadModel('Albums');
        $this->loadModel('Sessions');

        $this->viewBuilder()->layout('gallery');

        $portraits = $this->Categories->find()
            ->where(['Categories.id' => $id])
            ->contain([
                'Albums' => function(Query $q) {
                    return $q
                        ->where([
                            'Albums.name !=' => 'cv-linkedin',
                            'Albums.name !=' => 'christmas',
                        ])
                        ->contain(['Sessions.Pictures' =>  function (Query $q) {
                            return $q
                                ->where(['Pictures.type' => 'thumbnails']);
                        }]);
            }])
            ->first();

        $cvSessions = $this->Categories->find()
            ->where(['Categories.id' => $id])
            ->contain([
                'Albums' => function($q) {
                    return $q
                        ->where(['Albums.name' => 'cv-linkedin'])
                        ->contain(['Sessions.Pictures' =>  function ($q) {
                            return $q
                                ->where(['Pictures.type' => 'thumbnails']);
                        }]);
                }])
            ->first();

        $this->set('cvSessions', $cvSessions);
        $this->set('portraits', $portraits);
        $this->set('_serialize', ['category']);
    }
}
