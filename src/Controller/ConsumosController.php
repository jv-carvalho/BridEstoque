<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Consumo;
use Cake\ORM\TableRegistry;

/**
 * Compras Controller
 *
 * @property \App\Model\Table\ConsumosTable $Compras
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConsumosController extends AppController
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
                'Consumos.Id' => 'desc',

            ]
        ];

        $query = $this->Consumos->find('all')->join([
            'table' => 'produtos',
            'alias' => 'produto',
            'type' => 'LEFT',
            'conditions' => 'produto.id = produto_id'
        ])->autoFields(true)->select(["produto.descrição"])->join([
            'table' => 'unidademedidas',
            'alias' => 'unidademedida',
            'type' => 'LEFT',
            'conditions' => 'unidademedida.id = produto.unidademedida_id'
        ])->autoFields(true)->select(["unidademedida.tamanho"]);

        $array = $query->toArray();
        foreach ($array as $row) {
            $row["data"] = $row["data"]->format("d/m/Y");
        }
        $consumos = $this->paginate($query);
        $this->set(compact('consumos'));
    }

    /**
     * View method
     *
     * @param string|null $id Compra id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $query = $this->Consumos->find('all')->join([
            'table' => 'produtos',
            'alias' => 'produto',
            'type' => 'LEFT',
            'conditions' => 'produto.id = produto_id'
        ])->autoFields(true)->select(["produto.descrição"])->join([
            'table' => 'unidademedidas',
            'alias' => 'unidademedida',
            'type' => 'LEFT',
            'conditions' => 'unidademedida.id = produto.unidademedida_id'
        ])->autoFields(true)->select(["unidademedida.tamanho"])
            ->where(['consumos.id' => $id]);

        $consumo = $query->toArray()[0];

        $this->set('consumo', $consumo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $consumo = $this->Consumos->newEntity();

        $produtos = TableRegistry::getTableLocator()->get('produtos');
        $produtos = $produtos->find();

        if ($this->request->is('post')) {
            $consumo = $this->Consumos->patchEntity($consumo, $this->request->getData());
            $consumo->quantidade =  $this->request->getData('quantidade', 0);
            $data = $this->request->getData('data', 'Nulo');
            $consumo->data =  $data['year'] . "-" . $data['month'] . "-" . $data['day'];
            $consumo->produto_id = (int)$this->request->getData('produto_id');
            $consumo->tipo_entrada = (int)$this->request->getData('tipo_entrada');

            // $produtosTable = TableRegistry::getTableLocator()->get('produtos');
            // $produto = $produtosTable->get($consumo->produto_id);
            // if ($consumo->tipo_entrada == 0) {
            //     $produto->saldo = $produto->saldo - (float)$consumo->quantidade;
            //     $produtosTable->save($produto);
            // } else if ($consumo->tipo_entrada == 1) {
            //     $produto->saldo = $produto->saldo + (float)$consumo->quantidade;
            //     $produtosTable->save($produto);
            // }

            if ($this->Consumos->save($consumo)) {
                $this->Flash->success(__('O consumo foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O consumo não pode ser cadastrado. Por favor, tente novamente.'));
        }
        $this->set(compact('consumo', 'produtos'));
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
        $consumo = $this->Consumos->get($id, [
            'contain' => [],
        ]);

        $produtos = TableRegistry::getTableLocator()->get('produtos');
        $produtos = $produtos->find();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $consumo = $this->Consumos->patchEntity($consumo, $this->request->getData());
            $consumo->produto_id = (int)$this->request->getData('produto_id');
            $consumo->tipo_entrada = (int)$this->request->getData('tipo_entrada');
            if ($this->Consumos->save($consumo)) {
                $this->Flash->success(__('O usuário foi alterado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O consumo não pode ser alterada. Por favor, tente novamente.'));
        }
        $this->set(compact('consumo', 'produtos'));
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
        $consumo = $this->Consumos->get($id);
        if ($this->Consumos->delete($consumo)) {
            $this->Flash->success(__('O consumo foi deletada.'));
        } else {
            $this->Flash->error(__('O consumo não pode ser deletada. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function relacaoconsumo()
    {
        $produto_id = $this->request->getQuery('produto_id');

        $consumos = [];
        if ($produto_id) {
            $query = $this->Consumos->find('all')->join([
                'table' => 'produtos',
                'alias' => 'produto',
                'type' => 'LEFT',
                'conditions' => 'produto.id = produto_id'
            ])->autoFields(true)->select(["produto.descrição"])->join([
                'table' => 'unidademedidas',
                'alias' => 'unidademedida',
                'type' => 'LEFT',
                'conditions' => 'unidademedida.id = produto.unidademedida_id'
            ])->autoFields(true)->select(["unidademedida.tamanho"])->where(
                [
                    'produto_id' => $produto_id
                ]
            );

            $consumos = $query->toArray();
        }

        $produtos = TableRegistry::getTableLocator()->get('produtos');
        $produtos = $produtos->find();

        $saldo_final = 0;
        foreach ($consumos as $consumo) {
            if ($consumo->tipo_entrada == 1) {
                $saldo_final += $consumo->quantidade;
            }

            if ($consumo->tipo_entrada == 0) {
                $saldo_final -= $consumo->quantidade;
            }
        }

        $this->set(compact('produtos', 'consumos', 'saldo_final'));
    }
}
