<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * UnidadeMedidas Controller
 *
 * @property \App\Model\Table\UnidadeMedidasTable $UnidadeMedidas
 *
 * @method \App\Model\Entity\UnidadeMedida[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UnidadeMedidasController extends AppController
{
    public function initialize() {
        parent::initialize();

        
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $key = $this->request->getQuery('key');

        $this->paginate = [
            'limit' => 5,
            'order' => [
                'UnidadeMedidas.id' => 'desc',

            ]
        ];

        $this->loadModel("UnidadeMedidas");

        $UnidadeMedidas = $this->paginate($this->UnidadeMedidas->find('all')->where(
            [
                'Or' =>
                [
                    'tamanho like' => '%' . $key . '%'
                ],
                'Or' =>
                [
                    'tamanho like' => '%' . $key . '%'
                ]
            ]
        ));

        $this->set(compact('UnidadeMedidas'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null){

        $this->loadModel("UnidadeMedidas");

        $UnidadeMedida = $this->UnidadeMedidas->get($id, [
            'contain' => [],
        ]);

        $this->set('UnidadeMedida', $UnidadeMedida);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    
    public function add(){

        $this->loadModel("UnidadeMedidas");
        
        $UnidadeMedida = $this->UnidadeMedidas->newEntity();
        if ($this->request->is('post')) {
            // $UnidadeMedida = $this->Users->patchEntity($UnidadeMedida, $this->request->getData());
            $UnidadeMedida->Tamanho =  $this->request->getData('Tamanho', 'Nulo');
            if ($this->UnidadeMedidas->save($UnidadeMedida)) {
                $this->Flash->success(__('O usuário foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O usuário não pode ser cadastrado. Por favor, tente novamente.'));
        }
        $this->set(compact('UnidadeMedida'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null){

        $this->loadModel("UnidadeMedidas");

        $UnidadeMedida = $this->UnidadeMedidas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $UnidadeMedida = $this->UnidadeMedidas->patchEntity($UnidadeMedida, $this->request->getData());
            if ($this->UnidadeMedidas->save($UnidadeMedida)) {
                $this->Flash->success(__('O usuário foi alterado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O usuário não pode ser alterado. Por favor, tente novamente.'));
        }
        $this->set(compact('UnidadeMedida'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null){

        $this->loadModel("UnidadeMedidas");
        
        $this->request->allowMethod(['post', 'delete']);
        $UnidadeMedida = $this->UnidadeMedidas->get($id);
        if ($this->UnidadeMedidas->delete($UnidadeMedida)) {
            $this->Flash->success(__('O usuário foi deletado.'));
        } else {
            $this->Flash->error(__('O usuário não pode ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}