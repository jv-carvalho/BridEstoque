<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor $fornecedor
 */
?>
<div class="card-body pad table-responsive">
  <button><?= $this->Html->link(__('Editar Fornecedor'), ['action' => 'edit', $fornecedor->id]) ?></button>
  <button><?= $this->Form->postlink(__('Deletar Fornecedor'), ['action' => 'delete', $fornecedor->id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $fornecedor->id)]) ?></button>
</div>
<div class="fornecedor view large-10 medium-8 columns content">
    <h3><?= h($fornecedor->id) ?></h3>
    <table class="vertical-table table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fornecedor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($fornecedor->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($fornecedor->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone') ?></th>
            <td><?= h($fornecedor->telefone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($fornecedor->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($fornecedor->modified) ?></td>
        </tr>
    </table>
</div>