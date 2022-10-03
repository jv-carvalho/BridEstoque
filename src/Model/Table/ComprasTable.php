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
 * @method \App\Model\Entity\Compra get($primaryKey, $options = [])
 * @method \App\Model\Entity\Compra newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Compra[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Compra|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Compra saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Compra patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Compra[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Compra findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ComprasTable extends Table
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

        $this->setTable('compras');
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
            ->scalar('Data')
            ->maxLength('Data', 50)
            ->requirePresence('Data', 'create')
            ->NotEmpty('Data', 'Necessário preencher o campo nome');

        $validator
            ->scalar('TotalDaCompra')
            ->maxLength('TotalDaCompra', 255)
            ->requirePresence('TotalDaCompra', 'create')
            ->NotEmpty('TotalDaCompra', 'Necessário preencher o campo senha');

        $validator
            ->scalar('NumeroDocumento')
            ->maxLength('NumeroDocumento', 255)
            ->requirePresence('NumeroDocumento', 'create')
            ->NotEmpty('NumeroDocumento', 'Necessário preencher o campo setor');

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