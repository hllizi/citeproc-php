<?php
/**
 * citeproc-php
 *
 * @link        http://github.com/seboettg/citeproc-php for the source repository
 * @copyright   Copyright (c) 2016 Sebastian Böttger.
 * @license     https://opensource.org/licenses/MIT
 */

namespace Seboettg\CiteProc\Rendering;


use PHPUnit_Framework_ExpectationFailedException;
use Seboettg\CiteProc\CiteProc;
use Seboettg\CiteProc\Context;
use Seboettg\CiteProc\Locale\Locale;
use Seboettg\CiteProc\TestSuiteTestCaseTrait;

class GroupTest extends \PHPUnit_Framework_TestCase
{
    use TestSuiteTestCaseTrait;

    private $data = "{\"title\":\"Ein Buch\", \"URL\":\"http://foo.bar\"}";

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $context = new Context();
        $context->setLocale(new Locale("de-DE"));
        CiteProc::setContext($context);
    }

    public function testRenderDelimiter()
    {
        $str = '<group delimiter=" "><text term="retrieved"/><text term="from"/><text variable="URL"/></group>';
        $group = new Group(new \SimpleXMLElement($str));
        $this->assertEquals("abgerufen von http://foo.bar", $group->render(json_decode($this->data)));
    }

    public function testRenderAffixes()
    {
        $str = '<group prefix="[" suffix="]" delimiter=" "><text term="retrieved"/><text term="from"/><text variable="URL"/></group>';
        $group = new Group(new \SimpleXMLElement($str));
        $this->assertEquals("[abgerufen von http://foo.bar]", $group->render(json_decode($this->data)));
    }

    public function testRenderDisplay()
    {
        $str = '<group display="indent" prefix="[" suffix="]" delimiter=" "><text term="retrieved"/><text term="from"/><text variable="URL"/></group>';
        $group = new Group(new \SimpleXMLElement($str));
        $this->assertEquals("<div style=\"text-indent: 0px; padding-left: 45px;\">[abgerufen von http://foo.bar]</div>", $group->render(json_decode($this->data)));
    }

    public function testRenderTestSuite()
    {
        $this->_testRenderTestSuite("group_");
    }
}
