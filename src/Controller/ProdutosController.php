<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Produtos Controller
 *
 * @property \App\Model\Table\ProdutosTable $Produtos
 *
 * @method \App\Model\Entity\Produto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProdutosController extends AppController
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
                'Produtos.id' => 'desc',

            ]
        ];

        $produtos = $this->paginate($this->Produtos->find('all')->where(
            [
                'Or' =>
                [
                    'username like' => '%' . $key . '%'
                ]
            ]
        ));

        $this->set(compact('produtos'));
    }

    /**
     * View method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produto = $this->Produtos->get($id, [
            'contain' => [],
        ]);

        $this->set('produto', $produto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        
        $produto = $this->Produtos->newEntity();
        if ($this->request->is('post')) {
            // $produto = $this->Produto->patchEntity($produto, $this->request->getData());
            $produto->username =  $this->request->getData('Nome', 'Nulo');
            $produto->descrição =  $this->request->getData('Descrição', 'Nulo');
            $produto->saldo =  $this->request->getData('Saldo', 'Nulo');
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('O produto foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O produto não pode ser cadastrado. Por favor, tente novamente.'));
        }
        $this->set(compact('produto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produto = $this->Produtos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produto = $this->Produtos->patchEntity($produto, $this->request->getData());
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('O produto foi alterado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O produto não pode ser alterado. Por favor, tente novamente.'));
        }
        $this->set(compact('produto'));
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
        $produto = $this->Produtos->get($id);
        if ($this->Produtos->delete($produto)) {
            $this->Flash->success(__('O produto foi deletado.'));
        } else {
            $this->Flash->error(__('O produto não pode ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}