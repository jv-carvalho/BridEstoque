<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UnidadeMedida $UnidadeMedida
 */
?>
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