<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Participant Entity
 *
 * @property int $id
 * @property string $prenom_participant
 * @property string $nom_participant
 * @property string $email_participant
 * @property string $mot_de_passe
 * @property string $etablissement
 *
 * @property \App\Model\Entity\Organisateur[] $organisateurs
 * @property \App\Model\Entity\Reservation[] $reservation
 */
class Participant extends Entity
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
