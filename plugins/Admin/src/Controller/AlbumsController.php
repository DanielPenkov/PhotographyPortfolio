<?php
namespace Admin\Controller;

use Admin\Controller\AppController;
use App\Model\Entity\Albums;
use Cake\ORM\Query;


/**
 * Albums Controller
 *
 * @property \App\Model\Table\AlbumsTable $Albums
 */
class AlbumsController extends AppController
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
            'contain' => ['Categories']
        ];
        $albums = $this->paginate($this->Albums);

        $this->set(compact('albums'));
        $this->set('_serialize', ['albums']);
    }

    public function view($id = null)
    {
        $album = $this->Albums->get($id, [
            'contain' => [
                'Categories',
                'Sessions.Pictures' => function (Query $q) {
                    return $q
                        ->where(['Pictures.type' => 'thumbnails']);
                }]
        ]);

        $this->set('album', $album);
        $this->set('_serialize', ['album']);
    }

    public function add()
    {
        $album = $this->Albums->newEntity();
        if ($this->request->is('post')) {
            $album = $this->Albums->patchEntity($album, $this->request->data);
            if ($this->Albums->save($album)) {
                $this->Flash->success(__('The album has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The album could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Albums->Categories->find('list', ['limit' => 200]);
        $this->set(compact('album', 'categories'));
        $this->set('_serialize', ['album']);
    }

    public function edit($id = null)
    {
        $album = $this->Albums->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $album = $this->Albums->patchEntity($album, $this->request->data);
            if ($this->Albums->save($album)) {
                $this->Flash->success(__('The album has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The album could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Albums->Categories->find('list', ['limit' => 200]);
        $this->set(compact('album', 'categories'));
        $this->set('_serialize', ['album']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $album = $this->Albums->get($id);
        if ($this->Albums->delete($album)) {
            $this->Flash->success(__('The album has been deleted.'));
        } else {
            $this->Flash->error(__('The album could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
