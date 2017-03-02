<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JournalsSubjects Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Journals
 * @property \Cake\ORM\Association\BelongsTo $Subjects
 *
 * @method \App\Model\Entity\JournalsSubject get($primaryKey, $options = [])
 * @method \App\Model\Entity\JournalsSubject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JournalsSubject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JournalsSubject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JournalsSubject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JournalsSubject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JournalsSubject findOrCreate($search, callable $callback = null, $options = [])
 */
class JournalsSubjectsTable extends Table
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

        $this->setTable('journals_subjects');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Journals', [
            'foreignKey' => 'journal_id',
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
        $rules->add($rules->existsIn(['journal_id'], 'Journals'));
        $rules->add($rules->existsIn(['subject_id'], 'Subjects'));

        return $rules;
    }
}
