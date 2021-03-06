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

$cakeDescription = 'Gevetik';
$user = $this->request->session()->read('Auth.User');
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
    <?= $this->Html->css('contact') ?>
    <?= $this->Html->css('page') ?>
    <?= $this->Html->css('login') ?>
    <?= $this->Html->script(['login']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
    <nav class ="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <div class="navbar-header">
            <?= $this->Html->Link('Gevetik',['controller'=>'pages','action'=>'home'],['class'=>'navbar-brand']); ?>
        </div>
        <div class="" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                $role = $this->request->session()->read('Auth.User.role');
                    switch ($role)
                    {
                        case 'admin':
                            ?>
                            <li><?= $this->Html->Link('Accueil',['controller'=>'pages','action'=>'home']); ?></li>
                            <li><?= $this->Html->Link('Conférences',['controller'=>'evenements','action'=>'index']); ?></li>
                            <li><?= $this->Html->Link('Mes conférences',['controller'=>'Evenements','action'=>'mesevenements']); ?></li>
                            <li><?= $this->Html->Link('Mes reservations',['controller'=>'reservations','action'=>'index']); ?></li>
                            <li><?= $this->Html->Link('Mon profil',['controller'=>'users','action'=>'view',$user['id']]); ?></li>
                            <li><?= $this->Html->Link('Utilisateurs',['controller'=>'users','action'=>'index']); ?></li>

                <?php
                            break;
                        case 'visiteur':
                            ?>
                            <li><?= $this->Html->Link('Accueil',['controller'=>'pages','action'=>'home']); ?></li>
                            <li><?= $this->Html->Link('Conférences',['controller'=>'evenements','action'=>'index']); ?></li>
                            <li><?= $this->Html->Link('Mes reservations',['controller'=>'reservations','action'=>'index']); ?></li>
                            <li><?= $this->Html->Link('Contact',['controller'=>'pages','action'=>'contact']); ?></li>
                            <li><?= $this->Html->Link('Mon profil',['controller'=>'users','action'=>'view',$user['id']]); ?></li>
                <?php
                            break;
                        case 'organisateur':
                            ?>
                            <li><?= $this->Html->Link('Accueil',['controller'=>'pages','action'=>'home']); ?></li>
                            <li><?= $this->Html->Link('Conférences',['controller'=>'evenements','action'=>'index']); ?></li>
                            <li><?= $this->Html->Link('Mes conférences',['controller'=>'Evenements','action'=>'mesevenements']); ?></li>
                            <li><?= $this->Html->Link('Mes reservations',['controller'=>'reservations','action'=>'index']); ?></li>
                            <li><?= $this->Html->Link('Mon profil',['controller'=>'users','action'=>'view',$user['id']]); ?></li>
                            <li><?= $this->Html->Link('Contact',['controller'=>'pages','action'=>'contact']); ?></li>
                <?php
                            break;
                        default:
                            ?>
                            <li><?= $this->Html->Link('Accueil',['controller'=>'pages','action'=>'home']); ?></li>
                            <li><?= $this->Html->Link('Conférences',['controller'=>'evenements','action'=>'index']); ?></li>
                            <li><?= $this->Html->Link('Contact',['controller'=>'pages','action'=>'contact']); ?></li>
                <?php
                    }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if ($loggedIn) : ?>
                    <li><?= $this->Html->Link('Deconnecter',['controller'=>'users','action'=>'logout']); ?></li>
                <?php else : ?>
                    <li><?= $this->Html->Link('S\'inscrire',['controller'=>'users\inscription']); ?></li>
                    <li><?= $this->Html->Link('Connecter',['controller'=>'users','action'=>'login']); ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    </nav><br><br><br>
    <div class="container" style="width:100%;">
        
    <?php echo $this->Flash->render() ?>
      <div class="row ">

            <?= $this->fetch('content') ?>
      </div>
    </div>

</body>
<footer class="navbar-fixed-bottom">
            <p>Gevetik © 2017, All Rights Reserved </p>
</footer>  
    
</html>
