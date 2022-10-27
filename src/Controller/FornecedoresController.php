<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Fornecedores Controller
 *
 * @property \App\Model\Table\FornecedoresTable $Fornecedores
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FornecedoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $key = $this->request->getQuery('key');

        $this->paginate = [
            'limit' => 5,
            'order' => [
                'Fornecedores.id' => 'desc',

            ]
        ];

        $fornecedores = $this->paginate($this->Fornecedores->find('all')->where(
            [
                'Or' =>
                [
                    'username like' => '%' . $key . '%'
                ],
                'Or' =>
                [
                    'email like' => '%' . $key . '%'
                ],
                'Or' =>
                [
                    'telefone like' => '%' . $key . '%'
                ],
            ]
        ));
        
        $this->set(compact('fornecedores'));
    }

    /**
     * View method
     *
     * @param string|null $id Fornecedor id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fornecedor = $this->Fornecedores->get($id, [
            'contain' => [],
        ]);

        $this->set('fornecedor', $fornecedor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        
        $fornecedor = $this->Fornecedores->newEntity();
        if ($this->request->is('post')) {
            
            $nome = $this->request->getData('Nome', 'Nulo');
            $email = $this->request->getData('email', 'Nulo');
            $telefone = preg_replace('/[^0-9]/', '',$this->request->getData('telefone', 'Nulo'));

            $fornecedor->username = $nome;
            $fornecedor->email =  $email;
            $fornecedor->telefone =  (string)$telefone;
            if ($this->Fornecedores->save($fornecedor)) {
                $this->Flash->success(__('O fornecedor foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O fornecedor não pode ser cadastrado. Por favor, tente novamente.'));
        }
        $this->set(compact('fornecedor'));
    }
    public function prd($var)
    {
        pr($var);
        die;
    }
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fornecedor = $this->Fornecedores->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fornecedor = $this->Fornecedores->patchEntity($fornecedor, $this->request->getData());
            if ($this->Fornecedores->save($fornecedor)) {
                $this->Flash->success(__('O fornecedor foi alterado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O fornecedor não pode ser alterado. Por favor, tente novamente.'));
        }
        $this->set(compact('fornecedor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fornecedor = $this->Fornecedores->get($id);
        if ($this->Fornecedores->delete($fornecedor)) {
            $this->Flash->success(__('O fornecedor foi deletado.'));
        } else {
            $this->Flash->error(__('O fornecedor não pode ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
