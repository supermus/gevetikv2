<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap') ?>
    <?= $this->Html->script(['bootstrap.min']) ?>
    <?= $this->Html->css('font-awesome') ?>
    <?= $this->Html->css('login') ?>
    <?= $this->Html->script(['login']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class ="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!--<ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?/*= $this->fetch('title') */?></a></h1>
            </li>
        </ul>-->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Gevetik</a>
        </div>
        <div class="" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php if($this->request->session()->read('Auth.User.role')  == 'admin' ) :?>
                    <li><?= $this->Html->Link('Accueil',['controller'=>'pages','action'=>'home']); ?></li>
                    <li><?= $this->Html->Link('Conférences',['contoller'=>'evenements','action'=>'index']); ?></li>
                    <li><?= $this->Html->Link('Reservations',['contoller'=>'users','action'=>'logout']); ?></li>
                    <li><?= $this->Html->Link('Contact',['contoller'=>'users','action'=>'logout']); ?></li>
                    <li><?= $this->Html->Link('Profil',['contoller'=>'users','action'=>'logout']); ?></li>
                <?php elseif ($this->request->session()->read('Auth.User.role')  == 'visiteur' ) :?>
                    <li><?= $this->Html->Link('Accueil',['controller'=>'pages','action'=>'home']); ?></li>
                    <li><?= $this->Html->Link('Conférences',['contoller'=>'evenements','action'=>'index']); ?></li>
                    <li><?= $this->Html->Link('Reservations',['contoller'=>'users','action'=>'logout']); ?></li>
                    <li><?= $this->Html->Link('Contact',['contoller'=>'users','action'=>'logout']); ?></li>
                    <li><?= $this->Html->Link('Profil',['contoller'=>'users','action'=>'logout']); ?></li>
                <?php else : ?>
                    <li><?= $this->Html->Link('Accueil',['controller'=>'pages','action'=>'home']); ?></li>
                    <li><?= $this->Html->Link('Conférences',['contoller'=>'evenements','action'=>'index']); ?></li>
                <?php endif;?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if ($loggedIn) : ?>
                    <li><?= $this->Html->Link('Deconnecter',['contoller'=>'users','action'=>'logout']); ?></li>
                <?php else : ?>
                    <li><?= $this->Html->Link('S\'inscrire',['controller'=>'users\inscription']); ?></li>
                    <li><?= $this->Html->Link('Connecter',['contoller'=>'users','action'=>'login']); ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    </nav>
    <?php //echo $this->Flash->render() ?>
    <br><br>
    <div class="container clearfix" style="width:100%;">
      <div class="row">
            <?= $this->fetch('content') ?>
      </div>
    </div>
    <br>
</body>
<footer class="panel-footer">
            <p>Gevetik © 2017, All Rights Reserved
            </p>
</footer>  
    
</html>

            <!--
                -->