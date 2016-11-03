<?php
/**
 * citeproc-php
 *
 * @link        http://github.com/seboettg/citeproc-php for the source repository
 * @copyright   Copyright (c) 2016 Sebastian Böttger.
 * @license     https://opensource.org/licenses/MIT
 */

namespace Seboettg\CiteProc\Rendering;



use Seboettg\CiteProc\CiteProc;
use Seboettg\CiteProc\Context;

class LayoutTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testRender()
    {
        $xmlString = '<layout prefix="(" suffix=")" delimiter=", "><text variable="citation-number"/></layout>';
        $data = json_decode('[{"title":"Ein herzzerreißendes Werk von umwerfender Genialität","citation-number":"1"},{"title":"Ein nicht so wirklich herzzerreißendes Werk von umwerfender Genialität","citation-number":"3"}]');

        $xml = new \SimpleXMLElement($xmlString);

        $context = new Context();
        $context->setMode('citation');
        CiteProc::setContext($context);
        $layout = new Layout($xml);

        $ret = $layout->render($data);

        $this->assertEquals("(1, 3)", $ret);

    }
}
