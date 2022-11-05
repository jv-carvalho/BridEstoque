<ul class="sidebar-menu" data-widget="tree">
    <li class="header">NAVEGAÇÃO</li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-user"></i> <span>Usuários</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/users'); ?>"><i class="fa fa-circle-o"></i> Listar Usuários </a></li>
            <li><a href="<?php echo $this->Url->build('/users/add'); ?>"><i class="fa fa-circle-o"></i> Adicionar Usuário </a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pie-chart"></i> <span>Consumos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/consumos'); ?>"><i class="fa fa-circle-o"></i> Listar Consumos </a></li>
            <li><a href="<?php echo $this->Url->build('/consumos/add'); ?>"><i class="fa fa-circle-o"></i> Adicionar Consumo </a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-edit"></i> <span>Produtos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/produtos'); ?>"><i class="fa fa-circle-o"></i> Listar Produtos </a></li>
            <li><a href="<?php echo $this->Url->build('/produtos/add'); ?>"><i class="fa fa-circle-o"></i> Adicionar Produto </a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-th"></i> <span>Compras</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/compras'); ?>"><i class="fa fa-circle-o"></i> Listar Compras </a></li>
            <li><a href="<?php echo $this->Url->build('/compras/add'); ?>"><i class="fa fa-circle-o"></i> Adicionar Compra </a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-th"></i> <span>Item Compras</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/itemcompras'); ?>"><i class="fa fa-circle-o"></i> Listar item Compras </a></li>
            <li><a href="<?php echo $this->Url->build('/itemcompras/add'); ?>"><i class="fa fa-circle-o"></i> Adicionar item Compra </a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-users"></i> <span>Fornecedores</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/fornecedores'); ?>"><i class="fa fa-circle-o"></i> Listar Fornecedores </a></li>
            <li><a href="<?php echo $this->Url->build('/fornecedores/add'); ?>"><i class="fa fa-circle-o"></i> Adicionar Fornecedor </a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-bars"></i> <span>Unidades de Medida</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo $this->Url->build('/unidademedidas'); ?>"><i class="fa fa-circle-o"></i> Listar Unidades de Medida </a></li>
            <li><a href="<?php echo $this->Url->build('/unidademedidas/add'); ?>"><i class="fa fa-circle-o"></i> Adicionar Unidade de Medida </a></li>
        </ul>
    </li>
</ul>