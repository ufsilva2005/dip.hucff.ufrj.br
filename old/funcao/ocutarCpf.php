<?php
    $cpf ="011.726.807-01";
    $pattern     = "/^([\w_]{2})(.+)([\w_]{2}-)/u";
    echo "<br>" . $cpf;

    function ocultar($matches)
        {
            return $matches[1] .
            str_repeat("*", strlen($matches[2])) .
            $matches[3];
        }

    $cpf = preg_replace_callback($pattern, 'ocultar', $cpf);
    echo "<br>" . $cpf;
?>