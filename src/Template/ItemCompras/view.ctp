<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemCompra $ItemCompra
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Item Compra'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Editar Item Compra'), ['action' => 'edit', $ItemCompra->Id]) ?> </li>
        <li><?= $this->Html->link(__('Listar Item Compra'), ['action' => 'index']) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Item Compra'), ['action' => 'delete', $ItemCompra->Id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $ItemCompra->Id)]) ?> </li>
    </ul>
</nav>
<div class="ItemCompra view large-10 medium-8 columns content">
    <h3><?= h($ItemCompra->Id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ItemCompra->Id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantidade') ?></th>
            <td><?= h($ItemCompra->quantidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Preço') ?></th>
            <td><?= h($ItemCompra->preco) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Itens') ?></th>
            <td><?= h($ItemCompra->TotalItem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($ItemCompra->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($ItemCompra->modified) ?></td>
        </tr>
    </table>
</div>