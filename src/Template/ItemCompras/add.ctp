<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemCompra $ItemCompra
 */
?>
<div class="Item Compra form large-10 medium-8 columns content">
    <?= $this->Form->create($ItemCompra) ?>
    <fieldset>
        <legend><?= __('Adicionar Item Compra') ?></legend>
        <?php
        echo $this->Form->control('quantidade', ["label"=>"Quantidade:"]);
        echo $this->Form->control('preco', ["label"=>"Preço:"]);
        //echo $this->Form->control('TotalItem', ["label"=>"Total Itens:"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>