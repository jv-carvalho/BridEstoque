<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
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
        $query = $this->Users->find('search', ['search' => $this->request->query]);
        $users = $this->paginate($query, array('limit'=>20));
        $this->set('isSearch', $this->Users->isSearch());
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            // $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->username =  $this->request->getData('Nome', 'Nulo');
            $user->Setor =  $this->request->getData('Setor', 'Nulo');
            $user->role =  $this->request->getData('Cargo', 'Nulo');
            $user->password =  $this->request->getData('password', 'Nulo');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O usuário foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O usuário não pode ser cadastrado. Por favor, tente novamente.'));
        }
        $this->set(compact('user'));
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
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O usuário foi alterado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O usuário não pode ser alterado. Por favor, tente novamente.'));
        }
        $this->set(compact('user'));
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
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('O usuário foi deletado.'));
        } else {
            $this->Flash->error(__('O usuário não pode ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}