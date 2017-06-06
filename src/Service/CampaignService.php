<?php

namespace DigiTouch\RocketFuel\Service;

use DigiTouch\RocketFuel\Model\Service\CampaignServiceInterface;

/**
 * Class CampaignService
 *
 * @package DigiTouch\RocketFuel\Service
 */
class CampaignService extends AbstractService implements CampaignServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getCampaign($campaignId)
    {
        $uri = '/2016/campaigns';

        $queryParams = ['campaign_id' => $campaignId];

        return $this->requestBuilder->get($uri, $queryParams)->send()->body;
    }

    /**
     * {@inheritdoc}
     */
    public function getCompanyCampaigns($companyId)
    {
        $uri = '/2016/campaigns';

        $queryParams = ['company_id' => $companyId];

        return $this->requestBuilder->get($uri, $queryParams)->send()->body;
    }
}
