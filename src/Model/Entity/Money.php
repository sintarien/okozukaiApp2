<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Money Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $deposit
 * @property int|null $withdrawal
 * @property string|null $purpose
 * @property int $reason
 * @property \Cake\I18n\FrozenTime $created_at
 *
 * @property \App\Model\Entity\User $user
 */
class Money extends Entity
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
        'user_id' => true,
        'deposit' => true,
        'withdrawal' => true,
        'purpose' => true,
        'reason' => true,
        'created_at' => true,
        'user' => true,
    ];
}
