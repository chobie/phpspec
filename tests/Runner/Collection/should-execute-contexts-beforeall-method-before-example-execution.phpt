--TEST--
Should execute the Contexts beforeAll() method before running any Examples
--FILE--
<?php
require_once dirname(__FILE__) . '/../../_setup.inc';

class describeEmptyArray extends PHPSpec_Context
{
    public function beforeAll(){ echo 'beforeAll ran'; }
    public function itShouldBeEmpty(){  }
}

class Mock extends PHPSpec_Runner_Example
{
    public function execute() {echo 'spec ran';}
}

class Mock2 extends PHPSpec_Runner_Result
{
    public function __construct(){}
}


$collection = new PHPSpec_Runner_Collection(new describeEmptyArray, 'Mock');
$collection->execute(new Mock2);

?>
--EXPECT--
beforeAll ranspec ran