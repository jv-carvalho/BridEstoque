<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Usuários'), ['action' => 'index']) ?></li>
        <li><?= $this->Form->postLink(
                __('Deletar'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $user->id)]
            )
            ?></li>
    </ul>
</nav>
<div class="users form large-10 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend style="background-color:None!important"><?= __('Adicionar Usuário') ?></legend>
        <?php
        echo $this->Form->control('Nome');
        echo $this->Form->control('Setor');
        echo $this->Form->control('Cargo');
        ?>
        <div class="col-12 col-sm-6">
          <?php
            echo $this->Form->control('password', ['autocomplete' => 'off', 'label' => 'Senha:']);
          ?>
          <div class="users form large-10 medium-8 columns content">
            <input type="checkbox" onclick="myFunction()"> Exibir Senha
          </div>
          <script>
            function myFunction() {
                var x = document.getElementById("password");
                    if (x.type === "password") {
                     x.type = "text";
                    } else {
                      x.type = "password";
                    }
                }
            </script>
        </div>
    </fieldset>


    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>