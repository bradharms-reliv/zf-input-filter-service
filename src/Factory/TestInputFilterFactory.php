<?php

namespace ZfInputFilterService\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfInputFilterService\InputFilter\ServiceAwareFactory;
use ZfInputFilterService\InputFilter\ServiceAwareInputFilter;

/**
 * Class TestInputFilterFactory
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
class TestInputFilterFactory
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

        $testConfig = [
            'test2' => [
                'name' => 'test2',
                'required' => true,
                'filters' => [
                    [
                        // Invoked
                        'name' => 'ZfInputFilterService\Filter\Test',
                        'options' => [
                            'test' => 'filterOptionInvoked'
                        ],
                    ],
                ],
                'validators' => [
                    [
                        // Invoked
                        'name' => 'ZfInputFilterService\Validator\Test',
                        'options' => [
                            'test' => 'validatorOptionInvoked',
                            'messages' => [
                                'TEST' => 'validatorMessageTemplateInvoked',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $service = new ServiceAwareInputFilter(
            $factory,
            $testConfig
        );

        foreach ($testConfig as $field => $config) {
            $service->add($config, $field);
        }

        return $service;
    }
}
