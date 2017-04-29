<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProofGalleryImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProofGalleryImagesTable Test Case
 */
class ProofGalleryImagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProofGalleryImagesTable
     */
    public $ProofGalleryImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.proof_gallery_images',
        'app.proof_galleries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProofGalleryImages') ? [] : ['className' => 'App\Model\Table\ProofGalleryImagesTable'];
        $this->ProofGalleryImages = TableRegistry::get('ProofGalleryImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProofGalleryImages);

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
