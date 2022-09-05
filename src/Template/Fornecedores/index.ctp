<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor[]|\Cake\Collection\CollectionInterface $fornecedores
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading" style="color: #518d06;"><?= __('Ações') ?></li>
        <li style="color: #518d06;"><?= $this->Html->link(__('Adicionar Usuário'), ['action' => 'add'], array('style' => 'color: #518d06;')) ?></li>
    </ul>
</nav>
<div class="fornecedor index large-10 medium-12 columns content">
    <h3><?= __('Fornecedores') ?></h3>
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('key', ['label' => 'Buscar', 'value' => $this->request->getQuery('key')]) ?>
    <?= $this->Form->submit('Filtrar') ?>
    <?= $this->Form->end() ?>
    <table cellpadding="0" cellspacing="0">
        <br/>   
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Telefone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Criado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Modificado') ?></th>
                <th scope="col" style="color: #518d06;" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fornecedores as $fornecedor) : ?>
                <tr>
                    <td><?= $this->Number->format($fornecedor->id) ?></td>
                    <td><?= h($fornecedor->username) ?></td>
                    <td><?= h($fornecedor->email) ?></td>
                    <td><?= h($fornecedor->telefone) ?></td>
                    <td><?= h($fornecedor->created) ?></td>
                    <td><?= h($fornecedor->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $fornecedor->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $fornecedor->id]) ?>
                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $fornecedor->id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $fornecedor->id)]) ?>
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