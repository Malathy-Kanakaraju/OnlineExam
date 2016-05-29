<?php

class validator {

    public function sanitize($a) {
        $a = trim($a);
        $a = stripslashes($a);
        $a = htmlspecialchars($a);
        return $a;
    }
}
?>