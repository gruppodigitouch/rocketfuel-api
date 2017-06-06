<?php

namespace DigiTouch\Test\RocketFuel\Integration\Service;
use DigiTouch\RocketFuel\Model\Service\CampaignServiceInterface;
use DigiTouch\RocketFuel\Model\Service\CompanyServiceInterface;
use DigiTouch\RocketFuel\Model\Service\LineItemServiceInterface;
use DigiTouch\RocketFuel\Service\LineItemService;
use DigiTouch\RocketFuel\Service\Page;
use Generator;
use stdClass;

/**
 * Class LineItemServiceTest
 *
 * @group integration
 *
 * @package DigiTouch\Test\RocketFuel\Integration\Service
 */
class LineItemServiceTest extends AbstractIntegrationServiceTest
{
    /**
     * @test
     *
     * @see LineItemService::getLineItem()
     * @see LineItemService::getCampaignLineItems()
     */
    public function getLineItem()
    {
       $service = $this->getClient()->get(LineItemServiceInterface::class);

       $found = false;
       foreach ($this->getCampaigns() as $campaigns) {
           if (0 === count($campaigns)) {
               continue;
           }

           $found = true;
           $data = $service->getCampaignLineItems($campaigns[0]->id, new Page(1, 20));

           $this->assertTrue(is_object($data));
           $this->assertObjectHasAttribute('items', $data);
           $this->assertTrue(is_array($data->items));

           $lineItem = $service->getLineItem($data->items[0]->id);

           $this->assertTrue(is_object($lineItem));
           $this->assertObjectHasAttribute('id', $lineItem);
           $this->assertEquals($data->items[0]->id, $lineItem->id);
           
           break;
       }

       if (!$found) {
           $this->markTestSkipped('No campaigns to work with');
       }
    }

    /**
     * @return Generator|stdClass[]
     */
    protected function getCampaigns()
    {
        $companyService = $this->getClient()->get(CompanyServiceInterface::class);

        foreach ($companyService->getCompaniesList() as $company) {
            $campaignService = $this->getClient()->get(CampaignServiceInterface::class);

            yield $campaignService->getCompanyCampaigns($company->id);
        }
    }
}
