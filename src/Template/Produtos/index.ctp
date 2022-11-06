<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="users index large-10 medium-12 columns content">
    <h3><?= __('Produtos') ?></h3>
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('key', ['label' => 'Buscar', 'value' => $this->request->getQuery('key')]) ?>
    <?= $this->Form->submit('Filtrar') ?>
    <?= $this->Form->end() ?>
    <table cellpadding="0" cellspacing="0" class="table">
        <br/>   
        <thead>
            <tr>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Id') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Nome') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Descrição') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Saldo') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Unidade Medida') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Criado') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Modificado') ?></th>
                <th class= "text-center" scope="col" class="actions">Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($produtos as $produto) : ?>
                <tr>
                    <td class= "text-center"><?= $this->Number->format($produto->id) ?></td>
                    <td class= "text-center"><?= h($produto->username) ?></td>
                    <td class= "text-center"><?= h($produto->descrição) ?></td>
                    <td class= "text-center"><?= h($produto->saldo) ?></td>
                    <td class= "text-center"><?= $produto['unidademedida'] ? $produto['unidademedida']['tamanho'] : '' ?></td>
                    <td class= "text-center"><?= h($produto->created) ?></td>
                    <td class= "text-center"><?= h($produto->modified) ?></td>
                    <td class="actions text-center">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $produto->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $produto->id]) ?>
                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $produto->id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $produto->id)]) ?>
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