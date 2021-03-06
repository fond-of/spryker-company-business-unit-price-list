<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitPriceList;

use Codeception\Test\Unit;
use Spryker\Zed\Kernel\Container;

class CompanyBusinessUnitPriceListDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitPriceList\CompanyBusinessUnitPriceListDependencyProvider
     */
    protected $companyBusinessUnitPriceListDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitPriceListDependencyProvider = new CompanyBusinessUnitPriceListDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideBusinessLayerDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->companyBusinessUnitPriceListDependencyProvider->provideBusinessLayerDependencies(
                $this->containerMock
            )
        );
    }
}
