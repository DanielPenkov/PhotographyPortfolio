<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProofGalleries Model
 *
 * @property \Cake\ORM\Association\HasMany $ProofGalleryImages
 *
 * @method \App\Model\Entity\ProofGallery get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProofGallery newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProofGallery[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProofGallery|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProofGallery patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProofGallery[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProofGallery findOrCreate($search, callable $callback = null, $options = [])
 */
class ProofGalleriesTable extends Table
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

        $this->setTable('proof_galleries');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('ProofGalleryImages', [
            'foreignKey' => 'proof_gallery_id'
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
            ->allowEmpty('access_code');

        $validator
            ->date('expired')
            ->allowEmpty('expired');

        return $validator;
    }
}
