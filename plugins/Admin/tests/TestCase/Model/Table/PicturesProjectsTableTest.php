<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PicturesProjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PicturesProjectsTable Test Case
 */
class PicturesProjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PicturesProjectsTable
     */
    public $PicturesProjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pictures_projects',
        'app.projects',
        'app.pictures',
        'app.sessions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PicturesProjects') ? [] : ['className' => 'App\Model\Table\PicturesProjectsTable'];
        $this->PicturesProjects = TableRegistry::get('PicturesProjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PicturesProjects);

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
