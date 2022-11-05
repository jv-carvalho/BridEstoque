<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor $fornecedor
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Fornecedor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Editar Fornecedor'), ['action' => 'edit', $fornecedor->id]) ?> </li>
        <li><?= $this->Html->link(__('Listar Fornecedores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Fornecedor'), ['action' => 'delete', $fornecedor->id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $fornecedor->id)]) ?> </li>
    </ul>
</nav>
<div class="fornecedor view large-10 medium-8 columns content">
    <h3><?= h($fornecedor->id) ?></h3>
    <table class="vertical-table table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fornecedor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($fornecedor->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($fornecedor->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($fornecedor->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($fornecedor->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($fornecedor->modified) ?></td>
        </tr>
    </table>
</div>