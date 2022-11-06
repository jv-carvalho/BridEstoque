<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\TestSuite\Constraint\Response\BodyNotEmpty;
use Cake\Validation\Validator;

class ItemComprasTable extends Table
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

        $this->setTable('ItemCompras');
        $this->setDisplayField('Id');
        $this->setPrimaryKey('Id');

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
            ->integer('Id')
            ->allowEmpty('Id', 'create');

        $validator
            ->scalar('quantidade')
            ->maxLength('quantidade', 255)
            ->requirePresence('quantidade', 'create')
            ->NotEmpty('quantidade', 'Necessário preencher o campo nome');

        $validator
            ->scalar('preco')
            ->requirePresence('preco', 'create')
            ->NotEmpty('preco', 'Necessário preencher o campo senha');


        return $validator;
    }
}