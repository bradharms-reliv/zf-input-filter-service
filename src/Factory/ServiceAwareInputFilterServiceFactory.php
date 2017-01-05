<?php

namespace ZfInputFilterService\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfInputFilterService\InputFilter\ServiceAwareFactory;
use ZfInputFilterService\InputFilter\ServiceAwareInputFilterService;

/**
 * Class ServiceAwareInputFilterServiceFactory
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
class ServiceAwareInputFilterServiceFactory
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
        /** @var ServiceAwareFactory $factory */
        $factory = $container->get(ZfInputFilterService\InputFilter\ServiceAwareFactory::class);

        return new ServiceAwareInputFilterService($factory);
    }
}
