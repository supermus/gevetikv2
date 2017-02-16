<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PagePayee Entity
 *
 * @property int $page_payee_id
 * @property int $article_id
 * @property int $auteur_id
 * @property int $paiement_id
 * @property int $extra_page_payee
 *
 * @property \App\Model\Entity\PagePayee $page_payee
 * @property \App\Model\Entity\Article $article
 * @property \App\Model\Entity\Participant $participant
 * @property \App\Model\Entity\Paiement $paiement
 */
class PagePayee extends Entity
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
        'page_payee_id' => false
    ];
}
