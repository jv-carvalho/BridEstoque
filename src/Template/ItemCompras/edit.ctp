<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemCompra $ItemCompra
 */
?>
<div class="ItemCompra form large-10 medium-8 columns content">
    <?= $this->Form->create($ItemCompra) ?>
    <fieldset>
        <legend><?= __('Editar Item Compra') ?></legend>
        <?php
        echo $this->Form->control('quantidade', ["label" => "Quantidade:"]);
        echo $this->Form->control('preco', ["label" => "Preço:"]);
        //echo $this->Form->control('TotalItem', ["label"=>"Total Itens:"]);

        $produtos_list = [];
        foreach ($produtos as $value) {
            $produtos_list[$value->id] = "$value->descrição";
        }

        echo $this->Form->control('produto_id', ['id' => 'produto_id', 'label' => 'Produto:', 'options' => $produtos_list, 'empty' => false]);

        $compras_list = [];
        foreach ($compras as $value) {
            $compras_list[$value->id] = "$value->id - $value->data";
        }

        echo $this->Form->control('compra_id', ['id' => 'compra_id', 'label' => 'Compra:', 'options' => $compras_list, 'empty' => false]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>