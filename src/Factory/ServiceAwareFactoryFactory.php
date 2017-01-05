<?php

namespace ZfInputFilterService\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfInputFilterService\InputFilter\ServiceAwareFactory;

/**
 * Class ServiceAwareFactoryFactory
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
class ServiceAwareFactoryFactory
{
    /**
     * Create service
     *
     * @param ContainerInterface|ServiceLocatorInterface $container
     *
     * @return ServiceAwareFactory
     */
    public function __invoke($container)
    {
        return new ServiceAwareFactory($container);
    }
}
