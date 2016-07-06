<?php

function limpiar_acentos($s) {
    $s = ereg_replace("[aáàâãª]", "a", $s);
    $s = ereg_replace("[AÁÀÂÃ]", "A", $s);
    $s = ereg_replace("[IÍÌÎ]", "I", $s);
    $s = ereg_replace("[iíìî]", "i", $s);
    $s = ereg_replace("[ueéèê]", "e", $s);
    $s = ereg_replace("[ÉÈÊ]", "E", $s);
    $s = ereg_replace("[uoóòôõº]", "o", $s);
    $s = ereg_replace("[OÓÒÔÕ]", "O", $s);
    $s = ereg_replace("[uúùû]", "u", $s);
    $s = ereg_replace("[UÚÙÛ]", "U", $s);
    $s = str_replace("ç", "c", $s);
    $s = str_replace("Ç", "C", $s);
    $s = str_replace("[ñ]", "n", $s);
    $s = str_replace("[Ñ]", "N", $s);

    return $s;
}

function ReemplazarLetras($s) {
    $s = str_replace("á", "a", $s);
    $s = str_replace("é", "e", $s);
    $s = str_replace("í", "i", $s);
    $s = str_replace("ó", "o", $s);
    $s = str_replace("ú", "u", $s);
    $s = str_replace("ñ", "n", $s);
    $s = str_replace("h", "g", $s);
    $s = str_replace("k", "c", $s);
    $s = str_replace("v", "b", $s);
    $s = str_replace("b", "b", $s);
    $s = str_replace("z", "s", $s);

    $s = str_replace("Á", "a", $s);
    $s = str_replace("É", "e", $s);
    $s = str_replace("Í", "i", $s);
    $s = str_replace("Ó", "o", $s);
    $s = str_replace("Ú", "u", $s);
    $s = str_replace("Ñ", "n", $s);
    $s = str_replace("H", "g", $s);
    $s = str_replace("k", "c", $s);
    $s = str_replace("V", "b", $s);
    $s = str_replace("B", "b", $s);
    $s = str_replace("Z", "z", $s);

    return $s;
}

function Buscador($palabra) {
    $palabra = ReemplazarLetras($palabra);
    $busca = array(
        "a",
        "e",
        "i",
        "o",
        "u",
        "Ñ",
        "ñ",
        "c",
        "g",
        "b",
        "s",
        "A",
        "E",
        "I",
        "O",
        "U",
        "S",
        "@"
    );
    $reemplaza = array(
        "[aàáâãäåAÀÁÂÃÄÅ]",
        "[eèéêëEÈÉÊË]",
        "[iìíîïIÌÍÎÏ]",
        "[oòóôõöIÒÓÔÕÖ]",
        "[uùúûüUÙÚÛÜ]",
        "[nñÑ]",
        "[nñÑ]",
        "[cCkK]",
        "[gGhH]",
        "[vVbB]",
        "[zZsSCC]",
        "[aàáâãäåAÀÁÂÃÄÅ]",
        "[eèéêëEÈÉÊË]",
        "[iìíîïIÌÍÎÏ]",
        "[oòóôõöÒÓÔÕÖ]",
        "[uùúûüUÙÚÛÜ]",
        "[zZsSCC]",
        "[aàáâãäåAÀÁÂÃÄÅoòóôõöIÒÓÔÕÖ]"
    );
    $text = str_replace($busca, $reemplaza, $palabra);
    return $text;
}

?>