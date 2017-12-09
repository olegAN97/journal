<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TeachersSubjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TeachersSubjectsTable Test Case
 */
class TeachersSubjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TeachersSubjectsTable
     */
    public $TeachersSubjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.teachers_subjects',
        'app.teachers',
        'app.subjects',
        'app.journals',
        'app.journals_subjects',
        'app.students',
        'app.marks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TeachersSubjects') ? [] : ['className' => 'App\Model\Table\TeachersSubjectsTable'];
        $this->TeachersSubjects = TableRegistry::get('TeachersSubjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TeachersSubjects);

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
