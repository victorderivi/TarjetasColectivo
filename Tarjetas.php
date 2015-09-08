<?php
/*se asume que el número interno de colectivo es único en cada empresa*/
class tarjetaComun{
  private $viajes=array();/*array con los viajes realizados*/
  private $n;/*cantidad de viajes*/
  private $saldo;
  public function __construct(){
		$this->saldo = 0;
    $this->n = 0;
	}
  public function pagarBoleto($colectivo,$horario){
    if($this->n>0){/*si ya existe un viaje anterior*/
      if (($horario-3600)<=$this->viajes[$this->n-1]->horario && $this->viajes[$this->n-1]->colectivo->empresa == $colectivo->empresa && $this->viajes[$this->n-1]->colectivo->num != $colectivo->num{
        if ($this->saldo >= 1.90){
          $this->saldo = $this->saldo - 1.90;
          $this->viajes[$this->n] = new viaje($colectivo,1.90,$horario);
          $this->n++;
          return True;
        }else{
          return False;
        }
      }
    }/*si no existe viaje anterior, no nos fijamos en el trasbordo*/
    if ($this->saldo >= 5.75){
      $this->saldo = $this->saldo - 5.75;
      $this->viajes[$this->n] = new viaje($colectivo,5.75,$horario);
      $this->n++;
      return True;
    }else{
      return False;
    }
  }
  public function recarga($monto){
    if ($monto > 0){
      if ($monto == 196){
        $this->saldo=$this->saldo+230;
        return True;
      }
      if ($monto == 386){
        $this->saldo=$this->saldo+460;
        return True;
      }
      $this->saldo=$this->saldo+$monto;
    }
    return False;
  }
  public function saldo(){
    echo "Su saldo es de: $".$this->saldo."<br/>";
    return $this->saldo;
  }
  public function viajesRealizados(){
    foreach($this->viajes as &$a){
      echo date("d-m-Y (H:i:s)", $a->horario)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Empresa: ".$a->colectivo->empresa."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Línea: ".$a->colectivo->linea."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interno: ".$a->colectivo->num."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monto: ".$a->monto."<br/>";
    }
  }
}
class tarjetaMedioBoleto{
  private $viajes=array();/*array con los viajes realizados*/
  private $n;/*cantidad de viajes*/
  private $saldo;
  public function __construct(){
		$this->saldo = 0;
    $this->n = 0;
	}
  public function pagarBoleto($colectivo,$horario){
    if($this->n>0){/*si ya existe un viaje anterior*/
      if (($horario-3600)<=$this->viajes[$this->n-1]->horario && $this->viajes[$this->n-1]->colectivo->empresa == $colectivo->empresa && $this->viajes[$this->n-1]->colectivo->num != $colectivo->num){
        if ($this->saldo >= 0.96){
          $this->saldo = $this->saldo - 0.96;
          $this->viajes[$this->n] = new viaje($colectivo,0.96,$horario);
          $this->n++;
          return True;
        }else{
          return False;
        }
      }
    }/*si no existe viaje anterior, no nos fijamos en el trasbordo*/
    if ($this->saldo >= 2.9){
      $this->saldo = $this->saldo - 2.9;
      $this->viajes[$this->n] = new viaje($colectivo,2.9,$horario);
      $this->n++;
      return True;
    }else{
      return False;
    }
  }
  public function recarga($monto){
    if ($monto > 0){
      if ($monto == 196){
        $this->saldo=$this->saldo+230;
        return True;
      }
      if ($monto == 386){
        $this->saldo=$this->saldo+460;
        return True;
      }
      $this->saldo=$this->saldo+$monto;
    }
    return False;
  }
  public function saldo(){
    echo "Su saldo es de: $".$this->saldo."<br/>";
    return $this->saldo;
  }
  public function viajesRealizados(){
    foreach($this->viajes as &$a){
      echo date("d-m-Y (H:i:s)", $a->horario)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Empresa: ".$a->colectivo->empresa."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Línea: ".$a->colectivo->linea."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Interno: ".$a->colectivo->num."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monto: ".$a->monto."<br/>";
    }
  }
}
class viaje{
  public $horario;
  public $colectivo;
  public $monto;
  public function __construct($colectivo, $monto, $horario){
    $this->colectivo = $colectivo;
    $this->monto = $monto;
		$this->horario = $horario;
	}
}
class colectivo{
  public $empresa;
  public $linea;
  public $num;
  public function __construct($empresa,$linea,$num){
    $this->empresa = $empresa;
    $this->linea = $linea;
    $this->num = $num;
  }
}
$bondi1 = new colectivo("Semtur","K",11);
$bondi2 = new colectivo("Semtur","K",22);
$bondi3 = new colectivo("Mixta",146,11);
$bondi4 = new colectivo("Mixta",145,32);
$tarj = new tarjetaComun;
$tarjmed = new tarjetaMedioBoleto;
$tarj->pagarBoleto($bondi1,1441300000);/*no hay saldo, $0*/
$tarj->recarga(196);/*se recargan $230*/
$tarj->pagarBoleto($bondi1,1441300000);/*boleto normal, 230-5.75=224.25*/
$tarj->pagarBoleto($bondi1,1441300001);/*boleto normal, paga 2 boletos en el mismo bondi, 224.25-5.75=218.5*/
$tarj->pagarBoleto($bondi2,1441300002);/*trasbordo, 218.5-1.9=216.6*/
$tarj->pagarBoleto($bondi2,1441300003);/*boleto normal, paga 2 boletos en el mismo bondi, 216.6-5.75=210.85*/
$tarj->pagarBoleto($bondi3,1441300004);/*boleto normal, es una empresa distinta, 210.85-5.75=205.1*/
$tarj->pagarBoleto($bondi4,1441303605);/*boleto normal, pasó más de 1 hora, 205.1-5.75=199.35*/
$tarj->saldo();
$tarj->viajesRealizados();
$tarjmed->recarga(50);/*se cargan 50*/
$tarjmed->pagarBoleto($bondi1,1441300000);/*boleto normal, 50-2.9=47.1*/
$tarjmed->pagarBoleto($bondi1,1441300001);/*boleto normal, paga 2 boletos en el mismo bondi, 47.1-2.9=44.2*/
$tarjmed->pagarBoleto($bondi2,1441300002);/*trasbordo, 44.2-0.96=43.24*/
$tarjmed->saldo();
$tarjmed->viajesRealizados();
/*date("H",$horario)>=6*/
?>
