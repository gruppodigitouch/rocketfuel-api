<?php

namespace DigiTouch\RocketFuel\Model\Exception;

use Exception;
use Httpful\Request;
use Httpful\Response;
use Throwable;

/**
 * Class RocketFuelApiException
 *
 * @package DigiTouch\RocketFuel\Model\Exception
 */
class RocketFuelApiException extends Exception
{
    const CODE_HTTP_ERROR = 4001;
    const CODE_JSON_DESERIALIZE_ERROR = 4002;

    /** @var Request */
    private $request;

    /** @var Response */
    private $response;

    /** @var int */
    private $exceptionCode;

    /**
     * RocketFuelApiException constructor.
     *
     * @param Request        $request
     * @param Response       $response
     * @param int            $exceptionCode
     * @param Throwable|null $previous
     */
    public function __construct(
        Request $request,
        Response $response,
        $exceptionCode,
        Throwable $previous = null
    ) {
        parent::__construct('', $response->code, $previous);

        $this->request = $request;
        $this->response = $response;
        $this->exceptionCode = $exceptionCode;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return int one of RocketFuelApiException::CODE_*
     */
    public function getExceptionCode()
    {
        return $this->exceptionCode;
    }
}
