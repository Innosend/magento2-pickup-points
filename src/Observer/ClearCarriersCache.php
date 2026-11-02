<?php
/**
 * Copyright (c) Falcon Media (info@falconmedia.nl)
 *
 * @author Falcon Media
 */

declare(strict_types=1);

namespace Innosend\PickupPoints\Observer;

use Innosend\PickupPoints\Model\Config\Source\Carriers;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Clear the cached carriers (and a cached failed lookup) when the Innosend API settings are saved,
 * so a newly entered API token is used right away
 */
class ClearCarriersCache implements ObserverInterface
{
    /**
     * @var Carriers
     */
    private $carriers;

    /**
     * @param Carriers $carriers
     */
    public function __construct(Carriers $carriers)
    {
        $this->carriers = $carriers;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        $this->carriers->clearCache();
    }
}
