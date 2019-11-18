<?php

function getAllPlanned()
{
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM planning";
    $query = $db->prepare($sql);
    $query->execute();

    $db = null;

    return $query->fetchAll();
}
