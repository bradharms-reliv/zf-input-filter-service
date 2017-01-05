<?php

namespace ZfInputFilterService\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfInputFilterService\Filter\Test;

/**
 * Class TestFilterFactory
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
class TestFilterFactory
{
    /**
     * Create service
     *
     * @param ContainerInterface|ServiceLocatorInterface $container
     *
     * @return mixed
     */
    public function __invoke($container)
    {
        $service = new Test();

        $service->filterValue = 'filterValueService';

        return $service;
    }
}
