<?php

namespace DigiTouch\RocketFuel\Service;

use DateTimeImmutable;
use DigiTouch\RocketFuel\Model\Service\ReportingServiceInterface;
use InvalidArgumentException;

/**
 * Class ReportingService
 *
 * @package DigiTouch\RocketFuel\Service
 */
class ReportingService extends AbstractService implements ReportingServiceInterface
{

    /**
     * {@inheritdoc}
     */
    public function getReports(
        DateTimeImmutable $startDate,
        DateTimeImmutable $endDate,
        array $metrics,
        array $dimensions,
        array $filters = [],
        $useCampaignCurrency = true,
        $useCampaignTimezone = true
    )
    {
        $uri = '/2016/reports';

        // Max 31 days
        if ($endDate->getTimestamp() - $startDate->getTimestamp() > 2678400) {
            throw new InvalidArgumentException('The date range must be at maximum of 31 days');
        }

        $request = [
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
            'metrics' => $metrics,
            'dimensions' => $dimensions,
            'use_campaign_currency' => $useCampaignCurrency,
            'use_campaign_time_zone' => $useCampaignTimezone,
        ];

        if (0 < count($filters)) {
            $request['filters'] = $filters;
        }

        return $this->requestBuilder->post($uri, [], $request);
    }

    /**
     * {@inheritdoc}
     */
    public function getMetrics()
    {
        $uri = '/2016/reports/metrics';

        return $this->requestBuilder->get($uri);
    }

    /**
     * {@inheritdoc}
     */
    public function getDimensions()
    {
        $uri = '/2016/reports/dimensions';

        return $this->requestBuilder->get($uri);
    }
}
