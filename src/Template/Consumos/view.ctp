<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consumo $compra
 */
?>
<div class="card-body pad table-responsive">
    <button><?= $this->Html->link(__('Editar Consumo'), ['action' => 'edit', $consumo->Id]) ?></button>
    <button><?= $this->Form->postlink(__('Deletar Consumo'), ['action' => 'delete', $consumo->Id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $consumo->Id)]) ?></button>
</div>
<div class="fornecedor view large-10 medium-8 columns content ">
    <h3>Consumo <?= h($consumo->Id) ?></h3>
    <table class="vertical-table table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($consumo->Id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= $consumo->data->format("d/m/Y") ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantidade') ?></th>
            <td><?= h($consumo->quantidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Produto') ?></th>
            <td><?= h($consumo['produto'] ? $consumo['produto']['descrição'] : '') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unidade Medida') ?></th>
            <td><?= h($consumo['unidademedida'] ? $consumo['unidademedida']['tamanho'] : '') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($consumo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($consumo->modified) ?></td>
        </tr>
    </table>
</div>