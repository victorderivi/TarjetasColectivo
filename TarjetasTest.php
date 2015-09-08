<?php
include 'Tarjetas.php';

  class TarjetasTest extends PHPUnit_Framework_TestCase {

    public function testrecarga()
    {
      $tarj = new tarjetaComun;
      $this->assertEquals(230,$tarj->recarga(196));
    }
    public function testpagarboleto()
    {
      $bondi1 = new colectivo("Semtur","K",11);
      $tarj = new tarjetaComun;
      $tarj->recarga(196);
      $this->assertEquals(5.75,$tarj->pagarBoleto($bondi1,1441300000));
    }

    public function testsaldo()
    {
      $tarj = new tarjetaComun;
      $tarj->recarga(196);
      $this->assertEquals(230,$tarj->saldo());
    }
  }
 ?>
