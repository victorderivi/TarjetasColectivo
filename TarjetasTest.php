<?php

  class TarjetasTest extends PHPUnit_Framework_TestCase {
<<<<<<< HEAD

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
      $this->assertEquals(5.80,$tarj->pagarBoleto($bondi1,1441300000));
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
      $this->assertEquals(2.90,$tarjmed->pagarBoleto($bondi1,1441300000));
    }

    public function testsaldomed()
    {
      $bondi1 = new colectivo("Semtur","K",11);
      $tarjmed = new tarjetaMedioBoleto;
      $tarjmed->recarga(196);
      $this->assertEquals(230,$tarjmed->saldo());
=======
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

>>>>>>> f4b3e8de94d68ec3873dad10257fe34691893f58
    }
  }
 ?>
