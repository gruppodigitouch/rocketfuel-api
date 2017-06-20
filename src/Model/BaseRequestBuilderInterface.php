<?php

namespace DigiTouch\RocketFuel\Model;

use DigiTouch\RocketFuel\Model\Service\FilterInterface;
use DigiTouch\RocketFuel\Model\Service\QueryParamInterface;
use DigiTouch\RocketFuel\Model\Service\SortInterface;
use Httpful\Exception\ConnectionErrorException;
use Httpful\Request;
use stdClass;

/**
 * Interface BaseRequestBuilderInterface
 *
 * @package DigiTouch\RocketFuel\Model
 */
interface BaseRequestBuilderInterface
{
    /**
     * @param string                $uri
     * @param QueryParamInterface[] $queryParams
     * @param FilterInterface[]     $filters
     * @param SortInterface[]       $sorts
     *
     * @return stdClass|mixed
     *
     * @throws ConnectionErrorException
     * @throws \DigiTouch\RocketFuel\Model\Exception\RocketFuelApiException
     */
    public function get($uri, array $queryParams = [], array $filters = [], array $sorts = []);


    /**
     * @param string                 $uri
     * @param QueryParamInterface[]  $queryParams
     * @param mixed                  $payload a JSON serializable object/array
     *
     * @return stdClass|mixed
     *
     * @throws ConnectionErrorException
     * @throws \DigiTouch\RocketFuel\Model\Exception\RocketFuelApiException
     */
    public function post($uri, array $queryParams = [], $payload = null);

    /**
     * @param string                 $uri
     * @param QueryParamInterface[]  $queryParams
     * @param mixed                  $payload a JSON serializable object/array
     *
     * @return stdClass|mixed
     *
     * @throws ConnectionErrorException
     * @throws \DigiTouch\RocketFuel\Model\Exception\RocketFuelApiException
     */
    public function put($uri, array $queryParams = [], $payload = null);
}
