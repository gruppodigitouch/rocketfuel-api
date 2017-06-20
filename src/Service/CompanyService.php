<?php

namespace DigiTouch\RocketFuel\Service;

use DigiTouch\RocketFuel\Model\Service\CompanyServiceInterface;
use stdClass;

/**
 * Class CompanyService
 *
 * @package DigiTouch\RocketFuel\Service
 */
class CompanyService extends AbstractService implements CompanyServiceInterface
{

    /**
     * {@inheritdoc}
     */
    public function getCompaniesList()
    {
        $uri = '/2016/companies';

        return $this->requestBuilder->get($uri);
    }

    /**
     * {@inheritdoc}
     */
    public function getCompany($companyId)
    {
        $uri = '/2016/companies';

        return $this->requestBuilder->get($uri, [new QueryParam('company_id', $companyId)]);
    }
}
