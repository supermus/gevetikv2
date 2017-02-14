<div>
<div class="col-md-6 col-md-offset-3">
    <style>.hh1 {
        color:#b92c28;
        }</style>
    <br><br><br><br><br><br><br><br><br>
            <h1 class="hh1">Participer aux différentes conférences !</h1>
            <h3>S'inscrire maintenant :</h3>
        <?php echo $this->Html->link(
            's\'inscrire',
            ['controller' => 'users', 'action' => 'inscription']
            ,['class'=>'btn btn-success']
        );echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
    echo $this->Html->link(
            'Déjà inscrit',
            ['controller' => 'users', 'action' => 'login',1]
            ,['class'=>'btn btn-primary']
        );
        ?>
</div></div>