<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Paiement Entity
 *
 * @property int $paiement_id
 * @property string $reference_paiement
 * @property int $page_payee_id
 * @property int $reservation_id
 * @property string $type
 * @property int $validation
 * @property float $total
 * @property int $valide_par
 *
 * @property \App\Model\Entity\Paiement $paiement
 * @property \App\Model\Entity\PagePayee $page_payee
 * @property \App\Model\Entity\Reservation $reservation
 */
class Paiement extends Entity
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
        'paiement_id' => false
    ];
}
