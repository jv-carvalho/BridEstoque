<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra $compra
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Produtos'), ['action' => 'index']) ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $compra->id],
                ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $compra->id)]
            )
            ?></li>
    </ul>
</nav>
<div class="produto form large-10 medium-8 columns content">
    <?= $this->Form->create($compra) ?>
    <fieldset>
        <legend><?= __('Adicionar Produto') ?></legend>
        <?php
        echo $this->Form->control('Data:');
        echo $this->Form->control('Total da Compra:');
        echo $this->Form->control('Numero Documento:');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>