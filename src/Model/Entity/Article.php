<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property int $id
 * @property int $evenement_id
 * @property string $titre
 * @property string $resume
 * @property int $nombre_page
 * @property int $extra_page
 * @property string $keywords
 *
 * @property \App\Model\Entity\Evenement $evenement
 * @property \App\Model\Entity\PagePayee[] $page_payee
 */
class Article extends Entity
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
