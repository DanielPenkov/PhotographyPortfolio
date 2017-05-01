<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProofGalleryImages Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ProofGalleries
 *
 * @method \App\Model\Entity\ProofGalleryImage get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProofGalleryImage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProofGalleryImage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProofGalleryImage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProofGalleryImage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProofGalleryImage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProofGalleryImage findOrCreate($search, callable $callback = null, $options = [])
 */
class ProofGalleryImagesTable extends Table
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

        $this->setTable('proof_gallery_images');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ProofGalleries');
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
            ->boolean('approved')
            ->allowEmpty('approved');

        $validator
            ->allowEmpty('url');

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
        $rules->add($rules->existsIn(['proof_gallery_id'], 'ProofGalleries'));

        return $rules;
    }
}
