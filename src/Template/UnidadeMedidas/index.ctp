<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UnidadeMedida[]|\Cake\Collection\CollectionInterface $UnidadeMedidas
 */
?>
<div class="users index large-10 medium-12 columns content">
    <h2><?= __('Unidade de Medida') ?></h2>
    <br/>
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('key', ['label' => 'Buscar', 'value' => $this->request->getQuery('key')]) ?>
    <?= $this->Form->submit('Filtrar') ?>
    <?= $this->Form->end() ?>
    <table cellpadding="0" cellspacing="0" class="table">
        <br/>   
        <thead>
            <tr>
            <th class= "text-center" scope="col"><?= $this->Paginator->sort('Id') ?></th>
            <th class= "text-center" scope="col"><?= $this->Paginator->sort('Tamanho:') ?></th>
            <th class= "text-center" scope="col"><?= $this->Paginator->sort('Criado') ?></th>
            <th class= "text-center" scope="col"><?= $this->Paginator->sort('Modificado') ?></th>
            <th scope="col" class="actions text-center"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($UnidadeMedidas as $UnidadeMedida) : ?>
                <tr>
                    <td class= "text-center"><?= $this->Number->format($UnidadeMedida->id) ?></td>
                    <td class= "text-center"><?= h($UnidadeMedida->tamanho) ?></td>
                    <td class= "text-center"><?= h($UnidadeMedida->created) ?></td>
                    <td class= "text-center"><?= h($UnidadeMedida->modified) ?></td>
                    <td class="actions text-center">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $UnidadeMedida->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $UnidadeMedida->id]) ?>
                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $UnidadeMedida->id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $UnidadeMedida->id)]) ?>
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