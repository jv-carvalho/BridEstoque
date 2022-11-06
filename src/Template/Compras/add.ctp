<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra $compra
 */
?>
<div class="produto form large-10 medium-8 columns content">
    <?= $this->Form->create($compra) ?>
    <fieldset>
        <legend><?= __('Adicionar Compra') ?></legend>
        <?php
        echo $this->Form->control('data', ['id' => 'data', 'type' => 'date', 'class' => 'form-control date-field', 'label' => 'Data:', 'required' => true]);
        echo $this->Form->control('TotalDaCompra', ["label" => "Total da Compra:"]);
        echo $this->Form->control('NumeroDocumento',["label"=>"Numero Documento:", "data-slots" => "_", "placeholder" => "___.___.___-__", "required" => true, ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>