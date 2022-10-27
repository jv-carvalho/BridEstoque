<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor $fornecedor
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Fornecedor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Fornecedores'), ['action' => 'index']) ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar Fornecedor'),
                ['action' => 'delete', $fornecedor->id],
                ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $fornecedor->id)]
            )
        ?></li>
    </ul>
</nav>
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