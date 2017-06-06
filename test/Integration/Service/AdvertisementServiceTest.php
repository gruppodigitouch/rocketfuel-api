<?php

namespace DigiTouch\Test\RocketFuel\Integration\Service;

use DigiTouch\RocketFuel\Model\Service\AdvertisementServiceInterface;
use DigiTouch\RocketFuel\Model\Service\CompanyServiceInterface;
use DigiTouch\RocketFuel\Service\Filter\PausedFilter;
use DigiTouch\RocketFuel\Service\OrderBy;
use DigiTouch\RocketFuel\Service\AdvertisementService;
use DigiTouch\RocketFuel\Service\CompanyService;
use stdClass;

/**
 * Class AdvertisementServiceTest
 *
 * @group integration
 *
 * @package DigiTouch\Test\RocketFuel\Integration\Service
 */
class AdvertisementServiceTest extends AbstractIntegrationServiceTest
{
    /** @var stdClass[] */
    protected $companies;

    /**
     * @test
     */
    public function getAllLeads()
    {
        $companies = $this->getCompanies();

        if (count($companies) === 0) {
            $this->markTestSkipped('No companies to test the leads with');
        }

        $service = $this->getClient()->get(AdvertisementServiceInterface::class);

        $response = $service->getAllAds($companies[0]->id, null);

        $this->assertInstanceOf(stdClass::class, $response);
        $this->assertObjectHasAttribute('totalPages', $response);
    }

    /**
     * @test
     */
    public function getAllLeadsWithFilter()
    {
        $companies = $this->getCompanies();

        if (count($companies) === 0) {
            $this->markTestSkipped('No companies to test the leads with');
        }

        $service = $this->getClient()->get(AdvertisementServiceInterface::class);

        $filters = [new PausedFilter(false)];
        $response = $service->getAllAds($companies[0]->id, null, $filters);

        $this->assertInstanceOf(stdClass::class, $response);
        $this->assertObjectHasAttribute('totalPages', $response);
    }

    /**
     * @test
     */
    public function getAllLeadsWithSort()
    {
        $companies = $this->getCompanies();

        if (count($companies) === 0) {
            $this->markTestSkipped('No companies to test the leads with');
        }

        $service = $this->getClient()->get(AdvertisementServiceInterface::class);

        $sorts = [new OrderBy('advertisement_id', true)];

        $response = $service->getAllAds($companies[0]->id, null, [], $sorts);

        $this->assertInstanceOf(stdClass::class, $response);
        $this->assertObjectHasAttribute('totalPages', $response);
    }

    protected function getCompanies()
    {
        if (null === $this->companies) {
            $companiesService = $this->getClient()->get(CompanyServiceInterface::class);
            $this->companies = $companiesService->getCompaniesList();
        }

        return $this->companies;
    }
}
