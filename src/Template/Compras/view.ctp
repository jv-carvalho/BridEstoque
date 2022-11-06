<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra $compra
 */
?>
<div class="card-body pad table-responsive">
  <button><?= $this->Html->link(__('Editar Compra'), ['action' => 'edit', $compra->id]) ?></button>
  <button><?= $this->Form->postlink(__('Deletar Compra'), ['action' => 'delete', $compra->id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $compra->id)]) ?></button>
</div>
<div class="fornecedor view large-10 medium-8 columns content">
    <h3><?= h($compra->id) ?></h3>
    <table class="vertical-table table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($compra->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= $compra->data->format("d/m/Y") ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total da Compra') ?></th>
            <td><?= h($compra->TotalDaCompra) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Número Documento') ?></th>
            <td><?= h($compra->NumeroDocumento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($compra->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($compra->modified) ?></td>
        </tr>
    </table>
</div>