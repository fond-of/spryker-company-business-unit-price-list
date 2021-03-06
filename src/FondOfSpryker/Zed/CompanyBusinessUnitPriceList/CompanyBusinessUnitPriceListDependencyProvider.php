<?php

namespace FondOfSpryker\Zed\CompanyBusinessUnitPriceList;

use FondOfSpryker\Zed\CompanyBusinessUnitPriceList\Dependency\Facade\CompanyBusinessUnitPriceListToPriceListFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CompanyBusinessUnitPriceListDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_PRICE_LIST = 'FACADE_PRICE_LIST';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addPriceListFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addPriceListFacade(Container $container): Container
    {
        $container[static::FACADE_PRICE_LIST] = static function (Container $container) {
            return new CompanyBusinessUnitPriceListToPriceListFacadeBridge(
                $container->getLocator()->priceList()->facade()
            );
        };

        return $container;
    }
}
