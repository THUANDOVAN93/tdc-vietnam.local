<?php
$s = 1;
$e = 2000;
for ($i = $s; $i <= $e; $i++) {
    $sql  = 'INSERT INTO `residence_buildings` (`alert_id`, `priority`, `visible`, `residence_category_id`, `area_id`, `name`, `address`, `lat`, `lng`, `station1_id`, `station2_id`, `station3_id`, `access`, `complated`, `total_floor`, `total_room`, `description`, `around`, `is_top_visible`, `nearby`, `recommend`, `popluar`, `newly`, `add_information1`, `add_information2`, `add_information3`, `add_information4`, `add_information5`, `pool`, `gym`, `sauna`, `tennis_court`, `children_playground`, `laundry`, `store`, `kitchen`, `washer`, `maid_room`, `keep_pet`, `security`, `parking`, `internet`, `satellite_broadcasting`, `service`, `electricity`, `water_supply`, `telephone`, `cookstove`, `management_cost`, `facilities`, `next_update`, `created`, `modified`) VALUES';
    $sql .= "(1, 1, 1, " . rand(1, 4) . ", 1, '住居物件" . $i . "', 'お住所', 13.7" . sprintf('%04d', rand(3001, 7999)) . ", 100." . sprintf('%05d', rand(47001, 53999)) . ", 1, NULL, NULL, 'アクセス', " . rand(1980, 2020) . ", " . rand(2, 20) . ", " . rand(10, 150) . ", 'ぶせ', 'しゅへ', 1, " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", " . rand(0, 1) . ", 'さび', 'でんき', 'すいど', 'でんわ', 'こんろ', " . rand(5, 1500) . ", 'そのふた', now(), now(), now());";
    echo $sql . "\n";
}

