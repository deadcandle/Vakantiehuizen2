
<?php
    
class VakantieHuis {
    public $personen;
    public $huis;
    public $id;
    public $omschrijving;
    public $prijs;

    public function __construct($personen, $huis, $omschrijving, $prijs) {
        $this->id = random_int(10, 10000);
        $this->personen = $personen;
        $this->huis = $huis;
        $this->omschrijving = $omschrijving;
        $this->prijs = $prijs;
    }
}

?>