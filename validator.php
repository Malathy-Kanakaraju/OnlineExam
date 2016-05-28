<?php

class validator {

    public function sanitize($a) {
        $a = trim($a);
        $a = stripslashes($a);
        $a = htmlspecialchars($a);
        $a = mysql_real_escape_string($a);
        return $a;
    }
}
?>