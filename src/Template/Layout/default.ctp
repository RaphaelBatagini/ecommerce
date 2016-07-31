<!DOCTYPE html>
<html lang="pt-br">

<head>

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= /*$this->fetch('title')*/ 'Navauto'?>
    </title>
    <?= $this->Html->meta ( 'favicon.png', '/favicon.png', array (
        'type' => 'icon' 
    ) ); ?>

    <?= $this->Html->css('blog-post.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('croppie.css') ?>
    <?= $this->Html->css('gallery.css') ?>
    <?= $this->Html->css('jquery-te-1.4.0.css') ?>
    <?= $this->Html->css('bxslider.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Navauto</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a><?= $this->request->session()->read('Auth.User')['username'];?></a>
                    </li>
                    <?php if ($this->request->session()->read('Auth.User')): ?>
                        <?php if ($this->request->session()->read('Auth.User')['role'] == 'admin'): ?>
                            <li>
                                <a href="/users/admin">Controle do site</a>
                            </li>
                        <?php endif; ?>
                    <li>
                        <a href="/users/logout">Logout</a>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="/users/login">Login</a>
                    </li>
                    <?php endif; ?>
                    <!-- <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <!-- Blog Search Well -->
        <div class="well">
            <form method="POST" action="/products/search">
                <div class="input-group">
                    <input type="text" name="search" placeholder="Digite aqui sua busca" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
            <!-- /.input-group -->
        </div>
        
        <div class="row">

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Categorias</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <?php if (count($categories) > 0): ?>
                                <ul class="list-unstyled">
                                    <?php foreach($categories as $category): ?>
                                        <li>
                                            <?= $this->Html->link($category->name, ['controller' => 'products', 'action' => 'getProductsByCategory', $category->id]); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                Nenhuma categoria encontrada.
                            <?php endif;?>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <!-- <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <div class="well">
                    <h4>Contatos</h4>
                    <p>
                        <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> 
                        <a href="callto:01934812101">(19) 3481-2101</a>
                    </p>
                    <p>
                        <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                        <a href="callto:019998347689">(19) 99834-7689</a> / WhatsApp
                    </p>
                    <p>
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        <a href="mailto:navautopecas@gmail.com">navautopecas@gmail.com</a>
                    </p>
                </div>

               
            </div>
            
            <!-- Blog Post Content Column -->
            <div class="col-md-9">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Navauto <?php echo date("Y"); ?></p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('croppie.js') ?>
    <?= $this->Html->script('gallery.js') ?>
    <?= $this->Html->script('jquery-te-1.4.0.min.js') ?>
    <?= $this->Html->script('bxslider.js') ?>
    <?= $this->fetch('script') ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-80487383-1', 'auto');
      ga('send', 'pageview');

    </script>

</body>

</html>