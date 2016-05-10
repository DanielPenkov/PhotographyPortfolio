<?php
namespace App\Model\Table;

use App\Model\Entity\Picture;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pictures Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\BelongsTo $Sessions
 */
class PicturesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('pictures');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id'
        ]);

        $this->belongsToMany('Projects', [
            'foreignKey' => 'picture_id',
            'targetForeignKey' => 'project_id',
            'joinTable' => 'pictures_projects'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->requirePresence('url', 'create')
            ->notEmpty('url');

        $validator
            ->allowEmpty('description');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));
        return $rules;
    }

    public function getPictureOfTheDay( $count = null)
    {
        $pictureOfTheDay = $this->find()
            ->where([
                'Pictures.type' => 'session',
                'Pictures.picture_of_the_day_date IS NULL',
                'Pictures.picture_of_the_day' => true
            ])
            ->matching('Sessions.Albums', function ($q) {
                return $q
                    ->where(['Albums.name !=' => 'business'])
                    ->andWhere(['Albums.name !=' => 'cv']);
            })
            ->order('rand()')
            ->limit(1);

        if (empty($pictureOfTheDay)) {
            $pictureOfTheDay = $this->find()
                ->where([
                    'Pictures.type' => 'session',
                    'Pictures.picture_of_the_day' => true
                ])
                ->matching('Sessions.Albums', function ($q) {
                    return $q
                        ->where(['Albums.name !=' => 'business'])
                        ->andWhere(['Albums.name !=' => 'cv']);
                })
                ->order('rand()')
                ->limit(1);
        }

        $webroot = WWW_ROOT;
        $imgSize = getimagesize($webroot . DS . 'img' . DS . $pictureOfTheDay->first()->url);
        $imgHeight = $imgSize[1];
        $imgWidth = $imgSize[0];

        if ($imgWidth > $imgHeight) {
            $today = date("Y-m-d");
            $pictureOfTheDay->first()->picture_of_the_day_date = $today;
            $this->save($pictureOfTheDay->first());

            return $pictureOfTheDay->first();
        }

        $picture = $pictureOfTheDay->first();
        $picture->picture_of_the_day = false;
        $this->save($picture);

        return $this->getPictureOfTheDay();
    }
}
