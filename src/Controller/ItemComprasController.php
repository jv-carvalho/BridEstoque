<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * ItemCompras Controller
 *
 * @property \App\Model\Table\ItemComprasTable $ItemCompras
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemComprasController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }
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
                'ItemCompras.Id' => 'desc',

            ]
        ];

        $this->loadModel("ItemCompras");

        $ItemCompras = $this->paginate(
            $this->ItemCompras->find('all')
        );

        $this->set(compact('ItemCompras'));
    }

    /**
     * View method
     *
     * @param string|null $id ItemCompra id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $this->loadModel("ItemCompras");

        $ItemCompra = $this->ItemCompras->get($id, [
            'contain' => [],
        ]);

        $this->set('ItemCompra', $ItemCompra);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->loadModel("ItemCompras");

        $ItemCompra = $this->ItemCompras->newEntity();
        if ($this->request->is('post')) {
            $ItemCompra = $this->ItemCompras->patchEntity($ItemCompra, $this->request->getData());
            $ItemCompra->quantidade = $this->request->getData('quantidade', 0);
            $ItemCompra->preco = $this->request->getData('preco', 0);
            $ItemCompra->TotalItem = $ItemCompra->quantidade * $ItemCompra->preco;

            if ($this->ItemCompras->save($ItemCompra)) {
                $this->Flash->success(__('O Item Compra foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Item Compra não pode ser cadastrado. Por favor, tente novamente.'));
        }
        $this->set(compact('ItemCompra'));
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

        $this->loadModel("ItemCompras");
        $ItemCompra = $this->ItemCompras->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dados =  $this->request->getData();
            $dados['TotalItem'] = $dados['quantidade'] * $dados['preco'];

            $ItemCompra = $this->ItemCompras->patchEntity($ItemCompra, $dados);
            if ($this->ItemCompras->save($ItemCompra)) {
                $this->Flash->success(__('O Item Compra foi alterado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Item Compra não pode ser alterado. Por favor, tente novamente.'));
        }
        $this->set(compact('ItemCompra'));
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

        $this->loadModel("ItemCompras");

        $this->request->allowMethod(['post', 'delete']);
        $ItemCompra = $this->ItemCompras->get($id);
        if ($this->ItemCompras->delete($ItemCompra)) {
            $this->Flash->success(__('O Item Compra foi deletado.'));
        } else {
            $this->Flash->error(__('O Item Compra não pode ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
