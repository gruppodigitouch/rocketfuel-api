<?php

namespace DigiTouch\Test\RocketFuel\Integration\Service;
use DigiTouch\RocketFuel\Model\Service\CampaignServiceInterface;
use DigiTouch\RocketFuel\Model\Service\CompanyServiceInterface;
use DigiTouch\RocketFuel\Service\CampaignService;
use DigiTouch\RocketFuel\Service\CompanyService;
use stdClass;

/**
 * Class CampaignServiceTest
 *
 * @group integration
 *
 * @package DigiTouch\Test\RocketFuel\Integration\Service
 */
class CampaignServiceTest extends AbstractIntegrationServiceTest
{
    /**
     * @see CampaignService::getCampaign()
     * @see CampaignService::getCompanyCampaigns()
     *
     * @test
     */
    public function getCampaign()
    {
        $companies = $this->getCompanies();

        $companiesCount = count($companies);
        if (0 === $companiesCount) {
            $this->markTestSkipped('No companies found to work with');
        }

        $service = $this->getClient()->get(CampaignServiceInterface::class);

        $found = false;
        foreach ($companies as $company) {
            $campaigns = $service->getCompanyCampaigns($company->id);

            if (0 === count($campaigns)) {
                continue;
            }

            $found = true;

            $campaign = $service->getCampaign($campaigns[0]->id);

            $this->assertInstanceOf(stdClass::class, $campaign);
            $this->assertEquals($campaigns[0]->id, $campaign->id);

            break;
        }

        if (!$found) {
            $this->markTestSkipped('No campaigns to test the methods with');
        }
    }

    public function getCompanies()
    {
        $companyService = $this->getClient()->get(CompanyServiceInterface::class);

        return $companyService->getCompaniesList();
    }
}
