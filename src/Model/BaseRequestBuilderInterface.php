<?php

namespace DigiTouch\RocketFuel\Model;

use DigiTouch\RocketFuel\Model\Service\FilterInterface;
use DigiTouch\RocketFuel\Model\Service\QueryParamInterface;
use DigiTouch\RocketFuel\Model\Service\SortInterface;
use Httpful\Request;

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
     * @return Request
     */
    public function get($uri, array $queryParams = [], array $filters = [], array $sorts = []);


    /**
     * @param string                 $uri
     * @param QueryParamInterface[]  $queryParams
     * @param mixed                  $payload a JSON serializable object/array
     *
     * @return Request
     */
    public function post($uri, array $queryParams = [], $payload = null);

    /**
     * @param string                 $uri
     * @param QueryParamInterface[]  $queryParams
     * @param mixed                  $payload a JSON serializable object/array
     *
     * @return Request
     */
    public function put($uri, array $queryParams = [], $payload = null);
}
