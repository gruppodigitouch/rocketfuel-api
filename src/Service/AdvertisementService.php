<?php

namespace DigiTouch\RocketFuel\Service;

use DigiTouch\RocketFuel\Model\Service\AdvertisementServiceInterface;
use DigiTouch\RocketFuel\Model\Service\PageInterface;
use InvalidArgumentException;

/**
 * Class AdvertisementService
 *
 * @package DigiTouch\RocketFuel\Service
 */
class AdvertisementService extends AbstractService implements AdvertisementServiceInterface
{
    /**
     * {@inheritdoc}
     *
     * @throws \Httpful\Exception\ConnectionErrorException
     */
    public function getAllAds($companyId = null, $campaignId = null, array $filters = [], array $sorts = [], PageInterface $page = null)
    {
        if (null === $companyId && null === $campaignId) {
            throw new InvalidArgumentException('You must specify either $companyId or $campaignId');
        }

        $uri = '/2016/ads/cards';

        $queryParams = [];
        if ($campaignId) {
            $queryParams['campaign_id'] = $campaignId;
        } else {
            $queryParams['company_id'] = $companyId;
        }

        if (null !== $page) {
            $queryParams['page'] = $page->getPage();
            $queryParams['page_size'] = $page->getSize();
        }

        return $this->requestBuilder->get($uri, $queryParams, $filters, $sorts)->send()->body;
    }
}
