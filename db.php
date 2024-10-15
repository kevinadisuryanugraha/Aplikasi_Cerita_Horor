<?php

function connect_db()
{
    $db = new SQLite3('apk_cerita_horor.db');
    return $db;
}

function buat_table()
{
    $db = connect_db();
    $db->exec("CREATE TABLE IF NOT EXISTS ceritaku (
        id_cerita INTEGER PRIMARY KEY AUTOINCREMENT,
        foto TEXT NOT NULL,
        judul_cerita TEXT NOT NULL,
        deskripsi_cerita TEXT NOT NULL,
        created_at DATE NOT NULL
    )");
}

buat_table();
