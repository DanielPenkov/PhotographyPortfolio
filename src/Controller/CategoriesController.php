<?php
namespace App\Controller;

use App\Controller\AppController;


/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{
    /**
     * {@inheritDoc}
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Pictures');
        $this->loadModel('Categories');
        $this->loadModel('Albums');
        $this->loadModel('Sessions');

        $this->viewBuilder()->layout('gallery');
    }

    public function view($id = null)
    {
        $portraits = $this->Categories->find()
            ->where(['Categories.id' => $id])
            ->contain([
                'Albums' => function($q) {
                    return $q
                        ->where(['Albums.name !=' => 'cv-linkedin'])
                        ->contain(['Sessions.Pictures' =>  function ($q) {
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
