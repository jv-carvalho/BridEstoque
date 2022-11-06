<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor $fornecedor
 */
?>
<div class="users form large-10 medium-8 columns content">
    <?= $this->Form->create($fornecedor) ?>
    <fieldset>
        <legend><?= __('Editar Fornecedor') ?></legend>
        <?php
            echo $this->Form->control('username',["label"=>"Nome"]);
            echo $this->Form->control('email');
            echo $this->Form->control('telefone',["label"=>"Telefone", "id" => "cellphone", "data-slots" => "_", "placeholder" => "(__) _____-____", "required" => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>