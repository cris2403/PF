<?php
function list_items($connect) {
    $items = array();

    $sql = "SELECT * FROM inventory";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $item = new stdClass();
            $item->id = $row["i_id"];
            $item->name = $row["nome"];
            $item->image = $row["img"];
            $item->price = $row["preco"];
            $item->trailer = $row["trailer"];
            $items[] = $item;
        }
    }

    return $items;
}
?>