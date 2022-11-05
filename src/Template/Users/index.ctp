<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="users index content">
    <h3><?= __('Usuários') ?></h3>
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('key', ['label' => 'Buscar', 'value' => $this->request->getQuery('key')]) ?>
    <?= $this->Form->submit('Filtrar') ?>
    <?= $this->Form->end() ?>
    <table cellpadding="0" cellspacing="0" class="table">
        <br/>   
        <thead>
            <tr>
                <!-- <th class= "text-center" scope="col"><?= $this->Paginator->sort('Id') ?></th>-->
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Nome') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Setor') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Cargo') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Criado') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Modificado') ?></th>
                <th class= "text-center" scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <!--<td class= "text-center"><?= $this->Number->format($user->id) ?></td>-->
                    <td class= "text-center"><?= h($user->username) ?></td>
                    <td class= "text-center"><?= h($user->Setor) ?></td>
                    <td class= "text-center"><?= h($user->role) ?></td>
                    <td class= "text-center"><?= h($user->created) ?></td>
                    <td class= "text-center"><?= h($user->modified) ?></td>
                    <td class="actions text-center">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $user->id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $user->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrado {{current}} registro(s) do total de {{count}}.')]) ?></p>
    </div>
</div>