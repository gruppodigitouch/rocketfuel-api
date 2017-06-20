<?php

namespace DigiTouch\RocketFuel\Model\Service;

use stdClass;

/**
 * Interface CampaignServiceInterface
 *
 * @package DigiTouch\RocketFuel\Model\Service
 */
interface CampaignServiceInterface
{
    /**
     * @param int $campaignId
     *
     * @return stdClass
     *
     * @throws \Httpful\Exception\ConnectionErrorException
     * @throws \DigiTouch\RocketFuel\Model\Exception\RocketFuelApiException
     */
    public function getCampaign($campaignId);


    /**
     * @param int $companyId
     *
     * @return stdClass[]
     *
     * @throws \Httpful\Exception\ConnectionErrorException
     * @throws \DigiTouch\RocketFuel\Model\Exception\RocketFuelApiException
     */
    public function getCompanyCampaigns($companyId);
}
