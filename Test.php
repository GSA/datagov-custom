<?php

include_once(dirname(dirname(dirname(dirname(__FILE__)))).'/wp-config.php');

class Test extends PHPUnit_Framework_TestCase {

    public function test_add_login_logout_link()
    {
        $loginlink = add_login_logout_link('', false);
        $this->assertTrue(strpos($loginlink, 'id="login"'));
        $this->assertTrue(strpos($loginlink, 'index.php'));
    }
}
