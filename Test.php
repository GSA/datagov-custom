<?php
/**
 * Created by IntelliJ IDEA.
 * User: alexandr.perfilov
 * Date: 12/18/14
 * Time: 3:20 PM
 */

include_once(dirname(dirname(dirname(dirname(__FILE__)))).'/wp-config.php');
//include_once(dirname(__FILE__).'/datagov-custom.php');

class Test extends PHPUnit_Framework_TestCase {

    public function test_add_login_logout_link()
    {
        $loginlink = add_login_logout_link('', false);
        $this->assertTrue(strpos($loginlink, 'id="login"'));
        $this->assertTrue(strpos($loginlink, 'index.php'));
    }
}
