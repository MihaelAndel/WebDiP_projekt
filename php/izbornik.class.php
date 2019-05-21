<?php

class Izbornik
{

    function __construct()
    { }

    function OdrediIzbornik()
    {
        if (isset($_SESSION["korisnik"])) {

            switch ($_SESSION["tip"]) {
                case 1:
                    $this->PrikaziAdministrator();
                    break;
                case 2:
                    $this->PrikaziModerator();
                    break;
                case 3:
                    $this->PrikaziRegistrirani();
                    break;
            }
        } else {
            $this->PrikaziNeregistrirani();
        }
    }

    function PrikaziNeregistrirani()
    { }

    function PrikaziRegistrirani()
    { }

    function PrikaziModerator()
    { }

    function PrikaziAdministrator()
    { }
}
