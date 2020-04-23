<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Business\Model\CompanyBusinessUnitExpanderInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitPriceList\CompanyBusinessUnitPriceListDependencyProvider;
use FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Dependency\Facade\CompanyBusinessUnitPriceListToPriceListFacadeInterface;
use Spryker\Zed\Kernel\Container;

class CompanyBusinessUnitPriceListBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Business\CompanyBusinessUnitPriceListBusinessFactory
     */
    protected $companyBusinessUnitPriceListBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Business\Model\CompanyBusinessUnitExpanderInterface
     */
    protected $companyBusinessUnitPriceListToPriceListFacadeInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitPriceListToPriceListFacadeInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitPriceListToPriceListFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitPriceListBusinessFactory = new CompanyBusinessUnitPriceListBusinessFactory();
        $this->companyBusinessUnitPriceListBusinessFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateCompanyBusinessUnitExpander(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(CompanyBusinessUnitPriceListDependencyProvider::FACADE_PRICE_LIST)
            ->willReturn($this->companyBusinessUnitPriceListToPriceListFacadeInterfaceMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitExpanderInterface::class,
            $this->companyBusinessUnitPriceListBusinessFactory->createCompanyBusinessUnitExpander()
        );
    }
}
