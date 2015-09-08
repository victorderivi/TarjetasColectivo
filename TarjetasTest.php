<?php

  class TarjetasTest extends PHPUnit_Framework_TestCase {

    public function testrecarga()
    {
      $bondi1 = new colectivo("Semtur","K",11);
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
      $bondi1 = new colectivo("Semtur","K",11);
      $tarj = new tarjetaComun;
      $tarj->recarga(196);
      $this->assertEquals(230,$tarj->saldo());
    }
    public function testrecargamed()
    {
      $bondi1 = new colectivo("Semtur","K",11);
      $tarjmed = new tarjetaMedioBoleto;
      $this->assertEquals(230,$tarjmed->recarga(196));
    }
    public function testpagarboletomed()
    {
      $bondi1 = new colectivo("Semtur","K",11);
      $tarjmed = new tarjetaMedioBoleto;
      $tarjmed->recarga(196);
      $this->assertEquals(5.75,$tarjmed->pagarBoleto($bondi1,1441300000));
    }

    public function testsaldomed()
    {
      $bondi1 = new colectivo("Semtur","K",11);
      $tarjmed = new tarjetaMedioBoleto;
      $tarjmed->recarga(196);
      $this->assertEquals(230,$tarjmed->saldo());
    }
  }
 ?>
