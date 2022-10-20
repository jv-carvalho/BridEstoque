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
 * @method \App\Model\Entity\Fornecedor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fornecedor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fornecedor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fornecedor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fornecedor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fornecedor findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FornecedoresTable extends Table
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

        $this->setTable('fornecedores');
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
            ->scalar('Nome')
            ->maxLength('Nome', 255)
            ->requirePresence('username', 'create')
            ->NotEmpty('Nome', 'Necessário preencher o campo nome');

        $validator
            ->scalar('email')
            ->maxLength('email', 255)
            ->requirePresence('email', 'create')
            ->NotEmpty('email', 'Necessário preencher o campo senha');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 255)
            ->requirePresence('telefone', 'create')
            ->NotEmpty('telefone', 'Necessário preencher o campo setor');

        return $validator;
    }
}