<?php

declare(strict_types=1);

namespace Netlogix\Nxajaxpluginpage\EventListener;

use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Frontend\Event\BeforePageCacheIdentifierIsHashedEvent;

#[AsEventListener(event: BeforePageCacheIdentifierIsHashedEvent::class)]
class BeforePageCacheIdentifierIsHashedEventListener
{
    public function __invoke(BeforePageCacheIdentifierIsHashedEvent $event): void
    {
        $request = $event->getRequest();
        $acceptHeader = $request->getHeaderLine('Accept');

        if ($acceptHeader !== '') {
            $pageCacheIdentifierParameters = $event->getPageCacheIdentifierParameters();
            $pageCacheIdentifierParameters[self::class] = $acceptHeader;
            $event->setPageCacheIdentifierParameters($pageCacheIdentifierParameters);
        }
    }
}
