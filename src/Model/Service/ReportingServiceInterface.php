<?php

namespace DigiTouch\RocketFuel\Model\Service;
use DateTimeImmutable;
use stdClass;

/**
 * Interface ReportingServiceInterface
 *
 * @package DigiTouch\RocketFuel\Model\Service
 */
interface ReportingServiceInterface
{
    /**
     * @param DateTimeImmutable       $startDate
     * @param DateTimeImmutable       $endDate
     * @param string[]                $metrics
     * @param string[]                $dimensions
     * @param ReportFilterInterface[] $filters
     * @param bool                    $useCampaignCurrency
     * @param bool                    $useCampaignTimezone
     *
     * @return stdClass[]
     *
     * @throws \Httpful\Exception\ConnectionErrorException
     * @throws \InvalidArgumentException in case of date range too wide (max 31 days)
     */
    public function getReports(
        DateTimeImmutable $startDate,
        DateTimeImmutable $endDate,
        array $metrics,
        array $dimensions,
        array $filters,
        $useCampaignCurrency = true,
        $useCampaignTimezone = true
    );

    /**
     * @return stdClass[]
     *
     * @throws \Httpful\Exception\ConnectionErrorException
     */
    public function getMetrics();

    /**
     * @return stdClass[]
     *
     * @throws \Httpful\Exception\ConnectionErrorException
     */
    public function getDimensions();
}
