<?php

namespace ZfInputFilterService\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfInputFilterService\Validator\Test;

/**
 * Class TestValidatorFactory
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
class TestValidatorFactory
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

        $service->validatorMessage = 'validatorMessageService';

        return $service;
    }
}
