<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Produto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Produtos'), ['action' => 'index']) ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar Produto'),
                ['action' => 'delete', $produto->id],
                ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $produto->id)]
            )
        ?></li>
    </ul>
</nav>
<div class="produto form large-10 medium-8 columns content">
    <?= $this->Form->create($produto) ?>
    <fieldset>
        <legend><?= __('Editar Produto') ?></legend>
        <?php
            echo $this->Form->control('username',["label"=>"Nome"]);
            echo $this->Form->control('Descrição');
            echo $this->Form->control('Saldo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>