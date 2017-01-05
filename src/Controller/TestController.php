<?php

namespace ZfInputFilterService\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use ZfInputFilterService\InputFilter\ServiceAwareInputFilterService;

/**
 * Class Controller
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
class TestController extends AbstractRestfulController
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var ServiceAwareInputFilterService
     */
    protected $inputFilter;

    /**
     * TestController constructor.
     *
     * @param array              $config
     * @param ServiceAwareInputFilterService $inputFilter
     */
    public function __construct(
        $config,
        ServiceAwareInputFilterService $inputFilter
    ) {
        $this->config = $config['ZfInputFilterServiceTest'];
        $this->inputFilter = $inputFilter;
    }

    /**
     * get
     *
     * @param mixed $id
     *
     * @return array
     */
    public function get($id)
    {
        return $this->getList();
    }

    /**
     * getList
     *
     * @return array
     */
    public function getList()
    {
        $data = [
            'test1' => 'Test1ValueOrg',
            'subtest1' => [
                'test2' => 'Test2ValueOrg',
            ]
        ];
        $content = [];

        $this->inputFilter->setDataWithConfig($data, $this->config);

        $content['isValid'] = $this->inputFilter->isValid($data);

        $content['messages'] = $this->inputFilter->getMessages();

        $content['result'] = $this->inputFilter->getValues();

        $response = $this->getResponse();

        $response->setContent(json_encode($content));

        return $response;
    }
}
