<?php
class BoostrapTest extends \PHPUnit_Framework_TestCase
{
    public function testNotice() {
		ob_start();
		$foo++;
		$this->assertEquals('', ob_get_clean());
	}

	public function testWarning() {
		ob_start();
		$bar[] = true;
		$this->assertEquals('', ob_get_clean());
	}

	public function testStrict() {
		ob_start();
		eval('
			class A{ function foo($bar = "baz"){ } }
			class B extends A{ function foo(){ } }
			$C = new B();
		');
		$this->assertEquals('', ob_get_clean());
	}

	public function testDeprecated() {
		if (!function_exists('ereg')) {
			$this->markTestSkipped('ereg() not available');
			return;
		}
		ob_start();
		ereg("fo+", "foobar");
		$this->assertEquals('', ob_get_clean());
	}

	public function testUserErrors() {
		ob_start();

		trigger_error('Test user notice', E_USER_NOTICE);
		$this->assertEquals('', ob_get_contents());
		ob_clean();

		trigger_error('Test user warning', E_USER_WARNING);
		$this->assertEquals('', ob_get_contents());
		ob_clean();

		trigger_error('Test user deprecated', E_USER_DEPRECATED);
		$this->assertEquals('', ob_get_clean());
	}
}
