<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<section class="content-header">
    <h1>
        Layout de e-mails
        <div class="pull-right">
            <?php echo $this->Html->link(__('Novo Cadastro'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
        </div>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- FILTRO -->
        <div class="col-xs-12">
            <div class="box box-success box-solid <?php

                                                    use WyriHaximus\HtmlCompress\Pattern\Style;

                                                    if (!$isSearch) {
                                                        echo "collapsed-box";
                                                    } ?>">
                <div class="box-header with-border open-box-filter" style="cursor:pointer;">
                    <h3 class="box-title">Filtros</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool">
                            <?php if ($isSearch) { ?>
                                <i class="fa fa-plus"></i>
                            <?php
                            } else { ?>
                                <i class="fa fa-plus"></i>
                            <?php
                            } ?>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body box-filter">
                    <?php
                    echo $this->Form->create(null, ['valueSources' => 'query', 'id' => 'id']);
                    ?>
                    <div class="row">
                        <div class="col-12 col-xs-1">
                            <?php echo $this->Form->control('divisao', ['Divisão']); ?>
                        </div>
                        <div class="col-12 col-xs-1">
                            <?php echo $this->Form->control('Nome', ['Nome']); ?>
                        </div>
                        <div class="col-12 col-xs-1">
                            <?php echo $this->Form->control('Setor', ['Setor']); ?>
                        </div>
                        <div class="col-12 col-xs-1">
                            <?php echo $this->Form->control('Cargo', ['Cargo']); ?>
                        </div>
                        <div class="col-xs-4">
                            
                        </div>
                    </div>

                    <div class="row">
                        <?php if (!$isSearch) { ?>
                            <div class="col-xs-12">
                                <input type="submit" class="btn btn-success btn-block" value="Aplicar Filtros">
                            </div>
                        <?php } else { ?>
                            <div class="col-xs-6">
                                <input type="submit" class="btn btn-success btn-block" value="Aplicar Filtros">
                            </div>
                            <div class="col-xs-6">
                                <?= $this->Html->link('Apagar filtros', ['action' => 'index'], ['class' => 'btn btn-danger btn-block']); ?>
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
        <!-- FIM FILTRO -->

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo __('List'); ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Id') ?></th>
                                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Nome') ?></th>
                                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Cargo') ?></th>
                                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Criado') ?></th>
                                <th class= "text-center" scope="col"><?= $this->Paginator->sort('Modificado') ?></th>
                                <th class= "text-center" scope="col" class="actions"> <?= __('Ações') ?></th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td class="text-center"><?= $this->Number->format($user->id) ?></td>
                                    <td class="text-center"><?= ($user->username) ?></td> 
                                    <td class="text-center"><?= ($user->Setor) ?></td>
                                    <td class="text-center"><?= ($user->role) ?></td>
                                    <td class="text-center"><?= ($user->created) ?></td>
                                    <td class="text-center"><?= ($user->modified) ?></td>
                                    <td td class="actions text-center" style="vertical-align: middle;">
                                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class' => 'btn btn-warning btn-xs']) ?>
                                     <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $user->id], ['confirm' => __('Você tem certeza que deseja excluir #{0}?', $user->id), 'class' => 'btn btn-danger btn-xs']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="text-center">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('primeira')) ?>
                    <?= $this->Paginator->prev('< ' . __('anterior')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('próxima') . ' >') ?>
                    <?= $this->Paginator->last(__('última') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrado {{current}} registro(s) do total de {{count}}.')]) ?></p>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

<!-- Select2 -->
<?php echo $this->Html->css('AdminLTE./bower_components/select2/dist/css/select2.min', ['block' => 'css']); ?>

<!-- Select2 -->
<?php echo $this->Html->script('AdminLTE./bower_components/select2/dist/js/select2.full.min', ['block' => 'script']); ?>

<?php echo $this->Html->script('AdminLTE./bower_components/select2/dist/js/i18n/pt-BR', ['block' => 'script']); ?>

<?php $this->start('scriptBottom'); ?>
<script>
    $('.open-box-filter').on('click', function(e) {
        $('.box-filter').slideToggle();
    });

    $(function() {
        //Initialize Select2 Elements
        $('.search-select').select2({
            "language": "pt-BR"
        });

    });
</script>
<?php $this->end(); ?>