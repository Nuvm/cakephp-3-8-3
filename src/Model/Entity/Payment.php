<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property string|null $notes
 * @property \Cake\I18n\FrozenTime $created
 * @property int $user_id
 * @property int $payment_method_id
 * @property int|null $loan_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\PaymentMethod $payment_method
 * @property \App\Model\Entity\Loan $loan
 */
class Payment extends Entity
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
        'notes' => true,
        'created' => true,
        'user_id' => true,
        'payment_method_id' => true,
        'loan_id' => true,
        'user' => true,
        'payment_method' => true,
        'loan' => true
    ];
}
