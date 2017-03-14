<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JournalsTeachersSubjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JournalsTeachersSubjectsTable Test Case
 */
class JournalsTeachersSubjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JournalsTeachersSubjectsTable
     */
    public $JournalsTeachersSubjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.journals_teachers_subjects',
        'app.teacher_subjects',
        'app.journals',
        'app.students',
        'app.marks',
        'app.subjects',
        'app.journals_subjects',
        'app.teachers',
        'app.teachers_subjects',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('JournalsTeachersSubjects') ? [] : ['className' => 'App\Model\Table\JournalsTeachersSubjectsTable'];
        $this->JournalsTeachersSubjects = TableRegistry::get('JournalsTeachersSubjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JournalsTeachersSubjects);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
