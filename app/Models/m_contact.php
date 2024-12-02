<?php

namespace App\Models;

use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Model;

class m_contact extends Model
{
    function envoie($infoContact){
        // connexion a la base
        $db = db_connect();
        try {
            $db->table('contact')->insert($infoContact);
            return $db->affectedRows();
        } catch (DatabaseException $e) {
            $errorCode = $e->getCode();
            return $errorCode;
        }
    }
}