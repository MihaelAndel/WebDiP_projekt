<?php
require_once '../php/baza.class.php';
header("Content-type:application/xml");

$lokacija = $_GET["lokacija"];
$sql = "";
if ($lokacija === "default") {
    $sql = "SELECT oprema.id_oprema as opid, oprema.naziv as onaziv, oprema.nabavna_cijena, "
        . "oprema.najamna_cijena, lokacija.id_lokacija as lid, lokacija.naziv as lnaziv, vrsta_opreme.naziv_vrste as vnaziv "
        . "FROM oprema, lokacija, vrsta_opreme "
        . "WHERE oprema.lokacija_id = lokacija.id_lokacija AND oprema.vrsta_opreme_id = vrsta_opreme.id_vrsta_opreme";
} else {
    $sql = "SELECT oprema.id_oprema as opid, oprema.naziv as onaziv, oprema.nabavna_cijena, "
        . "oprema.najamna_cijena, lokacija.id_lokacija as lid, lokacija.naziv as lnaziv, vrsta_opreme.naziv_vrste as vnaziv "
        . "FROM oprema, lokacija, vrsta_opreme "
        . "WHERE oprema.lokacija_id = lokacija.id_lokacija "
        . "AND oprema.vrsta_opreme_id = vrsta_opreme.id_vrsta_opreme "
        . "AND lokacija.id_lokacija = {$lokacija}";
}

$baza = new Baza();
$baza->spojiDB();
$rezultat = $baza->selectDB($sql);
$header = "<?xml version='1.0'?><popis-opreme></popis-opreme>";
$xml = new SimpleXMLElement($header);

while ($red = mysqli_fetch_assoc($rezultat)) {
    $novaOprema = $xml->addChild("oprema");
    $nazivOpreme = $novaOprema->addChild("naziv", $red["onaziv"]);
    $nazivOpreme->addAttribute('poveznica', '../oprema_lokacije/oprema.php?oprema='.$red["opid"]);
    $tipOpreme = $novaOprema->addChild("tip", $red["vnaziv"]);
    $nabavaOprema = $novaOprema->addChild("nabava", $red["nabavna_cijena"]);
    $najamOprema = $novaOprema->addChild("najam", $red["najamna_cijena"]);
    $lokacijaOprema = $novaOprema->addChild("lokacija", $red["lnaziv"]);
    $lokacijaOprema->addAttribute("poveznica", "../oprema_lokacije/lokacija.php?lokacija=".$red["lid"]);
}
echo $xml->asXML();
$baza->zatvoriDB();
