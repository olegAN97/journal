<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JournalsTeachersSubject Entity
 *
 * @property int $id
 * @property int $teacher_subject_id
 * @property int $journal_id
 *
 * @property \App\Model\Entity\TeacherSubject $teacher_subject
 * @property \App\Model\Entity\Journal $journal
 */
class JournalsTeachersSubject extends Entity
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
