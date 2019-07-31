<?php
$s = 1;
$e = 2000;
for ($i = $s; $i <= $e; $i++) {
    $sql  = 'INSERT INTO `tdc`.`office_buildings` (`id`, `alert_id`, `priority`, `visible`, `office_category_id`, `name`, `address`, `area_id`, `lat`, `lng`, `station1_id`, `station2_id`, `station3_id`, `access`, `complated`, `height`, `total_floor`, `elevator`, `lift`, `description`, `around`, `proprietary`, `is_top_visible`, `nearby`, `recommend`, `popluar`, `newly`, `add_information1`, `add_information2`, `add_information3`, `add_information4`, `add_information5`, `together`, `canteen`, `store`, `cafe`, `shared_pantry`, `restaurant`, `fitness`, `parking`, `security`, `meeting_room`, `internet`, `air_conditioner`, `electricity`, `water_supply`, `telephone`, `management_cost`, `facilities`, `next_update`, `created`, `modified`) VALUES ';
    $sql .= "(NULL, '1', '1', '1', '" . rand(1, 3) . "', '事務所" . $i . "', 'タイの住所タイ" . $i . "丁目', '1', ";
    $sql .= "'13.7" . sprintf('%04d', rand(3001, 7999)) . "', '100." . sprintf('%05d', rand(47001, 53999)) . "'";
    $sql .= ", '1', NULL, NULL, 'パヤタイエリアから徒歩" . $i . "分', '" . rand(1980, 2020) . "', '" . rand(1, 100) . "." . rand(1, 999) . "'";
    $sql .= ", '" . rand(2, 20) . "', '" . rand(2, 20) . "', '" . rand(2, 20) . "'";
    $sql .= ", 'テストデータの" . $i . "件目です。', '徒歩" . $i . "分にスーパーあり', '管理会社" . $i . "番', 1";
    $sql .= ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1);
    $sql .= ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1);
    $sql .= ", '入居企業" . $i . "番'";
    $sql .= ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1);
    $sql .= ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1);
    $sql .= ", 'エアコン" . $i . "番', '電気" . $i . "番', '水道" . $i . "番', '電話" . $i . "番', '" . rand(25000, 30000) . "', 'その他付帯設備" . $i . "番', now(), now(), now());";
    echo $sql . "\n";
}


