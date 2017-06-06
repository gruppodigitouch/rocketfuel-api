<?php

namespace DigiTouch\RocketFuel\Model\Service;

use stdClass;

/**
 * Interface LineItemServiceInterface
 *
 * @package DigiTouch\RocketFuel\Model\Service
 */
interface LineItemServiceInterface
{
    /**
     * @param int           $campaignId
     * @param PageInterface $page
     * @param bool          $filterByPaused  if true, only paused lines will be output. Must not be used with $filterByRunning.
     * @param bool          $filterByRunning if true, only running lines will be output. Must not be used with $filterByPaused.
     *
     * @return stdClass
     *
     * @throws \Httpful\Exception\ConnectionErrorException
     */
    public function getCampaignLineItems($campaignId, PageInterface $page, $filterByPaused = false, $filterByRunning = false);

    /**
     * @param int $lineItemId
     *
     * @return stdClass
     *
     * @throws \Httpful\Exception\ConnectionErrorException
     */
    public function getLineItem($lineItemId);
}
