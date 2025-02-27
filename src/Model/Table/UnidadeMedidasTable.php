<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\TestSuite\Constraint\Response\BodyNotEmpty;
use Cake\Validation\Validator;

/**
 * Fornecedores Model
 *
 * @method \App\Model\Entity\UnidadeMedida get($primaryKey, $options = [])
 * @method \App\Model\Entity\UnidadeMedida newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UnidadeMedida[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UnidadeMedida|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UnidadeMedida saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UnidadeMedida patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UnidadeMedida[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UnidadeMedida findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UnidadeMedidasTable extends Table
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

        $this->setTable('UnidadeMedidas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('tamanho')
            ->maxLength('tamanho', 50)
            ->requirePresence('tamanho', 'create')
            ->NotEmpty('tamanho', 'Necessário preencher o campo nome');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    
}