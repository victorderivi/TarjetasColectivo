<?php

  class TarjetasTest extends PHPUnit_Framework_TestCase {
    public function testpagarboleto()
    {
      $bondi1 = new tarjetaComun("Semtur","K",11);
      $this->assertEquals("Semtur","K",11, $bondi->);
    }
    public function testrecarga()
    {

    }
    public function testsaldo()
    {

    }
  }
 ?>
