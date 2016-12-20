<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
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
<div class="evenements view large-9 medium-8 columns content">
    <h3><?= h($evenement->id) ?></h3>
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
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($evenement->id) ?></td>
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
    <div class="related">
        <h4><?= __('Related Article') ?></h4>
        <?php if (!empty($evenement->article)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Article Id') ?></th>
                <th scope="col"><?= __('Evenement Id') ?></th>
                <th scope="col"><?= __('Titre') ?></th>
                <th scope="col"><?= __('Resume') ?></th>
                <th scope="col"><?= __('Nombre Page') ?></th>
                <th scope="col"><?= __('Extra Page') ?></th>
                <th scope="col"><?= __('Keywords') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($evenement->article as $article): ?>
            <tr>
                <td><?= h($article->article_id) ?></td>
                <td><?= h($article->evenement_id) ?></td>
                <td><?= h($article->titre) ?></td>
                <td><?= h($article->resume) ?></td>
                <td><?= h($article->nombre_page) ?></td>
                <td><?= h($article->extra_page) ?></td>
                <td><?= h($article->keywords) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Article', 'action' => 'view', $article->article_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Article', 'action' => 'edit', $article->article_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Article', 'action' => 'delete', $article->article_id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->article_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Categorie') ?></h4>
        <?php if (!empty($evenement->categorie)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Categorie Id') ?></th>
                <th scope="col"><?= __('Evenement Id') ?></th>
                <th scope="col"><?= __('Nom Categorie') ?></th>
                <th scope="col"><?= __('Slug Categorie') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($evenement->categorie as $categorie): ?>
            <tr>
                <td><?= h($categorie->categorie_id) ?></td>
                <td><?= h($categorie->evenement_id) ?></td>
                <td><?= h($categorie->nom_categorie) ?></td>
                <td><?= h($categorie->slug_categorie) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Categorie', 'action' => 'view', $categorie->categorie_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Categorie', 'action' => 'edit', $categorie->categorie_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categorie', 'action' => 'delete', $categorie->categorie_id], ['confirm' => __('Are you sure you want to delete # {0}?', $categorie->categorie_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Organisateur') ?></h4>
        <?php if (!empty($evenement->organisateur)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Organisateur Id') ?></th>
                <th scope="col"><?= __('Evenement Id') ?></th>
                <th scope="col"><?= __('Participant Id') ?></th>
                <th scope="col"><?= __('Nom Role') ?></th>
                <th scope="col"><?= __('Est Organisateur') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($evenement->organisateur as $organisateur): ?>
            <tr>
                <td><?= h($organisateur->organisateur_id) ?></td>
                <td><?= h($organisateur->evenement_id) ?></td>
                <td><?= h($organisateur->participant_id) ?></td>
                <td><?= h($organisateur->nom_role) ?></td>
                <td><?= h($organisateur->est_organisateur) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Organisateur', 'action' => 'view', $organisateur->organisateur_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Organisateur', 'action' => 'edit', $organisateur->organisateur_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Organisateur', 'action' => 'delete', $organisateur->organisateur_id], ['confirm' => __('Are you sure you want to delete # {0}?', $organisateur->organisateur_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reservation') ?></h4>
        <?php if (!empty($evenement->reservation)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Reservation Id') ?></th>
                <th scope="col"><?= __('Evenement Id') ?></th>
                <th scope="col"><?= __('Paiement Id') ?></th>
                <th scope="col"><?= __('Participant Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($evenement->reservation as $reservation): ?>
            <tr>
                <td><?= h($reservation->reservation_id) ?></td>
                <td><?= h($reservation->evenement_id) ?></td>
                <td><?= h($reservation->paiement_id) ?></td>
                <td><?= h($reservation->participant_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reservation', 'action' => 'view', $reservation->reservation_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reservation', 'action' => 'edit', $reservation->reservation_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reservation', 'action' => 'delete', $reservation->reservation_id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->reservation_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
