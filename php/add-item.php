<?php

require_once(__DIR__ . '/components/sql.php');
require_once(__DIR__ . '/components/format_str.php');
require_once(__DIR__ . '/components/items_functions.php');

$img_path = '';
$img_path = record_file(get_last_id_number($conn, $all_items), $img_path);
insert_item($conn, $insert_sql, $img_path);
