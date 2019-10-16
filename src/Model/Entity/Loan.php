<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Loan Entity
 *
 * @property int $id
 * @property float $interest
 * @property float $amount
 * @property float $amount_due
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\Collector[] $collectors
 */
class Loan extends Entity
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
        'interest' => true,
        'amount' => true,
        'amount_due' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'payments' => true,
        'collectors' => true
    ];
}
