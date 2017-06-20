<?php

namespace DigiTouch\RocketFuel\Service;

use DigiTouch\RocketFuel\Model\Service\AdvertisementServiceInterface;
use DigiTouch\RocketFuel\Model\Service\PageInterface;
use DigiTouch\RocketFuel\Model\Service\QueryParamInterface;
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
     * @throws \DigiTouch\RocketFuel\Model\Exception\RocketFuelApiException
     */
    public function getAllAds($companyId = null, $campaignId = null, array $filters = [], array $sorts = [], PageInterface $page = null)
    {
        if (null === $companyId && null === $campaignId) {
            throw new InvalidArgumentException('You must specify either $companyId or $campaignId');
        }

        $uri = '/2016/ads/cards';

        $queryParams = [];
        if ($campaignId) {
            $queryParams[] = new QueryParam('campaign_id', $campaignId);
        } else {
            $queryParams[] = new QueryParam('company_id', $companyId);
        }

        if (null !== $page) {
            $this->pageToQueryParamArray($queryParams, $page);
        }

        return $this->requestBuilder->get($uri, $queryParams, $filters, $sorts);
    }
}
