<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MoneysTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MoneysTable Test Case
 */
class MoneysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MoneysTable
     */
    protected $Moneys;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Moneys',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Moneys') ? [] : ['className' => MoneysTable::class];
        $this->Moneys = $this->getTableLocator()->get('Moneys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Moneys);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
