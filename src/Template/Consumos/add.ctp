<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consumo $compra
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Consumo'), ['action' => 'index']) ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $consumo->Id],
                ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $consumo->Id)]
            )
            ?></li>
    </ul>
</nav>
<div class="produto form large-10 medium-8 columns content">
    <?= $this->Form->create($consumo) ?>
    <fieldset>
        <legend><?= __('Adicionar Consumo') ?></legend>
        <?php
        echo $this->Form->control('data', ['Id' => 'data', 'type' => 'date', 'class' => 'form-control date-field', 'label' => 'Data:', 'required' => true]);
        echo $this->Form->control('quantidade', ["label" => "Quantidade:"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>