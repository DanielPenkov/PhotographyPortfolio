<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{

    public function index()
    {
        $this->viewBuilder()->layout('gallery');

        $projects = $this->Projects->find()
            ->contain([
                'Pictures' => function ($q) {
                    return $q
                        ->where(['Pictures.type' => 'project_thumbnail']);
            }]);

        $this->set('projects', $projects);
        $this->set('_serialize', ['projects']);

    }

    public function view($id = null)
    {
        $this->viewBuilder()->layout('gallery');

        $project = $this->Projects->find()
            ->where(['Projects.id' => $id])
            ->contain([
                'Pictures' => function (Query $q) {
                    return $q
                        ->where(['Pictures.type' => 'project']);
            }])
            ->first();

        $this->set('project', $project);
        $this->set('_serialize', ['project']);
    }
}
