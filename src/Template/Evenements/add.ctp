<br><br>
<nav class="col-md-1 sidebar" id="actions-sidebar">
    <ul class="nav nav-sidebar">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Evenements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Article'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorie'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categorie'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Organisateur'), ['controller' => 'Organisateurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Reservation'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="col-md-6 col-md-offset-2">
    <?= $this->Form->create($evenement) ?>
    <fieldset>
        <legend><?= __('Add Evenement') ?></legend>
        <div class="row">
        <?php
            echo "<div class=\"col-xs-4\">";
            echo $this->Form->input('nom_evenement');
            echo "</div>";
        echo "<div class=\"col-xs-4\">";
            echo $this->Form->input('slug_evenement');
        echo "</div>";
        echo "</div>";

            echo $this->Form->input('description');
            echo $this->Form->input('adresse');
        echo "<div class=\"row\">";
        echo "<div class=\"col-xs-5\">";
            echo $this->Form->input('remise');
        echo "</div>";
        echo "<div class=\"col-xs-5\">";
            echo $this->Form->input('date_remise');
        echo "</div>";
        echo "<div class=\"col-xs-5\">";
            echo $this->Form->input('date_soumission_debut');
        echo "</div>";
        echo "<div class=\"col-xs-5\">";
            echo $this->Form->input('date_soumission_fin');
        echo "</div>";
        echo "<div class=\"col-xs-5\">";
            echo $this->Form->input('date_acceptation');
        echo "</div>";
        echo "<div class=\"col-xs-5\">";
            echo $this->Form->input('date_acceptation_definitive');
        echo "</div>";
        echo "<div class=\"col-xs-5\">";
            echo $this->Form->input('date_debut');
        echo "</div>";
        echo "<div class=\"col-xs-5\">";
            echo $this->Form->input('date_fin');
        echo "</div>";
        echo "<div class=\"col-xs-3\">";
        echo $this->Form->input('evenement_active', ['type'=>'checkbox']);
        echo "</div>";
        echo "<div class=\"col-xs-3\">";
            echo $this->Form->input('nombre_page_accepte');
        echo "</div>";
        echo "<div class=\"col-xs-3\">";
            echo $this->Form->input('prix_unitaire_extra_page');
        echo "</div>";
        echo "<div class=\"col-xs-5\">";
        echo $this->Form->input('nom_categorie');
        echo "</div>";
        echo "<div class=\"col-xs-5\">";
        echo $this->Form->input('slug_categorie');
        echo "</div>";
        echo "<div class=\"col-xs-5\">";
        echo $this->Form->input('nom_option');
        echo "</div>";
        echo "<div class=\"col-xs-5\">";
        echo $this->Form->input('slug_option');
        echo "</div>";
        echo "<div class=\"col-xs-5\">";
        echo $this->Form->input('prix_unitaire');
        echo "</div>";
        echo "<div class=\"col-xs-5\">";
        echo $this->Form->input('quantite_minimum');
        echo "</div>";
        echo "<div class=\"col-xs-5\">";
        echo $this->Form->input('quantite_maximum');
        echo "</div>";
        echo "<div class=\"col-xs-5\">";
        echo $this->Form->input('url_evenement', ['type'=>'file','label'=>'Image']);
        echo "</div>";
        ?>
            <div></div>

    </fieldset>
    <?= $this->Form->button(__('Enregistrer')) ?>
    <?= $this->Form->end() ?>
</div>
