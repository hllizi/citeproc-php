<?php
/**
 * citeproc-php
 *
 * @link        http://github.com/seboettg/citeproc-php for the source repository
 * @copyright   Copyright (c) 2016 Sebastian Böttger.
 * @license     https://opensource.org/licenses/MIT
 */

namespace Seboettg\CiteProc\Constraint;


/**
 * Class Locator
 *
 * Tests whether the locator matches the given locator types (see Locators). Use “sub-verbo” to test for the
 * “sub verbo” locator type.
 *
 * @package Seboettg\CiteProc\Choose\Constraint
 *
 * @author Sebastian Böttger <seboettg@gmail.com>
 */
class Locator implements ConstraintInterface
{

    public function validate($value)
    {
        return false;
    }
}