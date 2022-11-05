<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consumo[]|\Cake\Collection\CollectionInterface $compras
 */
?>
<div class="fornecedor index large-10 medium-12 columns content">
    <h3><?= __('Consumo') ?></h3>
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('key', ['label' => 'Buscar', 'value' => $this->request->getQuery('key')]) ?>
    <?= $this->Form->submit('Filtrar') ?>
    <?= $this->Form->end() ?>
    <table cellpadding="0" cellspacing="0" class="table">
        <br/>   
        <thead>
            <tr>
            <th class= "text-center" scope="col"><?= $this->Paginator->sort('Id') ?></th>
            <th class= "text-center" scope="col"><?= $this->Paginator->sort('data', ['label' => 'Data:']) ?></th>
            <th class= "text-center" scope="col"><?= $this->Paginator->sort('quantidade', ['label' => 'Quantidade:']) ?></th>
            <th class= "text-center" scope="col" class="actions"><?= __('Produto') ?></th>
            <th class= "text-center" scope="col" class="actions"><?= __('Unidade Medida') ?></th>
              <th class= "text-center" scope="col"><?= $this->Paginator->sort('Criado') ?></th>
              <th class= "text-center" scope="col"><?= $this->Paginator->sort('Modificado') ?></th> 
            <th class= "text-center" scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consumos as $consumo) : ?>
                <tr>
                    <td class= "text-center"><?= $this->Number->format($consumo->Id) ?></td>
                    <td class= "text-center"><?= $consumo->data->format("d/m/Y") ?></td>
                    <td class= "text-center"><?= ($consumo->quantidade) ?></td>
                    <td class= "text-center"><?= $consumo['produto'] ? $consumo['produto']['descrição'] : '' ?></td>
                    <td class= "text-center"><?= $consumo['unidademedida'] ? $consumo['unidademedida']['tamanho'] : '' ?></td>
                    <td class= "text-center"><?= h($consumo->created) ?></td>
                    <td class= "text-center"><?= h($consumo->modified) ?></td>
                    <td class="actions text-center">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $consumo->Id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $consumo->Id]) ?>
                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $consumo->Id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $consumo->Id)]) ?>
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