<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Fornecedores Controller
 *
 * @property \App\Model\Table\ComprasTable $Compras
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ComprasController extends AppController
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
                'Compras.id' => 'desc',

            ]
        ];

        $compras= $this->paginate($this->Compras->find('all')->where(
            [
                'Or' =>
                [
                    'TotalDaCompra like' => '%' . $key . '%'
                ]
            ]
        ));

        $this->set(compact('compras'));
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
        $compra = $this->Compras->get($id, [
            'contain' => [],
        ]);

        $this->set('compra', $compra);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        
        $compra = $this->Compras->newEntity();
        if ($this->request->is('post')) {
            // $compra = $this->Fornecedor->patchEntity($compra, $this->request->getData());
            $compra->Data =  $this->request->getData('Data:', 'Nulo');
            $compra->TotalDaCompra =  $this->request->getData('Total Da Compra:', 'Nulo');
            $compra->NumeroDocumento =  $this->request->getData('Numero Documento:', 'Nulo');
            if ($this->Compras->save($compra)) {
                $this->Flash->success(__('O usuário foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O usuário não pode ser cadastrado. Por favor, tente novamente.'));
        }
        $this->set(compact('compra'));
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
        $compra = $this->Compras->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $compra = $this->Fornecedores->patchEntity($compra, $this->request->getData());
            if ($this->Fornecedores->save($compra)) {
                $this->Flash->success(__('O usuário foi alterado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O usuário não pode ser alterado. Por favor, tente novamente.'));
        }
        $this->set(compact('compra'));
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
        $compra = $this->Fornecedores->get($id);
        if ($this->Fornecedores->delete($compra)) {
            $this->Flash->success(__('O usuário foi deletado.'));
        } else {
            $this->Flash->error(__('O usuário não pode ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
