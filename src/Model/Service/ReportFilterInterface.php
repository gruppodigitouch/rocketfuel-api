<?php

namespace DigiTouch\RocketFuel\Model\Service;

use JsonSerializable;

/**
 * Interface ReportFilterInterface
 *
 * @package DigiTouch\RocketFuel\Model\Service
 */
interface ReportFilterInterface extends JsonSerializable
{
    const OPERATOR_IN = 'in';
    const OPERATOR_CONTAINS = 'contains';
    const OPERATOR_NOT_IN = 'not_in';

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getOperator();

    /**
     * @return mixed
     */
    public function getValue();
}
