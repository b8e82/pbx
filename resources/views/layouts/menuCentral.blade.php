<li class=" text-center">
    <a href="/customers"><i class="fas fa-arrow-alt-circle-left"></i> <span>Voltar</span>
        <span class="pull-center-container">
            <!--i class="fa fa-angle-left pull-right"></i-->
        </span>
    </a>
</li>
<li class="treeview">
    <a href="#"><i class="fa fa-wrench"></i> <span>Central Telefónica</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href='/generals'>Geral</a></a></li> 
        <li><a href="{{ url("/extensions/$customers_id") }}">Extensões</a></li>
        <li><a href="{{ url("/lines/$customers_id") }}">Linhas</a></li>
        <li><a href='/out_rules'>Regras Saída</a></li>
        <li><a href='/in_rules'>Regras Entrada </a></li>
        <li><a href='/audio'>Audio</a></li>
        <li><a href='/resposta'>Resposta de Voz interativa</a></li>
        <li><a href='/fila'>Fila</a></li>
        <li><a href='toca_grupo'>Tocar em Grupo</a></li>
        <li><a href='/chamamento'>Chamamento</a></li>
        <li><a href='/retorno'>Retorno Chamada</a></li>
        <li><a href='/disa'>Disa</a></li>
        <li><a href='/tempo'>Gestão de Tempo</a></li>
        <li><a href='/pins_linhas'>Linhas de Pins</a></li>
    </ul>
</li>