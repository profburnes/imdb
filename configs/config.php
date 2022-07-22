<?php
    define("KEY","379d3e30a1810200a3cdbe7b2fa2b914");
    define("IMG","https://www.themoviedb.org/t/p/w220_and_h330_face/");

    function formatarData($data) {
        setlocale(LC_TIME, 'pt_BR', '', '', 'portuguese');
        return utf8_encode(strftime('%d de %B de %Y', strtotime($data)));
    }
    