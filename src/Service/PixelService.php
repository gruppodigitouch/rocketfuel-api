<?php

namespace DigiTouch\RocketFuel\Service;

use DateTimeImmutable;
use DigiTouch\RocketFuel\Model\Service\PageInterface;
use DigiTouch\RocketFuel\Model\Service\PixelServiceInterface;

/**
 * Class PixelService
 *
 * @package DigiTouch\RocketFuel\Service
 */
class PixelService extends AbstractService implements PixelServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getByCompany($companyId, PageInterface $page = null, $includeSharedPixels = null)
    {
        $uri = '/2016/pixels/search';
        $queryParams = [new QueryParam('advertiser_id', $companyId)];
        if (null !== $page) {
            $this->pageToQueryParamArray($queryParams, $page);
        }

        if (is_bool($includeSharedPixels)) {
            $queryParams[] = new QueryParam(
                'include_shared_pixels',
                $includeSharedPixels ? 'true' : 'false'
            );
        }

        return $this->requestBuilder->get($uri, $queryParams)->send()->body;
    }

    /**
     * {@inheritdoc}
     */
    public function getByCampaign(
        $campaignId,
        DateTimeImmutable $startDate = null,
        DateTimeImmutable $endDate = null,
        PageInterface $page = null
    ) {
        $uri = '/2016/pixels/search';

        $queryParams = [new QueryParam('campaign_id', $campaignId)];
        if (null !== $page) {
            $this->pageToQueryParamArray($queryParams, $page);
        }

        if (null === $startDate && null === $endDate) {
            $queryParams[] = new QueryParam('all_dates', 'true');
        } else {
            if (null !== $startDate) {
                $queryParams[] = new QueryParam('start_date', $startDate->format('Y-m-d'));
            }

            if (null !== $endDate) {
                $queryParams[] = new QueryParam('end_date', $endDate->format('Y-m-d'));
            }
        }

        return $this->requestBuilder->get($uri, $queryParams)->send()->body;
    }

    /**
     * {@inheritdoc}
     */
    public function getThirdPartyByCompany($companyId, PageInterface $page = null)
    {
        $uri = '/2016/third_party_pixels/search';
        $queryParams = [new QueryParam('advertiser_id', $companyId)];
        if (null !== $page) {
            $this->pageToQueryParamArray($queryParams, $page);
        }

        return $this->requestBuilder->get($uri, $queryParams)->send()->body;
    }

    /**
     * {@inheritdoc}
     */
    public function getThirdPartyByCampaign($campaignId, $assignable = null, PageInterface $page = null)
    {
        $uri = '/2016/third_party_pixels/search';
        $queryParams = [new QueryParam('campaign_id', $campaignId)];
        if (null !== $page) {
            $this->pageToQueryParamArray($queryParams, $page);
        }

        if (true === $assignable) {
            $queryParams[] = new QueryParam('assignable', 'true');
        }

        return $this->requestBuilder->get($uri, $queryParams)->send()->body;
    }
}
