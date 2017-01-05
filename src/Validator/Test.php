<?php

namespace ZfInputFilterService\Validator;

use Zend\Validator\AbstractValidator;

/**
 * Class Test
 *
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2016 Reliv International
 * @license   License.txt
 * @link      https://github.com/reliv
 */
class Test extends AbstractValidator
{
    const TEST = 'TEST';

    /**
     * @var array
     */
    protected $messageTemplates
        = [
            self::TEST => "validatorMessageTemplateORG",
        ];

    /**
     * @var array
     */
    protected $options
        = [
            'test' => 'validatorOptionORG',
        ];

    /**
     * @var string
     */
    public $validatorMessage = 'validatorMessageORG';

    /**
     * isValid
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function isValid($value)
    {
        $message
            = 'ValidatorTestMessage: ' . $this->validatorMessage .
            ' options:' . json_encode($this->getOptions()) .
            ' orgValue:' . json_encode(
                $value
            );

        $this->error(self::TEST, $message);

        return false;
    }
}
