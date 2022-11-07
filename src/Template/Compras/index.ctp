<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra[]|\Cake\Collection\CollectionInterface $compras
 */
?>
<div class="fornecedor index large-10 medium-12 columns content">
    <h2><?= __('Compras') ?></h2>
    <br/>
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('key', ['label' => 'Buscar', 'value' => $this->request->getQuery('key')]) ?>
    <?= $this->Form->submit('Filtrar') ?>
    <?= $this->Form->end() ?>
    <table cellpadding="0" cellspacing="0" class="table">
        <br/>
        <thead>
            <tr>
                <th class="text-center" scope="col"><?= $this->Paginator->sort('Id') ?></th>
                <th class="text-center" scope="col"><?= $this->Paginator->sort('data', ['label' => 'Data:']) ?></th>
                <th class="text-center" scope="col"><?= $this->Paginator->sort('TotalDaCompra', ['label' => 'Total Da Compra:']) ?></th>
                <th class="text-center" scope="col"><?= $this->Paginator->sort('NumeroDocumento', ['label' => 'Numero Documento:']) ?></th>
                <th class="text-center" scope="col">Fornecedor</th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Criado') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Modificado') ?></th> 
                <th class="text-center" scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($compras as $compra) : ?>
                <tr>
                    <td class="text-center"><?= $this->Number->format($compra->id) ?></td>
                    <td class="text-center"><?= $compra->data->format("d/m/Y") ?></td>
                    <td class="text-center"><?= ($compra->TotalDaCompra) ?></td>
                    <td class="text-center"><?= formataNumeroDocumento($compra->NumeroDocumento) ?></td>
                    <td class="text-center"><?= $compra['fornecedor'] ? $compra['fornecedor']['username'] : '' ?></td>
                    <td class= "text-center"><?= h($compra->created) ?></td>
                    <td class= "text-center"><?= h($compra->modified) ?></td>
                    <td class="actions text-center">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $compra->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $compra->id]) ?>
                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $compra->id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $compra->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrado {{current}} registro(s) do total de {{count}}.')]) ?></p>
    </div>
</div>

<?php
function formataNumeroDocumento($document)
{
    $formatedNumDocument = 11;
    $cnpj_cpf = preg_replace("/\D/", '', $document);
    if (strlen($cnpj_cpf) === $formatedNumDocument) {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
    }

    return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
}
