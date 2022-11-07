<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto $produto
 */
?>
<div class="card-body pad table-responsive">
  <button><?= $this->Html->link(__('Editar Produto'), ['action' => 'edit', $produto->id]) ?></button>
  <button><?= $this->Form->postlink(__('Deletar Produto'), ['action' => 'delete', $produto->id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $produto->id)]) ?></button>
</div>
<div class="produto view large-10 medium-8 columns content">
    <h3><?= h($produto->id) ?></h3>
    <table class="vertical-table table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($produto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($produto->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descrição') ?></th>
            <td><?= h($produto->descrição) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unidade Medida') ?></th>
            <td><?= h($produto['unidademedida'] ? $produto['unidademedida']['tamanho'] : '') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($produto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($produto->modified) ?></td>
        </tr>
    </table>
</div>