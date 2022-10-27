<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra $compra
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Compra'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Editar Compra'), ['action' => 'edit', $compra->id]) ?> </li>
        <li><?= $this->Html->link(__('Listar Compras'), ['action' => 'index']) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Compra'), ['action' => 'delete', $compra->id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $compra->id)]) ?> </li>
    </ul>
</nav>
<div class="fornecedor view large-10 medium-8 columns content">
    <h3><?= h($compra->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($compra->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($compra->data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total da Compra') ?></th>
            <td><?= h($compra->TotalDaCompra) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Número Documento') ?></th>
            <td><?= h($compra->NumeroDocumento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($compra->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($compra->modified) ?></td>
        </tr>
    </table>
</div>