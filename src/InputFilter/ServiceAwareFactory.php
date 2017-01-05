<?php

namespace ZfInputFilterService\InputFilter;

use Interop\Container\ContainerInterface;
use Zend\InputFilter\InputFilterPluginManager;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class Factory
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
class ServiceAwareFactory extends \Zend\InputFilter\Factory
{
    /**
     * @var ServiceLocatorInterface|ContainerInterface
     */
    protected $container;

    /**
     * Factory constructor.
     *
     * @param ServiceLocatorInterface|ContainerInterface $container
     * @param InputFilterPluginManager|null              $inputFilterManager
     */
    public function __construct(
        $container,
        InputFilterPluginManager $inputFilterManager = null
    ) {
        $this->container = $container;

        if ($inputFilterManager === null) {
            $inputFilterManager = new InputFilterPluginManager();
            $inputFilterManager->setServiceLocator($this->container);
        }

        parent::__construct($inputFilterManager);
    }

    /**
     * createInput
     *
     * @param array|\Traversable|\Zend\InputFilter\InputProviderInterface $inputSpecification
     *
     * @return \Zend\InputFilter\InputFilterInterface|\Zend\InputFilter\InputInterface
     */
    public function createInput($inputSpecification)
    {
        if ($this->configIsService($inputSpecification)) {
            return $this->buildService('type', $inputSpecification);
        }

        $inputSpecification = $this->buildSubServices('filters', $inputSpecification);
        $inputSpecification = $this->buildSubServices('validators', $inputSpecification);

        return parent::createInput($inputSpecification);
    }

    /**
     * buildService
     *
     * @param string $configNameKey
     * @param array  $config
     *
     * @return Object
     * @throws \Exception
     */
    protected function buildService($configNameKey, $config)
    {
        if (!is_array($config)) {
            throw new \Exception('buildService expects a service config array, got: ' . gettype($config));
        }
        $options = $this->buildOptions($config);

        return $this->createService($config[$configNameKey], $options);
    }

    /**
     * buildService
     *
     * @param       $name
     * @param array $options
     *
     * @return Object
     */
    protected function createService($name, array $options)
    {
        $service = $this->container->get($name);

        // Clone to keep states of service correct
        /** @var \Object $clone */
        $clone = $this->cloneService($service);

        $this->hydrateOptions($clone, $options);

        return $clone;
    }

    /**
     * cloneService
     *
     * @param \Object $service
     *
     * @return \Object
     */
    protected function cloneService($service)
    {
        if (method_exists($service, 'deepClone')) {
            return $service->deepClone();
        }

        return clone($service);
    }

    /**
     * buildServices
     *
     * @param string $configKey
     * @param array  $config
     *
     * @return array
     */
    protected function buildSubServices($configKey, $config)
    {
        if (!is_array($config)) {
            return $config;
        }

        if (!array_key_exists($configKey, $config)) {
            return $config;
        }

        $serviceConfig = $config[$configKey];
        $keys = array_keys($serviceConfig);

        foreach ($keys as $key) {
            if (!$this->configIsService($serviceConfig[$key])) {
                continue;
            }

            $config[$configKey][$key] = $this->buildService('name', $serviceConfig[$key]);
        }

        return $config;
    }

    /**
     * buildOptions
     *
     * @param array $config
     *
     * @return array
     */
    protected function buildOptions($config)
    {
        $options = [];
        if (array_key_exists('options', $config)) {
            $options = $config['options'];
        }

        return $options;
    }

    /**
     * hydrateOptions
     *
     * @param \Object $service
     * @param array   $options
     *
     * @return void
     */
    protected function hydrateOptions($service, $options)
    {
        if (method_exists($service, 'setOptions')) {
            $service->setOptions($options);
        }
    }

    /**
     * configIsService
     *
     * @param $config
     *
     * @return bool
     */
    protected function configIsService($config)
    {
        if (!is_array($config)) {
            return false;
        }
        if (!array_key_exists('service', $config)) {
            return false;
        }

        if ($config['service'] != true) {
            return false;
        }

        return true;
    }
}
