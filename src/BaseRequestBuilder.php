<?php

namespace DigiTouch\RocketFuel;

use DigiTouch\RocketFuel\Model\BaseRequestBuilderInterface;
use DigiTouch\RocketFuel\Model\Service\FilterInterface;
use DigiTouch\RocketFuel\Model\Service\QueryParamInterface;
use DigiTouch\RocketFuel\Model\Service\SortInterface;
use Httpful\Request;

/**
 * Class BaseRequestBuilder
 *
 * @package DigiTouch\RocketFuel\Model
 */
class BaseRequestBuilder implements BaseRequestBuilderInterface
{
    /** @var string */
    private $authenticationToken;

    /** @var string */
    private $apiEndpoint;

    /**
     * BaseRequestBuilder constructor.
     *
     * @param string $authenticationToken
     * @param string $apiEndpoint
     */
    public function __construct($authenticationToken, $apiEndpoint)
    {
        $this->authenticationToken = $authenticationToken;
        $this->apiEndpoint = $apiEndpoint;
    }

    /**
     * @inheritdoc
     */
    public function get($uri, array $queryParams = [], array $filters = [], array $sorts = [])
    {
        $url = $this->apiEndpoint.$uri;

        return Request::get($this->applyQueryParamsToUrl($url, $queryParams, $filters, $sorts), 'application/json')
            ->addHeader('X-Auth-Token', $this->authenticationToken)
            ->expects('application/json')
            ->autoParse(true);
    }

    /**
     * @inheritdoc
     */
    public function post($uri, array $queryParams = [], $payload = null)
    {
        $url = $this->apiEndpoint.$uri;

        return Request::post($this->applyQueryParamsToUrl($url, $queryParams), 'application/json')
            ->body(json_encode($payload))
            ->addHeader('X-Auth-Token', $this->authenticationToken)
            ->expects('application/json')
            ->autoParse(true);
    }

    /**
     * @inheritdoc
     */
    public function put($uri, array $queryParams = [], $payload = null)
    {
        $url = $this->apiEndpoint.$uri;

        return Request::put($this->applyQueryParamsToUrl($url, $queryParams), 'application/json')
            ->body(json_encode($payload))
            ->addHeader('X-Auth-Token', $this->authenticationToken)
            ->expects('application/json')
            ->autoParse(true);
    }

    /**
     * @param string                $url
     * @param QueryParamInterface[] $queryParams
     * @param FilterInterface[]     $filters
     * @param SortInterface[]       $sorts
     *
     * @return string
     */
    private function applyQueryParamsToUrl($url, array $queryParams = [], array $filters = [], array $sorts = [])
    {
        if (0 === count($queryParams)) {
            return $url;
        }

        $queryString = [];
        foreach ($queryParams as $queryParam) {
            $key = $queryParam->getName();
            $value = $queryParam->getValue();

            if (is_array($value)) {
                $queryString[] = $key.'='.implode(',', $value);
            } else {
                $queryString[] = $key.'='.$value;
            }
        }

        foreach ($filters as $filter) {
            $queryString[] = 'filter['.$filter->getName().']='.$filter->getValue();
        }

        foreach ($sorts as $sort) {
            $queryString[] = 'order['.$sort->getName().']='.($sort->sortAscending() ? 'asc' : 'desc');
        }

        $queryString = implode('&', $queryString);

        $index = strpos($url, '?');
        if ($index) {
            return substr($url, 0, $index).$queryString;
        }

        return $url.'?'.$queryString;
    }
}
