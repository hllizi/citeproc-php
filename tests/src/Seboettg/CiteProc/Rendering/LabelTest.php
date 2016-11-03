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
use Seboettg\CiteProc\Locale\Locale;
use Seboettg\CiteProc\TestSuiteTestCaseTrait;

class LabelTest extends \PHPUnit_Framework_TestCase
{
    use TestSuiteTestCaseTrait;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $context = new Context();
        $context->setLocale(new Locale("de-DE"));
        CiteProc::setContext($context);
    }

    public function testRender()
    {

        $data = json_decode("{\"page\":\"5\"}");

        $label = new Label(new \SimpleXMLElement("<label variable=\"page\"/>"));
        $this->assertEquals("Seite", $label->render($data));


        $label = new Label(new \SimpleXMLElement("<label variable=\"page\" plural=\"always\"/>"));
        $this->assertEquals("Seiten", $label->render($data));

        $label = new Label(new \SimpleXMLElement("<label variable=\"page\" plural=\"always\"/>"));
        $this->assertEquals("Seiten", $label->render($data));

//        $label = new Label(new \SimpleXMLElement("<label form=\"short\" prefix=\" (\" text-case=\"title\" suffix=\")\"/>"));

//        $this->assertEquals(" ()", $label->render($data));
    }

    public function testRenderTestSuite()
    {
        $this->_testRenderTestSuite("label_");
    }
}
