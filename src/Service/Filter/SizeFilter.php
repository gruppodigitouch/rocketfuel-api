<?php

namespace DigiTouch\RocketFuel\Service\Filter;

/**
 * Class SizeFilter
 *
 * @package DigiTouch\RocketFuel\Service\Filters
 */
class SizeFilter extends AbstractRegexFilter
{

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'size';
    }

    /**
     * {@inheritdoc}
     */
    protected function getRegex()
    {
        return '/^(?:[0-9]+x[0-9]+,)*(?:[0-9]+x[0-9]+)$/';
    }
}
