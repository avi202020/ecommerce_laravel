<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('admin')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Cadastros</li>
                <li>
                    <a href="{{route('products.index')}}"> <i class="menu-icon fa fa-shopping-bag"></i> </i>Produtos </a>
                    <a href="{{route('categories.index')}}"> <i class="menu-icon fa fa-tags"></i> </i>Categorias </a>
                </li>
                <li class="menu-title">Operacional</li>
                <li>
                    <a href="{{route('clients.index')}}"> <i class="menu-icon fa fa-users"></i> </i>Clientes </a>
                </li>
                <li class="menu-title">Acesso ao sistema</li>
                <li>
                    <a href="{{route('admins.index')}}"> <i class="menu-icon fa fa-user-circle"></i> </i>Usuários </a>
                    <a href="{{route('permissions.index')}}"> <i class="menu-icon fa fa-user-o"></i> </i>Perfil </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
<!-- /#left-panel -->
