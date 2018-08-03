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

    public function testcheckWinner()
    {
        $result = WinnerChecker::checkWinner(WinnerChecker::getWinPossibilities(""), new Player1("ahmed"));
        $this->assertEquals(false, $result);
    }

}