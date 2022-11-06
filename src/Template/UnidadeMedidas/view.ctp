<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UnidadeMedida $UnidadeMedida
 */
?>
<div class="card-body pad table-responsive">
  <button><?= $this->Html->link(__('Editar Unidade Medida'), ['action' => 'edit', $UnidadeMedida->id]) ?></button>
  <button><?= $this->Form->postlink(__('Deletar  Unidade Medida'), ['action' => 'delete', $UnidadeMedida->id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $UnidadeMedida->id)]) ?></button>
</div>
<div class="UnidadeMedida view large-10 medium-8 columns content">
    <h3><?= h($UnidadeMedida->id) ?></h3>
    <table class="vertical-table table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($UnidadeMedida->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tamanho') ?></th>
            <td><?= h($UnidadeMedida->tamanho) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Criado') ?></th>
            <td><?= h($UnidadeMedida->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($UnidadeMedida->modified) ?></td>
        </tr>
    </table>
</div>