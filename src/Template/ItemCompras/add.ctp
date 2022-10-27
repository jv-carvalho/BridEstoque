<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemCompra $ItemCompra
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Item Compra'), ['action' => 'index']) ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $ItemCompra->id],
                ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $ItemCompra->id)]
            )
            ?></li>
    </ul>
</nav>
<div class="Item Compra form large-10 medium-8 columns content">
    <?= $this->Form->create($ItemCompra) ?>
    <fieldset>
        <legend><?= __('Adicionar Item Compra') ?></legend>
        <?php
        echo $this->Form->control('quantidade', ["label"=>"Quantidade:"]);
        echo $this->Form->control('preco', ["label"=>"Preço:"]);
        echo $this->Form->control('TotalItem', ["label"=>"Total Itens:"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>