<?php

class UrlHelper {

    public static function withParam($data, string $param, $value) {
        return http_build_query(array_merge($data, [$param => $value]));
    }

    public static function withParams($data, array $params) {
        return http_build_query(array_merge($data, $params));
    }
}