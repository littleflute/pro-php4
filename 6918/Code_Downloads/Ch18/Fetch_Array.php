<?php

//Fetch_Array.php

$conn = pg_connect("dbname=library user=postgres") or
        die(pg_errormessage());
$sql = "SELECT ISBN, book_title FROM title";
$result = pg_exec($conn, $sql);
$row_counter = 0;

while ($row = @pg_fetch_array($result, $row_counter, PGSQL_NUM)) {
    echo("ISBN:  " . htmlspecialchars($row[0]) . ",  Title:  " . htmlspecialchars($row[1]) . "<br>");
    $row_counter++;
}

pg_freeresult($result);
pg_close($conn);
?>
