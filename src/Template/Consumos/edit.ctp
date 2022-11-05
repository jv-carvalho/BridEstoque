<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consumo $compra
 */
?>
<div class="produto form large-10 medium-8 columns content">
    <?= $this->Form->create($consumo) ?>
    <fieldset>
        <legend><?= __('Editar Consumo') ?></legend>
        <?php
        echo $this->Form->control('data', ['Id' => 'data', 'type' => 'date', 'label' => 'Data:', 'required' => true]);
        echo $this->Form->control('quantidade', ["label" => "Quantidade:"]);
        ?>

        <?php
        $produtos_list = array();
        foreach ($produtos as $value) {
            $produtos_list[$value->id] = $value->descrição;
        }
        echo $this->Form->control('produto_id', ['id' => 'produto', 'label' => 'Produto:', 'options' => $produtos_list, 'empty' => true]);

        $unidadesmedida_list = [];
        foreach ($unidadesmedida as $value) {
            $unidadesmedida_list[$value->id] = $value->tamanho;
        }

        echo $this->Form->control('unidademedida_id', ['id' => 'unidademedida', 'label' => 'Unidade Medida:', 'options' => $unidadesmedida_list, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>