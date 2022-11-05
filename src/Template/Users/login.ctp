<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <!-- <li class="heading"><?= __('Ações') ?></li> -->
        <!-- <li><?= $this->Html->link(__('Cadastre-se'), ['controller' => 'Users', 'action' => 'add']) ?></li> -->
    </ul>
</nav>
<div class="users form large-10 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Login') ?></legend>
        <?php
        echo $this->Form->input('username', ['label' => 'Nome:']);
        ?>
        <div class="col-12 col-sm-6">
          <?php
            echo $this->Form->control('password', ['autocomplete' => 'off', 'label' => 'Senha:']);
          ?>
          <div class="users form">
            <input type="checkbox" id="exibesenha" onclick="myFunction()"> <label for="exibesenha">Exibir Senha</label>
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


    <?= $this->Form->button(__('Login')) ?>
    <?= $this->Form->end() ?>
</div>