<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemCompra $ItemCompra
 */
?>
<div class="card-body pad table-responsive">
  <button><?= $this->Html->link(__('Editar Item Compra'), ['action' => 'edit', $ItemCompra->Id]) ?></button>
  <button><?= $this->Form->postlink(__('Deletar Item Compra'), ['action' => 'delete', $ItemCompra->Id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $ItemCompra->Id)]) ?></button>
</div>
<div class="ItemCompra view large-10 medium-8 columns content">
    <h3><?= h($ItemCompra->Id) ?></h3>
    <table class="vertical-table table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ItemCompra->Id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantidade') ?></th>
            <td><?= h($ItemCompra->quantidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Preço') ?></th>
            <td><?= h($ItemCompra->preco) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Itens') ?></th>
            <td><?= h($ItemCompra->TotalItem) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($ItemCompra->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($ItemCompra->modified) ?></td>
        </tr>
    </table>
</div>