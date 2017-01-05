<?php

namespace ZfInputFilterService\InputFilter;

/**
 * Class ServiceAwareInputFilterService
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
class ServiceAwareInputFilterService extends BaseInputFilter
{
    /**
     * setDataWithConfig
     *
     * @param array|\Traversable $data
     * @param array              $inputFilterConfig
     *
     * @return \Zend\InputFilter\InputFilterInterface
     */
    public function setDataWithConfig($data, array $inputFilterConfig)
    {
        $this->setInputFilterConfig($inputFilterConfig);

        return $this->setData($data);
    }

    /**
     * setInputFilterConfig
     *
     * @param array $inputFilterConfig
     *
     * @return void
     */
    public function setInputFilterConfig(array $inputFilterConfig)
    {
        $this->inputFilterConfig = $inputFilterConfig;
    }

    /**
     * build
     *
     * @return void
     */
    protected function build()
    {
        parent::build();
        // Only allow config to be used once
        $this->inputFilterConfig = null;
    }
}
