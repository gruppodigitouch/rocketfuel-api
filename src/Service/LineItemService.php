<?php

namespace DigiTouch\RocketFuel\Service;

use DigiTouch\RocketFuel\Model\Service\LineItemServiceInterface;
use DigiTouch\RocketFuel\Model\Service\PageInterface;

/**
 * Class LineItemService
 *
 * @package DigiTouch\RocketFuel\Service
 */
class LineItemService extends AbstractService implements LineItemServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getCampaignLineItems($campaignId, PageInterface $page, $filterByPaused = false, $filterByRunning = false)
    {
        $uri = '/2016/line_items';
        $queryParams = [
            'campaign_id' => $campaignId,
            'page' => $page->getPage(),
            'page_size' => $page->getSize(),
        ];

        if ($filterByPaused) {
            $queryParams['filtered'] = 'paused';
        } elseif($filterByRunning) {
            $queryParams['filtered'] = 'running';
        }

        return $this->requestBuilder->get($uri, $queryParams)->send()->body;
    }

    /**
     * {@inheritdoc}
     */
    public function getLineItem($lineItemId)
    {
        $uri = '/2016/line_items';
        $queryParams = ['line_item_id' => $lineItemId];

        return $this->requestBuilder->get($uri, $queryParams)->send()->body;
    }
}
