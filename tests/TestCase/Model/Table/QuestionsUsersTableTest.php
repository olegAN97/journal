<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestionsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionsUsersTable Test Case
 */
class QuestionsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\QuestionsUsersTable
     */
    public $QuestionsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.questions_users',
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
        'app.answers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('QuestionsUsers') ? [] : ['className' => QuestionsUsersTable::class];
        $this->QuestionsUsers = TableRegistry::get('QuestionsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QuestionsUsers);

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
