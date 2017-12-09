<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestionsStudentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionsStudentsTable Test Case
 */
class QuestionsStudentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuestionsStudentsTable
     */
    public $QuestionsStudents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.questions_students',
        'app.questions',
        'app.tests',
        'app.subjects',
        'app.marks',
        'app.students',
        'app.journals',
        'app.journals_subjects',
        'app.users',
        'app.teachers',
        'app.teachers_subjects',
        'app.answers',
        'app.questions_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('QuestionsStudents') ? [] : ['className' => QuestionsStudentsTable::class];
        $this->QuestionsStudents = TableRegistry::get('QuestionsStudents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QuestionsStudents);

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
