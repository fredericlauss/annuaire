<?php

class UrlHelper {

    public static function withParam(string $param, $value) {
        return http_build_query(array_merge($_GET, [$param => $value]));
    }
}