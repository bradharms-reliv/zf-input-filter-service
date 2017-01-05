<?php

namespace ZfInputFilterService\InputFilter;

/**
 * Class ServiceAwareInputFilter
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
class ServiceAwareInputFilter extends BaseInputFilter
{
    /**
     * InputFilter constructor.
     *
     * @param ServiceAwareFactory $factory
     * @param array   $inputFilterConfig
     */
    public function __construct(
        ServiceAwareFactory $factory,
        $inputFilterConfig
    ) {
        $this->inputFilterConfig = $inputFilterConfig;
        parent::__construct($factory);
    }
}
