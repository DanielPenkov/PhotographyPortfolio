<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Collection\Collection;
use Cake\ORM\Query;

/**
 * HomeController
 *
 * @property \App\Model\Table\PicturesTable $Pictures
 */

class HomeController extends AppController {

	public function index() {
		$this->loadModel('Pictures');
		$this->loadModel('Albums');
		$this->loadModel('Sessions');
		$this->viewBuilder()->layout('gallery');

		/** @var PicturesTable $pictures */
		$pictures = $this->Pictures->find()
		                 ->where(['Pictures.type' => 'thumbnails'])
			->contain(['Sessions.Albums.Categories'])
			->matching('Sessions', function (Query $q) {
				return $q
				->where(['Sessions.is_front' => true])
					->contain(['Albums']);
			})
			->order('rand()');

		/** @var Collection $picturesCollection */
		$picturesCollection = new Collection($pictures);

		/** @var Collection $groupedCollectionPictures */
		$groupedCollectionPictures = $picturesCollection
			->groupBy('session.album.category.name')
			->toArray();

		/** @var Collection $portraitsCollection */
		$portraitsCollection = (new Collection($groupedCollectionPictures['portraits']))
			->groupBy('session.album.name')
			->toArray();

		$otherSessionsCollection = (new Collection($groupedCollectionPictures['']))
			->groupBy('session.album.name')
			->toArray();

		$groupedCollectionPictures['cv']        = $portraitsCollection['cv-linkedin'];
		$groupedCollectionPictures['women']     = $portraitsCollection['women'];
		$groupedCollectionPictures['couples']   = $portraitsCollection['couples'];
		$groupedCollectionPictures['maternity'] = $otherSessionsCollection['maternity'];
		unset($groupedCollectionPictures['portraits']);

		$this->set('pictures', $groupedCollectionPictures);
	}
}
