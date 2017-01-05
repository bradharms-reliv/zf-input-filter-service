<?php

namespace ZfInputFilterService\InputFilter;

/**
 * Class BaseInputFilter
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
class BaseInputFilter extends \Zend\InputFilter\InputFilter
{
    /**
     * @var null|array
     */
    protected $inputFilterConfig = null;

    /**
     * InputFilter constructor.
     *
     * @param ServiceAwareFactory $factory
     */
    public function __construct(
        ServiceAwareFactory $factory
    ) {
        $this->factory = $factory;
    }

    /**
     * setData
     *
     * @param array|\Traversable $data
     *
     * @return \Zend\InputFilter\InputFilterInterface
     * @throws \Exception
     */
    public function setData($data)
    {
        if ($this->inputFilterConfig === null) {
            throw new \Exception('InputFilterConfig required');
        }

        $this->build();

        return parent::setData($data);
    }

    /**
     * build input filter from config
     *
     * @return void
     */
    protected function build()
    {
        $inputFilterConfig = $this->inputFilterConfig;

        foreach ($inputFilterConfig as $field => $config) {
            $this->add(
                $config,
                $this->getConfigName($field, $config)
            );
        }
    }

    /**
     * getConfigName
     *
     * @param $configKey
     * @param $configValue
     *
     * @return mixed
     */
    protected function getConfigName($configKey, $configValue)
    {
        if (!is_array($configValue)) {
            return $configKey;
        }
        if (array_key_exists('name', $configValue)) {
            return $configValue['name'];
        }

        return $configKey;
    }
}
