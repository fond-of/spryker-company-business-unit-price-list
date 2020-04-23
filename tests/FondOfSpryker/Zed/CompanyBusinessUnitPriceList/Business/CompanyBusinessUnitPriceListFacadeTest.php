<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Business\Model\CompanyBusinessUnitExpanderInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;

class CompanyBusinessUnitPriceListFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Business\CompanyBusinessUnitPriceListFacade
     */
    protected $companyBusinessUnitPriceListFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Business\CompanyBusinessUnitPriceListBusinessFactory
     */
    protected $companyBusinessUnitPriceListBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    protected $companyBusinessUnitTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Business\Model\CompanyBusinessUnitExpanderInterface
     */
    protected $companyBusinessUnitExpanderInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->companyBusinessUnitPriceListBusinessFactoryMock = $this->getMockBuilder(CompanyBusinessUnitPriceListBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitTransferMock = $this->getMockBuilder(CompanyBusinessUnitTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitExpanderInterfaceMock = $this->getMockBuilder(CompanyBusinessUnitExpanderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitPriceListFacade = new CompanyBusinessUnitPriceListFacade();
        $this->companyBusinessUnitPriceListFacade->setFactory($this->companyBusinessUnitPriceListBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testExpandCompanyBusinessUnit(): void
    {
        $this->companyBusinessUnitPriceListBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCompanyBusinessUnitExpander')
            ->willReturn($this->companyBusinessUnitExpanderInterfaceMock);

        $this->companyBusinessUnitExpanderInterfaceMock->expects($this->atLeastOnce())
            ->method('expand')
            ->willReturn($this->companyBusinessUnitTransferMock);

        $this->assertInstanceOf(
            CompanyBusinessUnitTransfer::class,
            $this->companyBusinessUnitPriceListFacade->expandCompanyBusinessUnit($this->companyBusinessUnitTransferMock)
        );
    }
}
