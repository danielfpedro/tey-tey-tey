<?php
  $items = array(
    array(
      'label'=> 'Destaque home',
      'icon'=> 'th-large',
      'url'=> array('controller'=> 'destaques_home')
      ),
    array(
      'label'=> 'Estabelecimentos',
      'icon'=> 'th',
      'url'=> array('controller'=> 'estabelecimentos')
      ),
    array(
      'label'=> 'Comentários',
      'icon'=> 'comment',
      'url'=> array('controller'=> 'comentarios')
      ),
    array(
      'label'=> 'Usuários',
      'icon'=> 'user',
      'url'=> array('controller'=> 'usuarios')
      ),
    array(
      'label'=> 'Contatos',
      'icon'=> 'envelope',
      'url'=> array('controller'=> 'contatos')
      ),
    );
?>

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

<ul class="nav navbar-nav visible-xs menu-navbar">
      <?php foreach ($items as $item): ?>
        <li class="<?php echo ($this->params['controller'] == $item['url']['controller'])? 'active': ''; ?>">
          <?php
            echo $this->Html->link(
              "<span class='glyphicon glyphicon-" .$item['icon']. " icon-menu'></span>" . $item['label'],
              $item['url'],
              array('escape'=> false)
            )
          ?>
        </li>
      <?php endforeach ?>
    </ul>
    

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle navbar-admin-user" data-toggle="dropdown">
            <span class="glyphicon glyphicon-user"></span> Donald Cerrone <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>
              <?php echo $this->Html->link("<span class='glyphicon glyphicon-cog'></span> Configurações do meu usuário", array('controller'=> 'usuarios','action'=> 'edit'), array('escape'=> false)) ?>
            </li>
            <li class="divider"></li>
            <li>
              <?php
                echo $this->Html->link("<span class='glyphicon glyphicon-off'></span> Sair", array('action'=> 'logout'), array('escape'=> false));
              ?>
            </li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>