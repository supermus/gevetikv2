<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Organisateur Entity
 *
 * @property int $id
 * @property int $evenement_id
 * @property int $participant_id
 * @property string $nom_role
 * @property int $est_organisateur
 *
 * @property \App\Model\Entity\Evenement $evenement
 * @property \App\Model\Entity\Participant $participant
 */
class Organisateur extends Entity
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
