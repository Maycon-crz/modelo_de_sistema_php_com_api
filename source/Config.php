<?php

define("ROOT", "http://localhost/HOMOLOGACAO_WEB/modelo_de_sistema_php_com_api");

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