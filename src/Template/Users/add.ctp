<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-10 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend style="background-color:None!important"><?= __('Adicionar Usuário') ?></legend>
        <?php
        echo $this->Form->control('Nome');
        echo $this->Form->control('Setor');
        echo $this->Form->control('Cargo');
        ?>
        <div class="col-12">
          <?php
            echo $this->Form->control('password', ['autocomplete' => 'off', 'label' => 'Senha:']);
          ?>
          <div class="users form">
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