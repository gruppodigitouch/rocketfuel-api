<?php

namespace DigiTouch\RocketFuel;

use DigiTouch\RocketFuel\Model\BaseRequestBuilderInterface;
use DigiTouch\RocketFuel\Model\Exception\RocketFuelApiException;
use DigiTouch\RocketFuel\Model\Service\FilterInterface;
use DigiTouch\RocketFuel\Model\Service\QueryParamInterface;
use DigiTouch\RocketFuel\Model\Service\SortInterface;
use Httpful\Exception\ConnectionErrorException;
use Httpful\Request;
use stdClass;

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

        $request = Request::get($this->applyQueryParamsToUrl($url, $queryParams, $filters, $sorts), 'application/json')
            ->addHeader('X-Auth-Token', $this->authenticationToken)
            ->autoParse(false);

        return $this->sendRequest($request);
    }

    /**
     * @inheritdoc
     */
    public function post($uri, array $queryParams = [], $payload = null)
    {
        $url = $this->apiEndpoint.$uri;

        $request = Request::post($this->applyQueryParamsToUrl($url, $queryParams), 'application/json')
            ->body(json_encode($payload))
            ->addHeader('X-Auth-Token', $this->authenticationToken)
            ->autoParse(false);

        return $this->sendRequest($request);
    }

    /**
     * @inheritdoc
     */
    public function put($uri, array $queryParams = [], $payload = null)
    {
        $url = $this->apiEndpoint.$uri;

        $request = Request::put($this->applyQueryParamsToUrl($url, $queryParams), 'application/json')
            ->body(json_encode($payload))
            ->addHeader('X-Auth-Token', $this->authenticationToken)
            ->autoParse(false);

        return $this->sendRequest($request);
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

    /**
     * @param Request $request
     *
     * @return array|stdClass|string
     *
     * @throws ConnectionErrorException
     * @throws RocketFuelApiException
     */
    private function sendRequest(Request $request) {
        $response = $request->send();

        if ($response->hasErrors()) {
            throw new RocketFuelApiException(
                $request,
                $response,
                RocketFuelApiException::CODE_HTTP_ERROR
            );
        }

        $jsonObject = json_decode($response->body);

        if (false === $jsonObject) {
            throw new RocketFuelApiException(
                $request,
                $response,
                RocketFuelApiException::CODE_JSON_DESERIALIZE_ERROR
            );
        }

        return $jsonObject;
    }
}
