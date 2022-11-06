<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<div class="produto form large-10 medium-8 columns content">
    <?= $this->Form->create($produto) ?>
    <fieldset>
        <legend><?= __('Editar Produto') ?></legend>
        <?php
        echo $this->Form->control('username', ["label" => "Nome"]);
        echo $this->Form->control('descrição', ["label" => "Descrição"]);
        echo $this->Form->control('saldo', ["label" => "Saldo"]);


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