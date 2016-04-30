<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{

    public function initialize()
    {
        parent::initialize();

        $this->loadModel('Projects');
        $this->loadModel('Pictures');
        $this->loadModel('Categories');
        $this->loadModel('Albums');
        $this->loadModel('Sessions');

        $this->viewBuilder()->layout('gallery');
    }

    public function index()
    {
        $projects = $this->Projects->find()
        ->contain([
            'Pictures' => function ($q) {
                return $q
                    ->where(['Pictures.type' => 'project_index']);
            }
        ]);

        $this->set('projects', $projects);
        $this->set('_serialize', ['projects']);

    }

    public function view($id = null)
    {
        $project = $this->Projects->find()
            ->where(['Projects.id' => $id])
            ->contain([
                'Pictures' => function ($q) {
                    return $q
                        ->where(['Pictures.type' => 'project']);
                }
            ])
        ->first();


        $this->set('project', $project);
        $this->set('_serialize', ['project']);
    }
}
