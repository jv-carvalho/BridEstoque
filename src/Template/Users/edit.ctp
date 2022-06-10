<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Adicionar Usuário'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Usuários'), ['action' => 'index']) ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar Usuário'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $user->id)]
            )
        ?></li>
    </ul>
</nav>
<div class="users form large-10 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Editar Usuário') ?></legend>
        <?php
            echo $this->Form->control('username',["label"=>"Nome"]);
            echo $this->Form->control('Setor');
            echo $this->Form->control('role', ["label"=>"Cargo"]);
            echo $this->Form->control('password',["label"=>"Senha"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
