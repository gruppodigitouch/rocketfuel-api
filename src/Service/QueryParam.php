<?php

namespace DigiTouch\RocketFuel\Service;
use DigiTouch\RocketFuel\Model\Service\QueryParamInterface;

/**
 * Class QueryParam
 *
 * @package DigiTouch\RocketFuel\Service
 */
class QueryParam implements QueryParamInterface
{
    /** @var string */
    private $name;

    /** @var mixed */
    private $value;

    /**
     * QueryParam constructor.
     *
     * @param string $name
     * @param mixed $value
     */
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->getName().'='.$this->getValue();
    }
}
