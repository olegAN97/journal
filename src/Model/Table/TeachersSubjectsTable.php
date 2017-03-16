<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TeachersSubjects Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Teachers
 * @property \Cake\ORM\Association\BelongsTo $Subjects
 *
 * @method \App\Model\Entity\TeachersSubject get($primaryKey, $options = [])
 * @method \App\Model\Entity\TeachersSubject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TeachersSubject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TeachersSubject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TeachersSubject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TeachersSubject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TeachersSubject findOrCreate($search, callable $callback = null, $options = [])
 */
class TeachersSubjectsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('teachers_subjects');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Teachers', [
            'foreignKey' => 'teacher_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Subjects', [
            'foreignKey' => 'subject_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['teacher_id'], 'Teachers'));
        $rules->add($rules->existsIn(['subject_id'], 'Subjects'));

        return $rules;
    }
}
