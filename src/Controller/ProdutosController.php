<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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

        $produtos = $this->paginate($this->Produtos->find('all')->join([
            'table' => 'unidademedidas',
            'alias' => 'unidademedida',
            'type' => 'LEFT',
            'conditions' => 'unidademedida.id = unidademedida_id'
        ])->autoFields(true)->select(["unidademedida.tamanho"])->where(
            [
                'Or' =>
                [
                    'username like' => '%' . $key . '%'
                ],
                'Or' =>
                [
                    'descrição like' => '%' . $key . '%'
                ],
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

        $query = $this->Produtos->find('all')->join([
            'table' => 'unidademedidas',
            'alias' => 'unidademedida',
            'type' => 'LEFT',
            'conditions' => 'unidademedida.id = unidademedida_id'
        ])->autoFields(true)->select(["unidademedida.tamanho"])
        ->where(['produtos.id' => $id]);

        $produto = $query->toArray()[0];


        $this->set('produto', $produto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $unidadesmedida = TableRegistry::getTableLocator()->get('unidademedidas');
        $unidadesmedida = $unidadesmedida->find();

        $produto = $this->Produtos->newEntity();
        if ($this->request->is('post')) {
            $produto->username =  $this->request->getData('Nome', 'Nulo');
            $produto->descrição =  $this->request->getData('Descrição', 'Nulo');
            // $produto->saldo =  $this->request->getData('saldo', 'Nulo');
            $produto->unidademedida_id = (int)$this->request->getData('unidademedida_id');
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('O produto foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O produto não pode ser cadastrado. Por favor, tente novamente.'));
        }
        $this->set(compact('produto', 'unidadesmedida'));
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

        $unidadesmedida = TableRegistry::getTableLocator()->get('unidademedidas');
        $unidadesmedida = $unidadesmedida->find();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $dados =  $this->request->getData();
            $dados['unidademedida_id'] = (int)$this->request->getData('unidademedida_id');
            $produto = $this->Produtos->patchEntity($produto, $dados);
            $produto->unidademedida_id = (int)$this->request->getData('unidademedida_id');
            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('O produto foi alterado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O produto não pode ser alterado. Por favor, tente novamente.'));
        }
        $this->set(compact('produto', 'unidadesmedida'));
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
