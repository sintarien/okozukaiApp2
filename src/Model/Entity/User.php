<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher; // ここに追加

use Cake\ORM\Entity;


class User extends Entity
{

    protected $_accessible = [
        'username' => true,
        'email' => true,
        'password' => true,
        'created' => true,
        'modified' => true,
        'moneys' => true,
    ];

    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();
 
            return $hasher->hash($value);
        }
    }
}
