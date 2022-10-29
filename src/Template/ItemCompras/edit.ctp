<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemCompra $ItemCompra
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Item Compra'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Item Compra'), ['action' => 'index']) ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar Item Compra'),
                ['action' => 'delete', $ItemCompra->id],
                ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $ItemCompra->id)]
            )
        ?></li>
    </ul>
</nav>
<div class="ItemCompra form large-10 medium-8 columns content">
    <?= $this->Form->create($ItemCompra) ?>
    <fieldset>
        <legend><?= __('Editar Item Compra') ?></legend>
        <?php
            echo $this->Form->control('quantidade', ["label"=>"Quantidade:"]);
            echo $this->Form->control('preco', ["label"=>"Preço:"]);
            //echo $this->Form->control('TotalItem', ["label"=>"Total Itens:"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>