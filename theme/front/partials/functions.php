<?php

function flattenMenu($menu)
{
    $result = [];

    foreach ($menu as $item) {
        $result[] = [
            'id'       => $item->id,
            'label'    => $item->label,
            'link'     => $item->link,
            'parent'   => $item->parent,
            'language' => $item->language,
        ];

        if (isset($item->child) && is_object($item->child)) {
            $childItems = flattenMenu($item->child);
            $result = array_merge($result, $childItems);
        }
    }

    return $result;
}

function simplify_menu($menu)
{
    $result = [];
    foreach ($menu as $item) {
        $new_item = [
            'label' => $item->label ?? '',
            'link'  => $item->link ?? '',
        ];
        if (!empty($item->child)) {
            $new_item['child'] = simplify_menu($item->child);
        }
        $result[] = $new_item;
    }
    return $result;
}


function wa_message($webname = "", $whatsapp = "", $package = "", $lang = "id")
{
    $webname = trim((string) $webname) !== '' ? $webname : 'Surya Bhumi Kahuri';

    if (trim((string) $package) === '') {
        $waText = strtolower($lang) === 'id'
            ? "Halo {$webname}, saya ingin berkonsultasi mengenai kebutuhan proyek MEP."
            : "Hello {$webname}, I would like to consult about an MEP project.";
    } elseif (strtolower($lang) === 'id') {
        $waText = "Halo {$webname}, saya tertarik dengan informasi layanan {$package}. Bisakah Anda memberikan informasi lebih lanjut mengenai lingkup pekerjaan, estimasi biaya, dan jadwal survei lokasi?";
    } else {
        $waText = "Hello {$webname}, I am interested in {$package}. Could you share more details about the scope, estimated cost, and site survey schedule?";
    }

    $whatsapp = preg_replace('/^0/', '62', preg_replace('/\D+/', '', (string) $whatsapp));

    return "https://wa.me/" . $whatsapp . "?text=" . rawurlencode($waText);
}
