<?php

namespace ZfInputFilterService;

/**
 * Class ModuleConfig
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
class ModuleTestConfig
{
    /**
     * __invoke
     *
     * @return array
     */
    public function __invoke()
    {
        return require(__DIR__ . '/../config/test-config.php');
    }
}
