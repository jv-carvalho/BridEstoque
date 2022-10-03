<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produto[]|\Cake\Collection\CollectionInterface $produtos
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading" style="color: #518d06;"><?= __('Ações') ?></li>
        <li style="color: #518d06;"><?= $this->Html->link(__('Adicionar Produto'), ['action' => 'add'], array('style' => 'color: #518d06;')) ?></li>
    </ul>
</nav>
<div class="$produto index large-10 medium-12 columns content">
    <h3><?= __('Produtos') ?></h3>
    <div class="row">
    <div class="col-xs-12">
      <div class="box box-success box-solid <?php if (!$isSearch) {echo "collapsed-box";} ?>">
        <div class="box-header with-border open-box-filter" style="cursor:pointer;">
          <h3 class="box-title">Filtros</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
          </div>
          <!-- /.box-tools -->
          <?php $this->start('scriptBottom'); ?>
          <script>
            $('.open-box-filter').on('click',function(e){
              $('.box-filter').slideToggle();
            })
          </script>
          <!-- /.box -->
          <?php $this->end(); ?>
        </div>
        <!-- /.box-header -->
        <div class="box-body box-filter">
          <?php
            echo $this->Form->create(null, ['valueSources' => 'query', 'id'=>'buscaid']);
          ?>
          <div class="row">
            <div class="col-xs-3">
              <?php
                echo $this->Form->control('id',['label' => 'Código do Usuário:', 'class' => 'campoNum form-control']);
              ?>
            </div>
            <div class="col-xs-3">
              <?php
                echo $this->Form->control('completename',['label' => 'Nome Completo:']);
              ?>
            </div>
            <div class="col-xs-3">
              <div style="display:table;height:74px;text-align:center;width:100%;">
              </div>
            </div>
          </div>
          <div class="row">
            <?php if (!$isSearch) { ?>
              <div class="col-xs-12">
                <input type="submit" class="btn btn-success btn-block" value="Aplicar Filtros">
              </div>
            <?php }else{ ?>
              <div class="col-xs-6">
                <input type="submit" class="btn btn-success btn-block" value="Aplicar Filtros">
              </div>
              <div class="col-xs-6">
                <?= $this->Html->link('Apagar filtros', ['action' => 'index'], ['class'=>'btn btn-danger btn-block']); ?>
              </div>
            <?php } ?>
          </div>
          <?php
            echo $this->Form->end();
          ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Gerenciar</h3>
        </div>
    <div class="modal-body">    
        <div class="box-body">
            <?php
            echo $this->Form->control('key', ['label' => 'Id:', 'value' => $this->request->getQuery('key')]);
            echo $this->Form->control('username', ['label' => "Nome do produto:", "autocomplete" => "off"]);
            echo $this->Form->control('descrição', ['label' => "Descrição do produto:", "autocomplete" => "off"]);
            ?>
        </div>
    </div>
    <table cellpadding="0" cellspacing="0">
        <br/>   
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Descrição') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Saldo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Criado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Modificado') ?></th>
                <th scope="col" style="color: #518d06;" class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto) : ?>
                <tr>
                    <td><?= $this->Number->format($produto->id) ?></td>
                    <td><?= h($produto->username) ?></td>
                    <td><?= h($produto->descrição) ?></td>
                    <td><?= h($produto->saldo) ?></td>
                    <td><?= h($produto->created) ?></td>
                    <td><?= h($produto->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $produto->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $produto->id]) ?>
                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $produto->id], ['confirm' => __('Você tem certeza que deseja deletar #{0}?', $produto->id)]) ?>
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