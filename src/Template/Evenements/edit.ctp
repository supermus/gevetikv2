<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $evenement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $evenement->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Evenements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Article'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorie'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categorie'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Organisateur'), ['controller' => 'Organisateurs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Organisateur'), ['controller' => 'Organisateurs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservation'), ['controller' => 'Reservations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="evenements form large-9 medium-8 columns content">
    <?= $this->Form->create($evenement) ?>
    <fieldset>
        <legend><?= __('Edit Evenement') ?></legend>
        <?php
            echo $this->Form->input('nom_evenement');
            echo $this->Form->input('slug_evenement');
            echo $this->Form->input('description');
            echo $this->Form->input('adresse');
            echo $this->Form->input('remise');
            echo $this->Form->input('date_remise');
            echo $this->Form->input('date_soumission_debut');
            echo $this->Form->input('date_soumission_fin');
            echo $this->Form->input('date_acceptation');
            echo $this->Form->input('date_acceptation_definitive');
            echo $this->Form->input('date_debut');
            echo $this->Form->input('date_fin');
            echo $this->Form->input('evenement_active');
            echo $this->Form->input('nombre_page_accepte');
            echo $this->Form->input('prix_unitaire_extra_page');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
