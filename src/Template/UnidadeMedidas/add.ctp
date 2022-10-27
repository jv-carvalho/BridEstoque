<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UnidadeMedida $UnidadeMedida
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Unidade de Medidas'), ['action' => 'index']) ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar Unidade de Medidas'),
                ['action' => 'delete', $UnidadeMedida->id],
                ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $UnidadeMedida->id)]
            )
            ?></li>
    </ul>
</nav>
<div class="UnidadeMedida form large-10 medium-8 columns content">
    <?= $this->Form->create($UnidadeMedida) ?>
    <fieldset>
        <legend><?= __('Adicionar Unidade de Medida') ?></legend>
        <?php
        echo $this->Form->control('tamanho', ['label' => 'Tamanho:']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>