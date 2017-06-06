<?php

namespace DigiTouch\RocketFuel\Model\Service;

use stdClass;

/**
 * Interface AdvertisementServiceInterface
 *
 * @package DigiTouch\RocketFuel\Model\Service
 */
interface AdvertisementServiceInterface
{
    /**
     * @param string|null        $companyId
     * @param string|null        $campaignId
     * @param FilterInterface[]  $filters
     * @param array              $sorts
     * @param PageInterface|null $page
     *
     * @see https://api-sandbox.rocketfuel.com/doc/2016/index.html?raml=%2F2016%2Fdocs%2Fadvertisement
     *      [/2016/ads/cards]
     *
     * @return stdClass the decoded API JSON response
     *
     * @throws \InvalidArgumentException
     */
    public function getAllAds($companyId = null, $campaignId = null, array $filters = [], array $sorts = [], PageInterface $page = null);
}
