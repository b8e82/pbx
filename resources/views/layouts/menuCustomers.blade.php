@can('administrator')
    <li class="treeview">
        <a href="#"><i class="fa fa-university"></i> <span>Empresas</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href='/companies/create'>Nova</a></li>
            <li><a href='/companies'>Mostrar Todas</a></li>
        </ul>
    </li>
@endcan
@can('admin')
    <li class="treeview">
        <a href="#"><i class="fa fa-group"></i> <span>Clientes</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href='/customers/create'>Novo</a></li>
            <li><a href='/customers'>Todos</a></li>
        </ul>
    </li>
@endcan