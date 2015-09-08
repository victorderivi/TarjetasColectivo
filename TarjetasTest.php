<?php

  class TarjetasTest extends PHPUnit_Framework_TestCase {

    public function testrecarga()
    {
      $tarj = new Tarjetas.php\tarjetaComun;
      $this->assertEquals(230,$tarj->recarga(196));
    }
    public function testpagarboleto()
    {
      $bondi1 = new Tarjetas.php\colectivo("Semtur","K",11);
      $tarj = new Tarjetas.php\tarjetaComun;
      $tarj->recarga(196);
      $this->assertEquals(5.75,$tarj->pagarBoleto($bondi1,1441300000));
    }

    public function testsaldo()
    {
      $tarj = new Tarjetas.php\tarjetaComun;
      $tarj->recarga(196);
      $this->assertEquals(230,$tarj->saldo());
    }
  }
 ?>
