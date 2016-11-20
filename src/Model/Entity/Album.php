<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \App\Model\Entity\Picture[] $picture
 */
class Album extends Entity
{

    /**
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
