<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-10 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Editar Usuário') ?></legend>
        <?php
            echo $this->Form->control('username',["label"=>"Nome"]);
            echo $this->Form->control('Setor');
            echo $this->Form->control('role', ["label"=>"Cargo"]);
        ?>
        <div class="col-12">
          <?php
            echo $this->Form->control('password', ['autocomplete' => 'off', 'label' => 'Senha:']);
          ?>
          <div class="users">
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
    </fieldset>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
</div>
