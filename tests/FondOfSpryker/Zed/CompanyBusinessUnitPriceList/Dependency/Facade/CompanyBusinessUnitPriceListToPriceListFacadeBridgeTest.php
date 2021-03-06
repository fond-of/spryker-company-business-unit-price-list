<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Dependency\Facade;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\PriceList\Business\PriceListFacadeInterface;
use Generated\Shared\Transfer\PriceListTransfer;

class CompanyBusinessUnitPriceListToPriceListFacadeBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Dependency\Facade\CompanyBusinessUnitPriceListToPriceListFacadeBridge
     */
    protected $companyBusinessUnitPriceListToPriceListFacadeBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceList\Business\PriceListFacadeInterface
     */
    protected $priceListFacadeInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\PriceListTransfer
     */
    protected $priceListTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->priceListFacadeInterfaceMock = $this->getMockBuilder(PriceListFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListTransferMock = $this->getMockBuilder(PriceListTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->companyBusinessUnitPriceListToPriceListFacadeBridge = new CompanyBusinessUnitPriceListToPriceListFacadeBridge(
            $this->priceListFacadeInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testFindPriceListById(): void
    {
        $this->priceListFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('findPriceListById')
            ->willReturn($this->priceListTransferMock);

        $this->assertInstanceOf(
            PriceListTransfer::class,
            $this->companyBusinessUnitPriceListToPriceListFacadeBridge->findPriceListById(
                $this->priceListTransferMock
            )
        );
    }
}
