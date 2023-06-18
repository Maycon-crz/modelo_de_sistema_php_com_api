<?php

define("ROOT", "http://localhost/PARA_GITHUB/modelo_de_sistema_php");

define("SITE", "#Modelo");

/**
 * @param string|null $uri
 * @return string
 */
function url(string $uri = null): string
{
    if ($uri) {
        return ROOT . "/{$uri}";
    }

    return ROOT;
}