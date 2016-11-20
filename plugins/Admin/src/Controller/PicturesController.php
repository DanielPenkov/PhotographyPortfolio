<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use App\Model\Entity\Pictures;
use Cake\I18n\FrozenDate;

/**
 * Pictures Controller
 *
 * @property \App\Model\Table\PicturesTable $Pictures
 * @property \App\Model\Table\ProjectsTable $Projects
 * @property \App\Model\Table\SessionsTable $Sessions
 */
class PicturesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Pictures');
        $this->loadModel('Albums');
        $this->loadModel('Sessions');
        $this->loadModel('Projects');
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Sessions']
        ];
        $pictures = $this->paginate($this->Pictures);

        $this->set(compact('pictures'));
        $this->set('_serialize', ['pictures']);
    }

    public function view($id = null)
    {
        $picture = $this->Pictures->get($id, [
            'contain' => ['Sessions', 'Projects']
        ]);

        $this->set('picture', $picture);
        $this->set('_serialize', ['picture']);
    }

    public function add()
    {
        $picture = $this->Pictures->newEntity();
        if ($this->request->is('post')) {
            $webroot = WWW_ROOT;
            $data = $this->request->data;

            if($data['type'] === 'thumbnails') {
                $path = $webroot . 'img' . DS . 'thumbnails';
                file_put_contents($path . DS . $data['url']['name'],file_get_contents($this->request->data['url']['tmp_name']));
                $data['url'] = 'thumbnails/' . $data['url']['name'];
            } elseif ($data['type'] === 'project_thumbnail') {
                $path = $webroot . 'img' . DS . 'thumbnails';
                file_put_contents($path . DS . $data['url']['name'],file_get_contents($this->request->data['url']['tmp_name']));
                $data['url'] = 'thumbnails/' . $data['url']['name'];
                unset($data['session_id']);
                $project = $this->Projects->get($data['project_id']);
                $data['projects']  = [
                    [
                        'id' => $project->id,

                    ]
                ];

            } elseif ($data['type'] === 'session') {

                $session = $this->Sessions->get($data['session_id'], ['contain' => ['Albums']]);
                $album = $session->album->name;

                $albumPath = $webroot . 'img' . DS . 'sessions' . DS . $album;

                if (!file_exists($albumPath) && !is_dir($albumPath)) {
                    mkdir($albumPath);
                }

                $dirName = str_replace(' ', '_', strtolower($session->name));
                $path = $webroot . 'img' . DS . 'sessions' . DS . $album . DS . $dirName;

                if (!file_exists($path) && !is_dir($path)) {
                    mkdir($path);
                }

                file_put_contents($path . DS . $data['url']['name'],file_get_contents($this->request->data['url']['tmp_name']));
                $data['url'] = 'sessions/' . $album . '/' . $dirName . '/' . $data['url']['name'];

            } elseif ($data['type'] === 'project') {


                $project = $this->Projects->get($data['project_id']);

                $dirName = str_replace(' ', '_', strtolower($project->title));
                $projectPath = $webroot . 'img' . DS . 'projects' . DS . $dirName;


                if (!file_exists($projectPath) && !is_dir($projectPath)) {
                    mkdir($projectPath);
                }

                file_put_contents($projectPath . DS . $data['url']['name'],file_get_contents($this->request->data['url']['tmp_name']));
                $data['url'] = 'projects' . DS . $dirName . DS . $data['url']['name'];

                unset($data['session_id']);
                $data['projects']  = [
                    [
                        'id' => $project->id,

                    ]
                ];
        }

        $picture = $this->Pictures->patchEntity($picture, $data);
            if ($this->Pictures->save($picture, ['associated' => ['Projects']])) {
                $this->Flash->success(__('The picture has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {


                $this->Flash->error(__('The picture could not be saved. Please, try again.'));
            }
        }
        $sessions = $this->Pictures->Sessions->find('list', ['limit' => 200, 'order' => ['Sessions.id' => 'DESC']]);
        $projects = $this->Pictures->Projects->find('list', ['limit' => 200, 'order' => ['Projects.id' => 'DESC']]);
        $this->set(compact('picture', 'sessions', 'projects'));
        $this->set('_serialize', ['picture']);
    }

    public function edit($id = null)
    {
        $picture = $this->Pictures->get($id, [
            'contain' => ['Projects']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;

            //Make it picture of the day
            if ($data['set_picture_of_the_day'] !== '0') {
                $pictureOfTheDay = $this->Pictures->find()
                    ->orderDesc('Pictures.picture_of_the_day_date')
                    ->first();

                $pictureOfTheDay->picture_of_the_day_date = null;
                $this->Pictures->save($pictureOfTheDay);

                $data['picture_of_the_day_date'] = new FrozenDate();
            }

            $picture = $this->Pictures->patchEntity($picture, $data);
            if ($this->Pictures->save($picture)) {
                $this->Flash->success(__('The picture has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The picture could not be saved. Please, try again.'));
            }
        }
        $sessions = $this->Pictures->Sessions->find('list', ['limit' => 200]);
        $projects = $this->Pictures->Projects->find('list', ['limit' => 200]);
        $this->set(compact('picture', 'sessions', 'projects'));
        $this->set('_serialize', ['picture']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $picture = $this->Pictures->get($id);
        if ($this->Pictures->delete($picture)) {
            $this->Flash->success(__('The picture has been deleted.'));
        } else {
            $this->Flash->error(__('The picture could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
