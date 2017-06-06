<?php

namespace DigiTouch\RocketFuel\Service\Filter;

/**
 * Class PausedFilter
 *
 * @package DigiTouch\RocketFuel\Service\Filters
 */
class PausedFilter extends AbstractBoolFilter
{

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'paused';
    }
}
