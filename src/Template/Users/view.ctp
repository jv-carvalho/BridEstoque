<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Usuário'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Editar Usuário'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Html->link(__('Listar Usuários'), ['action' => 'index']) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Usuário'), ['action' => 'delete', $user->id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $user->id)]) ?> </li>
    </ul>
</nav>
<div class="users view large-10 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Senha') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Setor') ?></th>
            <td><?= h($user->Setor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cargo') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
</div>
