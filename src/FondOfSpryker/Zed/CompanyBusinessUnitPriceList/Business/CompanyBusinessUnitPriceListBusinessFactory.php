<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Business;

use FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Business\Model\CompanyBusinessUnitExpander;
use FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Business\Model\CompanyBusinessUnitExpanderInterface;
use FondOfSpryker\Zed\CompanyBusinessUnitPriceList\CompanyBusinessUnitPriceListDependencyProvider;
use FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Dependency\Facade\CompanyBusinessUnitPriceListToPriceListFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class CompanyBusinessUnitPriceListBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Business\Model\CompanyBusinessUnitExpanderInterface
     */
    public function createCompanyBusinessUnitExpander(): CompanyBusinessUnitExpanderInterface
    {
        return new CompanyBusinessUnitExpander($this->getPriceListFacade());
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Dependency\Facade\CompanyBusinessUnitPriceListToPriceListFacadeInterface
     */
    protected function getPriceListFacade(): CompanyBusinessUnitPriceListToPriceListFacadeInterface
    {
        return $this->getProvidedDependency(CompanyBusinessUnitPriceListDependencyProvider::FACADE_PRICE_LIST);
    }
}
