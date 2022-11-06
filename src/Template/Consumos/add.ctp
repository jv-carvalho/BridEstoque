<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consumo $compra
 */
?>
<div class="produto form large-10 medium-8 columns content">
    <?= $this->Form->create($consumo) ?>
    <fieldset>
        <legend><?= __('Adicionar Consumo') ?></legend>
        <?php
        echo $this->Form->control('data', ['Id' => 'data', 'type' => 'date', 'class' => 'form-control date-field', 'label' => 'Data:', 'required' => true]);
        echo $this->Form->control('quantidade', ["label" => "Quantidade:"]);
        ?>


        <?php
        $produtos_list = array();
        foreach ($produtos as $value) {
            $produtos_list[$value->id] = $value->descrição;
        }
        echo $this->Form->control('produto_id', ['id' => 'produto', 'label' => 'Produto:', 'options' => $produtos_list, 'empty' => true]);
        ?>

    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>