<?php
// Check if SQLite3 extension is enabled
if (class_exists('SQLite3')) {
    echo "SQLite3 extension is enabled.";
} else {
    echo "SQLite3 extension is not enabled.";
}
?>
