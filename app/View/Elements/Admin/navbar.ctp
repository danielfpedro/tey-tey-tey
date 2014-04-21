
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Agito Riosul</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle navbar-admin-user" data-toggle="dropdown">
            <span class="glyphicon glyphicon-user"></span> Donald Cerrone <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li class="text-muted" style="margin: 10px 0 5px 20px;">
            	donald@gmail.com
            </li>
            <li>
              <?php echo $this->Html->link('Configurações de conta', array('controller'=> 'usuarios','action'=> 'edit')) ?>
            </li>
            <li class="divider"></li>
            <li><a href="#">Sair</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>