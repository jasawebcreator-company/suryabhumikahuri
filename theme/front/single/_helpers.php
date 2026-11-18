<?php
if (!function_exists('single_addon')) {
    function single_addon($data, $key)
    {
        foreach ($data->addon_contents ?? [] as $addon) {
            if (($addon->custom_field_1 ?? '') === $key) {
                return $addon;
            }
        }
        return null;
    }
}

if (!function_exists('single_rows')) {
    function single_rows($addon)
    {
        if (empty($addon)) {
            return [];
        }
        $rows = $addon->custom_fields ?? [];
        if (is_string($rows)) {
            $rows = json_decode($rows) ?: [];
        }
        return is_array($rows) ? $rows : [];
    }
}

if (!function_exists('single_paragraphs')) {
    function single_paragraphs($text)
    {
        $text = trim(str_replace('`', '', strip_tags((string) $text)));
        $lines = preg_split('/\R+/', $text);
        return array_values(array_filter(array_map('trim', $lines), 'strlen'));
    }
}

if (!function_exists('single_title')) {
    function single_title($text, $accent_words = 2)
    {
        $text = trim((string) $text);
        $tags = '<span><em><strong><b><i><br>';
        if ($text === '' || $text !== strip_tags($text)) {
            return strip_tags($text, $tags);
        }
        $words = preg_split('/\s+/', $text);
        if (count($words) < 2) {
            return htmlspecialchars($text);
        }
        $cut = max(1, count($words) - $accent_words);
        return htmlspecialchars(implode(' ', array_slice($words, 0, $cut))) . ' <span>' . htmlspecialchars(implode(' ', array_slice($words, $cut))) . '</span>';
    }
}

if (!function_exists('single_scope')) {
    function single_scope($data)
    {
        foreach ((array) ($data->addon_contents ?? []) as $addon) {
            if (strtoupper(trim((string) ($addon->custom_field_1 ?? ''))) !== 'LINGKUP PEKERJAAN') {
                continue;
            }

            $rows = single_rows($addon);

            usort($rows, function ($a, $b) {
                return (int) ($a->sort ?? 0) <=> (int) ($b->sort ?? 0);
            });

            $items = [];

            foreach ($rows as $row) {
                $text = trim((string) ($row->name ?? ($row->cells[0]->value ?? '')));

                if ($text !== '') {
                    $items[] = $text;
                }
            }

            return ['title' => trim((string) ($addon->name ?? '')), 'items' => $items];
        }

        return ['title' => '', 'items' => []];
    }
}
