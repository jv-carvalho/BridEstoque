<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consumo[]|\Cake\Collection\CollectionInterface $compras
 */
?>
<div class="fornecedor index large-10 medium-12 columns content">
    <h2><?= __('Relação de Consumo') ?></h2>
    <br/>
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?php
    $produtos_list = array();
    foreach ($produtos as $value) {
        $produtos_list[$value->id] = $value->descrição;
    }
    echo $this->Form->control('produto_id', ['id' => 'produto', 'label' => 'Selecione o Produto:', 'options' => $produtos_list, 'empty' => true, 'value' => $this->request->getQuery('produto_id')]);

    ?>
    <?= $this->Form->submit('Buscar Dados') ?>
    <?= $this->Form->end() ?>

    <table cellpadding="0" cellspacing="0" class="table">
        <br/>
        <thead>
            <tr>
                <th class="text-center" scope="col">Produto</th>
                <th class="text-center" scope="col">Un. Medida</th>
                <th class="text-center" scope="col">Data do Movimento</th>
                <th class="text-center" scope="col">Tipo</th>
                <th class="text-right" scope="col">Quantidade</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($consumos as $consumo) : ?>
                <tr>
                    <td class="text-center"><?= $consumo['produto'] ? $consumo['produto']['descrição'] : '' ?></td>
                    <td class="text-center"><?= $consumo['unidademedida'] ? $consumo['unidademedida']['tamanho'] : '' ?></td>
                    <td class="text-center"><?= $consumo->data->format("d/m/Y") ?></td>
                    <td class="text-center"><?= $consumo->tipo_entrada == 0 ? 'Saída' : 'Entrada' ?></td>
                    <td class="text-right"><?= $consumo->quantidade ?></td>

                </tr>
            <?php endforeach; ?>
            <tr style="background-color: gray">
                <td colspan="5" class="text-right text-bold">SALDO FINAL: <?= $saldo_final ?> </td>
            </tr>

        </tbody>
    </table>
</div>