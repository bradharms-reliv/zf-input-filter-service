zf-input-filter-service
=======================

## Allow services as input-filters ##

- Uses ZendFrameworks InputFilter config to build filters and validators 
  from services from a general service container.
- Requires special config values to be added to ZFs standard config format
- Falls back to ZFs standard input filter factory
- Utilizes config as:
    ~~~
    [
        'test1' => [
            'name' => 'test1',
            'required' => true,
            'filters' => [
                [
                    // Invoked
                    'name' => 'ZfInputFilterService\Filter\Test',
                    'options' => [
                        'test' => 'filterOptionInvoked'
                    ],
                ],
                [
                    // Service
                    'name' => 'ZfInputFilterService\Filter\TestService',
                    'service' => true,
                    'options' => [
                        'test' => 'filterOptionService'
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
        // InputFilter Config Sevice
        'subtest1' => [
            // Service
            'name' => 'subtest1',
            'service' => true,
            'type' => 'ZfInputFilterService\InputFilter\TestInputFilter',
            'options' => [
                'test' => 'My test properties'
            ]
        ],
    ],
    ~~~

- NOTE: This is a basic hack to get around the silly way ZF input filters and the factory are written
