<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UnidadeMedida $UnidadeMedida
 */
?>
<div class="UnidadeMedida form large-10 medium-8 columns content">
    <?= $this->Form->create($UnidadeMedida) ?>
    <fieldset>
        <legend><?= __('Editar Unidade de Medida') ?></legend>
        <?php
            echo $this->Form->control('tamanho', ["label"=>"Tamanho"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>