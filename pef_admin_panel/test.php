<?php /*define('SALT_LENGTH', 9);
    function generateHash($plainText, $salt = null) {
        if ($salt === null) {
            $salt = substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
        } else {
            $salt = substr($salt, 0, SALT_LENGTH);
        }
        return $salt . sha1($salt . $plainText);
    }
$pass_word = generateHash("masala00foundation168");*/

// superadmin
echo md5("admin@159");
echo "<br>";
//pulari-admin
echo md5("pef07#LotusGarden");

?>