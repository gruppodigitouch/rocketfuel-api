<?php

namespace DigiTouch\RocketFuel\Service;

use DigiTouch\RocketFuel\Model\BaseRequestBuilderInterface;
use DigiTouch\RocketFuel\Model\Service\PageInterface;
use DigiTouch\RocketFuel\Model\Service\QueryParamInterface;

/**
 * Class AbstractService
 *
 * @package DigiTouch\RocketFuel\Service
 */
abstract class AbstractService
{
    /** @var BaseRequestBuilderInterface */
    protected $requestBuilder;

    /**
     * AbstractService constructor.
     *
     * @param BaseRequestBuilderInterface $requestBuilder
     */
    public function __construct(BaseRequestBuilderInterface $requestBuilder)
    {
        $this->requestBuilder = $requestBuilder;
    }

    public function queryParamToQueryParamArray(array &$queryParamArray, QueryParamInterface $queryParam)
    {
        $queryParamArray[$queryParam->getName()] = $queryParam->getValue();
    }

    public function pageToQueryParamArray(array &$queryParamArray, PageInterface $page)
    {
        $queryParamArray[] = new QueryParam('page', $page->getPage());
        $queryParamArray[] = new QueryParam('page_size', $page->getSize());
    }
}
