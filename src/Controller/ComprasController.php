<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Compra;

/**
 * Compras Controller
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

        $query = $this->Compras->find('all')->where(
            [
                [
                    'NumeroDocumento like' => '%' . $key . '%' 
                ]
            ]
        );
            
        $array = $query->toArray();
        foreach ($array as $row) {
            $row["data"] = $row["data"]->format("d/m/Y");
        }
        $compras = $this->paginate($query);
        $this->set(compact('compras'));
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
    public function add()
    {
        $compra = $this->Compras->newEntity();
        if ($this->request->is('post')) {
            $compra = $this->Compras->patchEntity($compra, $this->request->getData());
            $data = $this->request->getData('data', 'Nulo');
            $compra->data =  $data['year'] . "-" . $data['month'] . "-" . $data['day'];
            $compra->TotalDaCompra =  $this->request->getData('TotalDaCompra', 'Nulo');
            $compra->NumeroDocumento = preg_replace('/[^0-9]/', '',$this->request->getData('NumeroDocumento', 'Nulo'));
            if ($this->Compras->save($compra)) {
                $this->Flash->success(__('A compra foi salva.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A compra não pode ser cadastrado. Por favor, tente novamente.'));
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
            $compra = $this->Compras->patchEntity($compra, $this->request->getData());
            if ($this->Compras->save($compra)) {
                $this->Flash->success(__('O usuário foi alterado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A compra não pode ser alterada. Por favor, tente novamente.'));
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
        $compra = $this->Compras->get($id);
        if ($this->Compras->delete($compra)) {
            $this->Flash->success(__('A compra foi deletada.'));
        } else {
            $this->Flash->error(__('A compra não pode ser deletada. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
