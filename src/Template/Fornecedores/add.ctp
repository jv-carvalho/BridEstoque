<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor $fornecedor
 */
?>
<div class="fornecedor form large-10 medium-8 columns content">
    <?= $this->Form->create($fornecedor) ?>
    <fieldset>
        <legend><?= __('Adicionar Fornecedor') ?></legend>
        <?php
        echo $this->Form->control('Nome');
        echo $this->Form->control('email',["label"=>"Email"]);
        echo $this->Form->control('telefone',["label"=>"Telefone", "id" => "cellphone", "data-slots" => "_", "placeholder" => "(__) _____-____", "required" => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>

