<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Teacher Entity
 *
 * @property int $id
 * @property string $name
 * @property string $position
 * @property int $experience
 * @property int $user_id
 *
 * @property \App\Model\Entity\Subject[] $subjects
 */
class Teacher extends Entity
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
