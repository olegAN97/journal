<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ResourcesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ResourcesController Test Case
 */
class ResourcesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.resources',
        'app.subjects',
        'app.marks',
        'app.students',
        'app.journals',
        'app.journals_subjects',
        'app.questions',
        'app.tests',
        'app.answers',
        'app.questions_students',
        'app.questions_users',
        'app.users',
        'app.teachers',
        'app.teachers_subjects'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
