<?= $this->Flash->render() ?>
<?php $this->layout = 'AdminLTE.login'; ?>
<?= $this->Form->create('user') ?>
<div class="wrap-input100 validate-input">
  <?= $this->Form->input('username', ['label' => false, 'templates' => ['inputContainer' => '{{content}}'], 'class' => 'input100', 'required' => true]) ?>
  <span class="focus-input100"></span>
  <span class="label-input100">Usuário</span>
</div>

<div class="wrap-input100 validate-input">
  <?= $this->Form->input('password', ['label' => false, 'templates' => ['inputContainer' => '{{content}}'], 'class' => 'input100', 'type' => 'password', 'maxlength' => '20', 'required' => true]) ?>
  <span class="focus-input100"></span>
  <span class="label-input100">Senha</span>
</div>


<div class="container-login100-form-btn">
  <?= $this->Form->button(__('Entrar'), ['class' => 'login100-form-btn']); ?>
</div>
<?= $this->Form->end() ?>