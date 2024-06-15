<?php
class NoweAuto {
    protected $model;
    protected $cenaEuro;
    protected $kursEuroPLN;

    public function __construct($model, $cenaEuro, $kursEuroPLN) {
        $this->model = $model;
        $this->cenaEuro = $cenaEuro;
        $this->kursEuroPLN = $kursEuroPLN;
    }

    public function obliczCene() {
        return $this->cenaEuro * $this->kursEuroPLN;
    }

    public function __toString() {
        return "Model: {$this->model}, Cena w PLN: " . $this->obliczCene();
    }
}

class AutoZDodatkami extends NoweAuto {
    private $alarm;
    private $radio;
    private $klimatyzacja;

    public function __construct($model, $cenaEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja) {
        parent::__construct($model, $cenaEuro, $kursEuroPLN);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->klimatyzacja = $klimatyzacja;
    }

    public function obliczCene() {
        $podstawowaCena = parent::obliczCene();
        return $podstawowaCena + ($this->alarm + $this->radio + $this->klimatyzacja) * $this->kursEuroPLN;
    }
}

class Ubezpieczenie extends AutoZDodatkami {
    private $procentUbezpieczenia;
    private $lataPosiadania;

    public function __construct($model, $cenaEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja, $procentUbezpieczenia, $lataPosiadania) {
        parent::__construct($model, $cenaEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja);
        $this->procentUbezpieczenia = $procentUbezpieczenia;
        $this->lataPosiadania = $lataPosiadania;
    }

    public function obliczCene() {
        $wartoscAuta = parent::obliczCene();
        return $this->procentUbezpieczenia * ($wartoscAuta * ((100 - $this->lataPosiadania) / 100));
    }
}


$auto = new Ubezpieczenie('Audi A4', 30000, 4.5, 1000, 500, 2000, 0.05, 2);
echo "Cena auta z ubezpieczeniem w PLN: " . $auto->obliczCene();

?>