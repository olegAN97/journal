<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Journals Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Subjects
 * @property \Cake\ORM\Association\HasMany $Students

 *
 * @method \App\Model\Entity\Journal get($primaryKey, $options = [])
 * @method \App\Model\Entity\Journal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Journal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Journal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Journal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Journal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Journal findOrCreate($search, callable $callback = null, $options = [])
 */
class JournalsTable extends Table
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

        $this->setTable('journals');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Students', [
            'foreignKey' => 'journal_id'
        ]);
        $this->belongsToMany('Subjects', [
            'foreignKey' => 'journal_id',
            'targetForeignKey' => 'subject_id',
            'joinTable' => 'journals_subjects'
        ]);
        $this->hasMany('JournalsTeachersSubjects',['foreignKey'=>'teacher_subject_id']);
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('class', 'create')
            ->notEmpty('class');

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
        $rules->add($rules->existsIn(['subject_id'], 'Subjects'));

        return $rules;
    }
}
