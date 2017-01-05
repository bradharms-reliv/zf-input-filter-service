<?php
/**
 * module.config.php
 */
return [
    'dependencies' => [
        'factories' => [
            ZfInputFilterService\InputFilter\ServiceAwareInputFilterService::class =>
                ZfInputFilterService\Factory\ServiceAwareInputFilterServiceFactory::class,
            ZfInputFilterService\InputFilter\ServiceAwareFactory::class =>
                ZfInputFilterService\Factory\ServiceAwareFactoryFactory::class,
        ],
    ],
];
