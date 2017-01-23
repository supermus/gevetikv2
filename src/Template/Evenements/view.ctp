<nav class="col-md-1 sidebar" id="actions-sidebar">
    <ul class="nav nav-sidebar">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Evenement'), ['action' => 'edit', $evenement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Evenement'), ['action' => 'delete', $evenement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evenement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Evenements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evenement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Article'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorie'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categorie'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Organisateur'), ['controller' => 'Organisateurs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Organisateur'), ['controller' => 'Organisateurs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservation'), ['controller' => 'Reservations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="col-md-6 col-md-offset-2">

    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom Evenement') ?></th>
            <td><?= h($evenement->nom_evenement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug Evenement') ?></th>
            <td><?= h($evenement->slug_evenement) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Remise') ?></th>
            <td><?= $this->Number->format($evenement->remise) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Evenement Active') ?></th>
            <td><?= $this->Number->format($evenement->evenement_active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre Page Accepte') ?></th>
            <td><?= $this->Number->format($evenement->nombre_page_accepte) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prix Unitaire Extra Page') ?></th>
            <td><?= $this->Number->format($evenement->prix_unitaire_extra_page) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Remise') ?></th>
            <td><?= h($evenement->date_remise) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Soumission Debut') ?></th>
            <td><?= h($evenement->date_soumission_debut) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Soumission Fin') ?></th>
            <td><?= h($evenement->date_soumission_fin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Acceptation') ?></th>
            <td><?= h($evenement->date_acceptation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Acceptation Definitive') ?></th>
            <td><?= h($evenement->date_acceptation_definitive) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Debut') ?></th>
            <td><?= h($evenement->date_debut) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Fin') ?></th>
            <td><?= h($evenement->date_fin) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($evenement->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Adresse') ?></h4>
        <?= $this->Text->autoParagraph(h($evenement->adresse)); ?>
    </div>

