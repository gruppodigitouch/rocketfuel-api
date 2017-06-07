<?php

namespace DigiTouch\RocketFuel\Model\Service;
use DateTimeImmutable;
use stdClass;

/**
 * Interface PixelServiceInterface
 *
 * @package DigiTouch\RocketFuel\Model\Service
 */
interface PixelServiceInterface
{
    /**
     * @param int                $companyId
     * @param PageInterface|null $page if null, all the results will be output
     * @param bool|null          $includeSharedPixels
     *
     * @return stdClass
     *
     * @throws \Httpful\Exception\ConnectionErrorException
     */
    public function getByCompany($companyId, PageInterface $page = null, $includeSharedPixels = null);

    /**
     * @param int                    $campaignId
     * @param DateTimeImmutable|null $startDate
     * @param DateTimeImmutable|null $endDate
     * @param PageInterface|null     $page if not specified, all the results will be output
     *
     * @return stdClass
     *
     * @throws \Httpful\Exception\ConnectionErrorException
     */
    public function getByCampaign(
        $campaignId,
        DateTimeImmutable $startDate = null,
        DateTimeImmutable $endDate = null,
        PageInterface $page = null
    );

    /**
     * @param int                $companyId
     * @param PageInterface|null $page if not specified, all the results will be output
     *
     * @return stdClass
     *
     * @throws \Httpful\Exception\ConnectionErrorException
     *
     * @throws \Httpful\Exception\ConnectionErrorException
     */
    public function getThirdPartyByCompany($companyId, PageInterface $page = null);

    /**
     * @param int       $campaignId
     * @param bool|null $assignable if set to true, get a list of pixels assignable to a campaign
     * @param PageInterface|null $page if not specified, all the results will be output
     *
     * @return stdClass
     *
     * @throws \Httpful\Exception\ConnectionErrorException
     */
    public function getThirdPartyByCampaign($campaignId, $assignable = null, PageInterface $page = null);
}
