<?php

namespace ZfInputFilterService\Filter;

use Zend\Filter\AbstractFilter;

/**
 * Class Test
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
class Test extends AbstractFilter
{
    /**
     * @var int
     */
    protected static $instanceNumber = 0;

    /**
     * Filter options
     *
     * @var array
     */
    protected $options
        = [
            'test' => 'filterOptionORG'
        ];

    /**
     * @var string
     */
    public $filterValue = 'filterValueORG';

    public $filterMessage = 'filterValueORG';

    /**
     * Test constructor.
     */
    public function __construct()
    {
        self::$instanceNumber ++;
    }

    /**
     * filter
     *
     * @param mixed $value
     *
     * @return string
     */
    public function filter($value)
    {
        $this->filterMessage = 'filterValue: ' . $this->filterValue .
            ' options:' . json_encode($this->getOptions()) .
            ' orgValue:' . json_encode($value);
        return $this->filterValue;
    }
}
