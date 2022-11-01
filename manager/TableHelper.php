<?php
require_once('UrlHelper.php');
class TableHelper {

    public static function sort($name, $label, $url) {
        $sort = $url['sort'] ?? null;
        $direction = $url['dir'] ?? null;
        $icon = "";
        if ($sort === $name) {
            $icon = $direction === 'asc' ? "^" : 'v';

        }
        $result = UrlHelper::withParams($url, ['sort' => $name, 'dir' => $direction === 'asc' && $sort === $name ? 'desc' : 'asc']);
        return <<<HTML
        <a href="?$result">$label $icon</a>
        HTML;
    }
}