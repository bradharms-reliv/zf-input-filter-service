<?php
/**
 * test-config.php
 */
return [
    /* <TEST> */
    'controllers' => [
        'factories' => [
            'ZfInputFilterService\Controller\TestController' => 'ZfInputFilterService\Factory\TestControllerFactory',
        ],
    ],
    'dependencies' => [
        'factories' => [
            /* <TEST> */
            'ZfInputFilterService\Validator\TestService' => 'ZfInputFilterService\Factory\TestValidatorFactory',
            'ZfInputFilterService\Filter\TestService' => 'ZfInputFilterService\Factory\TestFilterFactory',
            'ZfInputFilterService\InputFilter\TestInputFilter' => 'ZfInputFilterService\Factory\TestInputFilterFactory',
            /* </TEST> */
        ],
    ],
    'router' => [
        'routes' => [
            '/zf-input-filter-service' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route' => '/zf-input-filter-service[/:id]',
                    'defaults' => [
                        'controller' => 'ZfInputFilterService\Controller\TestController',
                    ],
                ],
            ],
        ],
    ],
    'ZfInputFilterServiceTest' => [
        'test1' => [
            'name' => 'test1',
            'required' => true,
            'filters' => [
                [
                    // Invoked
                    'name' => 'ZfInputFilterService\Filter\Test',
                    'options' => [
                        'test' => 'filterOptionInvoked',
                    ],
                ],
                [
                    // Service
                    'name' => 'ZfInputFilterService\Filter\TestService',
                    'service' => true,
                    'options' => [
                        'test' => 'filterOptionService',
                    ]
                ]
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
                [
                    // Service
                    'name' => 'ZfInputFilterService\Validator\TestService',
                    'service' => true,
                    'options' => [
                        'test' => 'validatorOptionService',
                        'messages' => [
                            'TEST' => 'validatorMessageTemplateService',
                        ],
                    ],
                ],
            ],
        ],
        'subtest1' => [
            'name' => 'subtest1',
            'service' => true,
            'type' => 'ZfInputFilterService\InputFilter\TestInputFilter',
        ],

    ],
    'template_path_stack' => [
        __DIR__ . '/../view',
    ],
    'strategies' => [
        'ViewJsonStrategy',
    ],
    /* </TEST> */
];
