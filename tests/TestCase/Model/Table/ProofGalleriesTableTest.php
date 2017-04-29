<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProofGalleriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProofGalleriesTable Test Case
 */
class ProofGalleriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProofGalleriesTable
     */
    public $ProofGalleries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.proof_galleries',
        'app.proof_gallery_images'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProofGalleries') ? [] : ['className' => 'App\Model\Table\ProofGalleriesTable'];
        $this->ProofGalleries = TableRegistry::get('ProofGalleries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProofGalleries);

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
}
