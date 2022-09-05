<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor $fornecedor
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Fornecedores'), ['action' => 'index']) ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $fornecedor->id],
                ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $fornecedor->id)]
            )
            ?></li>
    </ul>
</nav>
<div class="fornecedor form large-10 medium-8 columns content">
    <?= $this->Form->create($fornecedor) ?>
    <fieldset>
        <legend><?= __('Adicionar Fornecedor') ?></legend>
        <?php
        echo $this->Form->control('Nome');
        echo $this->Form->control('Email');
        echo $this->Form->control('Telefone');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>