<?php
namespace App\Test;

use App\DataModel\Player1;
use App\DataModel\WinnerChecker;

class WinnerCheckerTest extends Testable
{
    protected function setUp()
    {
        $this->testCase = new WinnerChecker();
    }

    protected function tearDown()
    {
        $this->testCase = NULL;
    }

    public function testAdd()
    {
        $result = $this->testCase->checkWinner(new Player1());
        $this->assertEquals(true, $result);
    }

}