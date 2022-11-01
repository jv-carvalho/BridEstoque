<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consumo $compra
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Consumo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Editar Consumo'), ['action' => 'edit', $consumo->Id]) ?> </li>
        <li><?= $this->Html->link(__('Listar Consumo'), ['action' => 'index']) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Consumo'), ['action' => 'delete', $consumo->Id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $consumo->Id)]) ?> </li>
    </ul>
</nav>
<div class="fornecedor view large-10 medium-8 columns content">
    <h3><?= h($consumo->Id) ?></h3>
    <table class="vertical-table">
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
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($consumo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($consumo->modified) ?></td>
        </tr>
    </table>
</div>