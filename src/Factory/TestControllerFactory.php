<?php

namespace ZfInputFilterService\Factory;

use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfInputFilterService\Controller\TestController;
use ZfInputFilterService\InputFilter\ServiceAwareInputFilterService;

/**
 * Class TestControllerFactory
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
class TestControllerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface|ControllerManager $controllerManager
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $container = $controllerManager->getServiceLocator();
        $config = $container->get('Config');

        /** @var ServiceAwareInputFilterService $inputFilter */
        $inputFilter = $container->get('ZfInputFilterService\InputFilter\ServiceAwareInputFilterService');
        $service = new TestController(
            $config,
            $inputFilter
        );

        return $service;
    }
}
