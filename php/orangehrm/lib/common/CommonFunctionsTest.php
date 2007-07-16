<?php

/**
 * OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures
 * all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM is free software; you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
 * Boston, MA  02110-1301, USA
 */

// Call CommonFunctionsTest::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "CommonFunctionsTest::main");
}

require_once "PHPUnit/Framework/TestCase.php";
require_once "PHPUnit/Framework/TestSuite.php";

require_once 'CommonFunctions.php';

/**
 * Test class for CommonFunctions.
 * Generated by PHPUnit_Util_Skeleton on 2007-07-16 at 12:29:14.
 */
class CommonFunctionsTest extends PHPUnit_Framework_TestCase {
    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main() {
        require_once "PHPUnit/TextUI/TestRunner.php";

        $suite  = new PHPUnit_Framework_TestSuite("CommonFunctionsTest");
        $result = PHPUnit_TextUI_TestRunner::run($suite);
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @access protected
     */
    protected function setUp() {
    }

    /**
     * Test case for getCssClassForMessage method
     */
    public function testGetCssClassForMessage() {

    	$this->assertEquals("success", CommonFunctions::getCssClassForMessage("ADD_SUCCESS"));
    	$this->assertEquals("failure", CommonFunctions::getCssClassForMessage("JUST_ANOTHER_Failure"));
    	$this->assertEquals("required", CommonFunctions::getCssClassForMessage("REQUIRED"));
    	$this->assertEquals("", CommonFunctions::getCssClassForMessage(""));
    	$this->assertEquals("", CommonFunctions::getCssClassForMessage(null));
    }

    /**
     * Test getTimeInHours() method
     */
    public function testGetTimeInHours() {

    	$seconds = 10102; // 10102s = 2.806111 hours

    	// Default: 2 decimals
    	$this->assertEquals("2.81", CommonFunctions::getTimeInHours($seconds));

    	// Zero decimals
    	$this->assertEquals("3", CommonFunctions::getTimeInHours($seconds, 0));

    	// One decimal
    	$this->assertEquals("2.8", CommonFunctions::getTimeInHours($seconds, 1));

    	// 3 decimals
    	$this->assertEquals("2.806", CommonFunctions::getTimeInHours($seconds, 3));

    	$seconds = 1500; // 25s = 0.416666667 hours
    	$this->assertEquals("0", CommonFunctions::getTimeInHours($seconds, 0));
    	$this->assertEquals("0.4", CommonFunctions::getTimeInHours($seconds, 1));
    	$this->assertEquals("0.42", CommonFunctions::getTimeInHours($seconds, 2));
    	$this->assertEquals("0.417", CommonFunctions::getTimeInHours($seconds, 3));
    }

    /**
     * Test isValidId() method
     */
    public function testIsValidId() {

		$this->assertFalse(CommonFunctions::IsValidId(-1));
		$this->assertFalse(CommonFunctions::IsValidId("-1"));

		$this->assertFalse(CommonFunctions::IsValidId(0));
		$this->assertFalse(CommonFunctions::IsValidId("0"));
		$this->assertFalse(CommonFunctions::IsValidId("000"));

		$this->assertFalse(CommonFunctions::IsValidId(null));
		$this->assertFalse(CommonFunctions::IsValidId(""));

		$this->assertFalse(CommonFunctions::IsValidId("asdf"));
		$this->assertFalse(CommonFunctions::IsValidId("'-+'"));

		$this->assertFalse(CommonFunctions::IsValidId("2.11"));
		$this->assertFalse(CommonFunctions::IsValidId("2.00"));
		$this->assertFalse(CommonFunctions::IsValidId("0.00"));
		$this->assertFalse(CommonFunctions::IsValidId("0.10"));

		// Try scientific notation. Shouldn't work
		$this->assertFalse(CommonFunctions::IsValidId("2e5"));

		// Valid numbers
		$this->assertTrue(CommonFunctions::IsValidId(100));
		$this->assertTrue(CommonFunctions::IsValidId("100"));

		$this->assertTrue(CommonFunctions::IsValidId(3));
		$this->assertTrue(CommonFunctions::IsValidId("03"));
		$this->assertTrue(CommonFunctions::IsValidId("031"));

    }
}

// Call CommonFunctionsTest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == "CommonFunctionsTest::main") {
    CommonFunctionsTest::main();
}
?>
