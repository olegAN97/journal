<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JournalsSubjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JournalsSubjectsTable Test Case
 */
class JournalsSubjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JournalsSubjectsTable
     */
    public $JournalsSubjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.journals_subjects',
        'app.journals',
        'app.subjects',
        'app.students'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('JournalsSubjects') ? [] : ['className' => 'App\Model\Table\JournalsSubjectsTable'];
        $this->JournalsSubjects = TableRegistry::get('JournalsSubjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JournalsSubjects);

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
