<?php

namespace DigiTouch\Test\RocketFuel\Integration\Service;
use DateTimeImmutable;
use DigiTouch\RocketFuel\Model\Service\ReportingServiceInterface;

/**
 * Class ReportingServiceTest
 *
 * @package DigiTouch\Test\RocketFuel\Integration\Service
 */
class ReportingServiceTest extends AbstractIntegrationServiceTest
{
    /**
     * @test
     */
    public function getReports()
    {
        $client = $this->getClient()->get(ReportingServiceInterface::class);

        $metrics = $client->getMetrics();
        $this->assertTrue(is_array($metrics), 'Metrics should be an array');
        if (0 < count($metrics)) {
            $this->assertTrue(is_object($metrics[0]), 'Metric should be an object');
            $this->assertObjectHasAttribute('apiKey', $metrics[0], 'Metric should has the apiKey attribute');
        }

        $dimensions = $client->getDimensions();
        $this->assertTrue(is_array($dimensions), 'Dimensions should be an array');
        if (0 < count($dimensions)) {
            $this->assertTrue(is_object($metrics[0]), 'Dimension should be an object');
            $this->assertObjectHasAttribute('apiKey', $dimensions[0], 'Dimension should include the apiKey attribute');
        }

        $reportMetrics = [];
        if (0 < count($metrics)) {
            $reportMetrics[] = $metrics[0]->apiKey;
        }

        $reportDimensions = [];
        if (0 < count($dimensions)) {
            $reportDimensions[] = $dimensions[0]->apiKey;
        }

        $reports = $client->getReports(
            new DateTimeImmutable('-1 month'),
            new DateTimeImmutable('now'),
            $reportMetrics,
            $reportDimensions,
            [],
            true,
            true
        );

        $this->assertTrue(is_array($reports), 'The reports should be an array');
        if (0 < count($reports)) {
            $this->assertTrue(is_object($reports[0]), 'The single report should be an object');
        }
    }
}
