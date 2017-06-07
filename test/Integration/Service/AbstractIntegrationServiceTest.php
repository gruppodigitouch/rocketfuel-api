<?php

namespace DigiTouch\Test\RocketFuel\Integration\Service;

use DigiTouch\RocketFuel\BaseRequestBuilder;
use DigiTouch\RocketFuel\Model\BaseRequestBuilderInterface;
use DigiTouch\RocketFuel\Model\RocketFuelClientInterface;
use DigiTouch\RocketFuel\RocketFuelClient;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractIntegrationServiceTest
 *
 * @package DigiTouch\Test\RocketFuel\Integration\Service
 */
abstract class AbstractIntegrationServiceTest extends TestCase
{
    /** @var RocketFuelClientInterface */
    private $client;

    public function __construct($name = null, array $data = [], array $dataName = [])
    {
        parent::__construct($name, $data, $dataName);

        $config = require __DIR__.'/../../config.php';
        $this->client = RocketFuelClient::getInstance(
            $config['api_endpoint'],
            $config['authorization_token']
        );
    }

    /**
     * @return RocketFuelClientInterface
     */
    protected function getClient()
    {
        return $this->client;
    }
}
