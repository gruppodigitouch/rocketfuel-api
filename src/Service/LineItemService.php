<?php

namespace DigiTouch\RocketFuel\Service;

use DigiTouch\RocketFuel\Model\Service\LineItemServiceInterface;
use DigiTouch\RocketFuel\Model\Service\PageInterface;
use MongoDB\Driver\Query;

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
            new QueryParam('campaign_id', $campaignId),
            new QueryParam('page', $page->getPage()),
            new QueryParam('page_size', $page->getSize()),
        ];

        if ($filterByPaused) {
            $queryParams[] = new QueryParam('filtered', 'paused');
        } elseif($filterByRunning) {
            $queryParams[] = new QueryParam('filtered', 'running');
        }

        return $this->requestBuilder->get($uri, $queryParams)->send()->body;
    }

    /**
     * {@inheritdoc}
     */
    public function getLineItem($lineItemId)
    {
        $uri = '/2016/line_items';
        $queryParams = [new QueryParam('line_item_id', $lineItemId)];

        return $this->requestBuilder->get($uri, $queryParams)->send()->body;
    }
}
