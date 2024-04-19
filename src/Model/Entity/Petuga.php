<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line
use Cake\ORM\Entity;

/**
 * Petuga Entity
 *
 * @property int $id
 * @property string $nik
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property string $telp
 * @property string $level
 */
class Petuga extends Entity
{

    protected array $_accessible = [
        'nik' => true,
        'nama' => true,
        'username' => true,
        'password' => true,
        'telp' => true,
        'level' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password',
    ];

    // Add this method
    protected function _setPassword(string $password): ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
