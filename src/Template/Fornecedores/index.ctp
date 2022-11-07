<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fornecedor[]|\Cake\Collection\CollectionInterface $fornecedores
 */
?>
<div class="fornecedor index large-10 medium-12 columns content">
    <h2><?= __('Fornecedores') ?></h2>
    <br/>
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('key', ['label' => 'Buscar', 'value' => $this->request->getQuery('key')]) ?>
    <?= $this->Form->submit('Filtrar') ?>
    <?= $this->Form->end() ?>
    <table cellpadding="0" cellspacing="0" class="table">
        <br/>
        <thead>
            <tr>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Id') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Nome') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Email') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Telefone') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Criado') ?></th>
                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Modificado') ?></th>
                <th class= "text-center" scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fornecedores as $fornecedor) : ?>
                <tr>
                    <td class= "text-center"><?= $this->Number->format($fornecedor->id) ?></td>
                    <td class= "text-center"><?= h($fornecedor->username) ?></td>
                    <td class= "text-center"><?= h($fornecedor->email) ?></td>
                    <td class= "text-center"><?= formataTelefone($fornecedor->telefone) ?></td>
                    <td class= "text-center"><?= h($fornecedor->created) ?></td>
                    <td class= "text-center"><?= h($fornecedor->modified) ?></td>
                    <td class="actions text-center">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $fornecedor->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $fornecedor->id]) ?>
                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $fornecedor->id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $fornecedor->id)]) ?>
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
function formataTelefone($phone)
{
    $formatedPhone = preg_replace('/[^0-9]/', '', $phone);
    $matches = [];
    preg_match('/^([0-9]{2})([0-9]{4,5})([0-9]{4})$/', $formatedPhone, $matches);
    if ($matches) {
        return '(' . $matches[1] . ') ' . $matches[2] . '-' . $matches[3];
    }

    return $phone;
}
