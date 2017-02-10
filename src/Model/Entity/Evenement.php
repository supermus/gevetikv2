<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evenement Entity
 *
 * @property int $id
 * @property string $nom_evenement
 * @property string $slug_evenement
 * @property string $description
 * @property string $adresse
 * @property int $remise
 * @property \Cake\I18n\Time $date_remise
 * @property \Cake\I18n\Time $date_soumission_debut
 * @property \Cake\I18n\Time $date_soumission_fin
 * @property \Cake\I18n\Time $date_acceptation
 * @property \Cake\I18n\Time $date_acceptation_definitive
 * @property \Cake\I18n\Time $date_debut
 * @property \Cake\I18n\Time $date_fin
 * @property boolean $evenement_active
 * @property int $nombre_page_accepte
 * @property int $prix_unitaire_extra_page
 *
 * @property \App\Model\Entity\Article[] $article
 * @property \App\Model\Entity\Categorie[] $categorie
 * @property \App\Model\Entity\Organisateur[] $organisateur
 * @property \App\Model\Entity\Reservation[] $reservation
 */
class Evenement extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
