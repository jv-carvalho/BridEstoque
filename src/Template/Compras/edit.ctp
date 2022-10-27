<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra $compra
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Produto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Produtos'), ['action' => 'index']) ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar Produto'),
                ['action' => 'delete', $compra->id],
                ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $compra->id)]
            )
        ?></li>
    </ul>
</nav>
<div class="produto form large-10 medium-8 columns content">
    <?= $this->Form->create($compra) ?>
    <fieldset>
        <legend><?= __('Editar Compra') ?></legend>
        <?php
            echo $this->Form->control('data', ['id' => 'data', 'type' => 'date', 'class' => 'form-control date-field', 'label' => 'Data:', 'required' => true]);
            echo $this->Form->control('TotalDaCompra', ["label" => "Total da Compra:"]);
            echo $this->Form->control('NumeroDocumento',["label"=>"Numero Documento:", "data-slots" => "_", "placeholder" => "___.___.___-__", "required" => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>