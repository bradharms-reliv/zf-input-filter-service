<?php

namespace ZfInputFilterService;

/**
 * Interface DeepCloneable
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
interface DeepCloneable
{
    /**
     * deepClone - Returns a clone of this with sub-properties cloned
     *
     * @return DeepCloneable
     */
    public function deepClone();
}
