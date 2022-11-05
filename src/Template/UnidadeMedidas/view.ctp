<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UnidadeMedida $UnidadeMedida
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Unidade de Medida'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Editar Unidade de Medida'), ['action' => 'edit', $UnidadeMedida->id]) ?> </li>
        <li><?= $this->Html->link(__('Listar Unidade de Medida'), ['action' => 'index']) ?> </li>
        <li><?= $this->Form->postLink(__('Deletar Unidade de Medida'), ['action' => 'delete', $UnidadeMedida->id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $UnidadeMedida->id)]) ?> </li>
    </ul>
</nav>
<div class="UnidadeMedida view large-10 medium-8 columns content">
    <h3><?= h($UnidadeMedida->id) ?></h3>
    <table class="vertical-table table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($UnidadeMedida->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tamanho') ?></th>
            <td><?= h($UnidadeMedida->tamanho) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($UnidadeMedida->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($UnidadeMedida->modified) ?></td>
        </tr>
    </table>
</div>