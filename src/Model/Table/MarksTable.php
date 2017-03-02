<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Marks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Students
 * @property \Cake\ORM\Association\BelongsTo $Subjects
 *
 * @method \App\Model\Entity\Mark get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mark newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mark[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mark|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mark patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mark[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mark findOrCreate($search, callable $callback = null, $options = [])
 */
class MarksTable extends Table
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

        $this->setTable('marks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
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

        $validator
            ->integer('mark')
            ->requirePresence('mark', 'create')
            ->notEmpty('mark');

        $validator
            ->requirePresence('n', 'create')
            ->notEmpty('n');

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
        $rules->add($rules->existsIn(['student_id'], 'Students'));
        $rules->add($rules->existsIn(['subject_id'], 'Subjects'));

        return $rules;
    }
}
