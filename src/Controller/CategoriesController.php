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
        $category = $this->Categories->find()
            ->where(['Categories.id' => $id])
            ->contain([
                'Albums.Sessions.Pictures' =>  function ($q) {
                    return $q
                        ->where(['Pictures.type' => 'thumbnails']);
                }
            ])
        ->first();


        $this->set('category', $category);
        $this->set('_serialize', ['category']);
    }
}
