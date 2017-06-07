<?php

namespace DigiTouch\Test\RocketFuel\Integration\Service;
use DigiTouch\RocketFuel\Model\Service\CampaignServiceInterface;
use DigiTouch\RocketFuel\Model\Service\CompanyServiceInterface;
use DigiTouch\RocketFuel\Model\Service\PixelServiceInterface;
use DigiTouch\RocketFuel\Service\PixelService;

/**
 * Class PixelServiceTest
 *
 * @group integration
 *
 * @package DigiTouch\Test\RocketFuel\Integration\Service
 */
class PixelServiceTest extends AbstractIntegrationServiceTest
{
    /**
     * @test
     *
     * @see PixelService::getByCompany()
     * @see PixelService::getThirdPartyByCompany()
     */
    public function getByCompany()
    {
        $service = $this->getClient()->get(PixelServiceInterface::class);

        $companies = $this->getClient()->get(CompanyServiceInterface::class)
            ->getCompaniesList();

        if (0 === count($companies)) {
            $this->markTestSkipped('No companies to work with');
        }

        $response = $service->getByCompany($companies[0]->id);

        $this->assertTrue(is_object($response));
        $this->assertObjectHasAttribute('items', $response);
        $this->assertTrue(is_array($response->items));

        $response = $service->getThirdPartyByCompany($companies[0]->id);

        $this->assertTrue(is_object($response));
        $this->assertObjectHasAttribute('items', $response);
        $this->assertTrue(is_array($response->items));
    }

    /**
     * @test
     * @see PixelService::getByCampaign()
     * @see PixelService::getThirdPartyByCampaign()
     */
    public function getByCampaign()
    {
        $service = $this->getClient()->get(PixelServiceInterface::class);

        $companies = $this->getClient()->get(CompanyServiceInterface::class)
            ->getCompaniesList();

        $campaignService = $this->getClient()->get(CampaignServiceInterface::class);
        $campaigns = [];
        $campaignsCount = 0;
        foreach ($companies as $company) {
            $campaigns = $campaignService->getCompanyCampaigns($company->id);
            $campaignsCount = count($campaigns);

            if (0 < $campaignsCount) {
                break;
            }
        }

        if (0 === $campaignsCount) {
            $this->markTestSkipped('No campaigns to work with');
        }

        $response = $service->getByCampaign($campaigns[0]->id);

        $this->assertTrue(is_object($response));
        $this->assertObjectHasAttribute('items', $response);
        $this->assertTrue(is_array($response->items));

        $response = $service->getThirdPartyByCampaign($campaigns[0]->id);

        $this->assertTrue(is_object($response));
        $this->assertObjectHasAttribute('items', $response);
        $this->assertTrue(is_array($response->items));
    }

    /**
     * @test
     */
    public function getThirdPartyByCompany()
    {
        $this->markTestIncomplete('TBD');
    }

    /**
     * @test
     */
    public function getThirdPartyByCampaign()
    {
        $this->markTestIncomplete('TBD');
    }
}
