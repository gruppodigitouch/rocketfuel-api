<?php

namespace DigiTouch\Test\RocketFuel\Integration\Service;

use DigiTouch\RocketFuel\Model\Service\CompanyServiceInterface;
use DigiTouch\RocketFuel\Service\CompanyService;
use stdClass;

/**
 * Class CompanyServiceTest
 *
 * @group integration
 *
 * @package DigiTouch\Test\RocketFuel\Integration\Service
 */
class CompanyServiceTest extends AbstractIntegrationServiceTest
{
    /**
     * @test
     */
    public function getCompaniesList()
    {
        $service = $this->getClient()->get(CompanyServiceInterface::class);

        $response = $service->getCompaniesList();

        $this->assertTrue(is_array($response));
    }

    /**
     * @test
     */
    public function getCompany()
    {
        $service = $this->getClient()->get(CompanyServiceInterface::class);

        $companies = $service->getCompaniesList();

        if (count($companies) === 0) {
            $this->markTestSkipped("No company found, can't proceed");

            return;
        }

        $companyId = $companies[0]->id;
        $company = $service->getCompany($companyId);

        $this->assertInstanceOf(stdClass::class, $company);
        $this->assertEquals($companyId, $company->id);
    }
}
