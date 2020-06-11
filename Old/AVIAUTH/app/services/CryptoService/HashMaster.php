<?php
//Done by Minut Mihai Dimitrie
class HashMaster
{

    public static function master_hash_password($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function master_match_password_hash($password, $hash)
    {
        return password_verify($password, $hash);
    }
}
