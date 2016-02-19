<?php

/**
 * This file is part of MetaModels/core.
 *
 * (c) 2012-2015 The MetaModels team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    MetaModels
 * @subpackage Core
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @copyright  2012-2015 The MetaModels team.
 * @license    https://github.com/MetaModels/core/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

namespace MetaModels\Test\Filter\Rules\Comparing;

use MetaModels\Filter\Rules\Comparing\NotEqual;
use MetaModels\Test\TestCase;

/**
 * Test greater-than filter rules.
 */
class NotEqualTest extends TestCase
{
    /**
     * Test that the result equals the expected value.
     *
     * @return void
     */
    public function testGreaterThan()
    {
        $attribute = $this->getMockForAbstractClass('MetaModels\\Attribute\\IAttribute');
        $attribute->expects($this->once())->method('filterNotEqual')->with(10)->willReturn(array(1, 2, 3));

        $rule = new NotEqual($attribute, 10);

        $this->assertEquals(array(1, 2, 3), $rule->getMatchingIds());
    }

    /**
     * Test that the result equals the expected value.
     *
     * @return void
     */
    public function testGreaterThanInclusive()
    {
        $attribute = $this->getMockForAbstractClass('MetaModels\\Attribute\\IAttribute');
        $attribute->expects($this->once())->method('filterNotEqual')->with(10)->willReturn(array(1, 2, 3));

        $rule = new NotEqual($attribute, 10);

        $this->assertEquals(array(1, 2, 3), $rule->getMatchingIds());
    }
}
