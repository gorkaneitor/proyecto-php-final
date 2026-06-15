<?php

namespace com\leartik\daw24gone\diskoak;

use PDO;
use Exception;

require_once __DIR__ . '/../../../../../Database.php';

class KategoriaDB
{
    public static function selectKategoriak()
    {
        try {
            $db = Database::getConnection();
            $erregistroak = $db->query("SELECT * FROM kategoriak");
            $kategoriak = array();
            while ($erregistroa = $erregistroak->fetch()) {
                $kategoria = new Kategoria();
                $kategoria->setId($erregistroa['id']);
                $kategoria->setIzena($erregistroa['izena']);
                $kategoria->setDeskribapena($erregistroa['deskribapena']);
                $kategoriak[] = $kategoria;
            }
            return $kategoriak;
        } catch (Exception $e) {
            echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }


    public static function selectKategoria($id)
    {
        try {
            $db = Database::getConnection();
            $erregistroak = $db->query("SELECT * FROM kategoriak WHERE id =" . $id);
            $kategoria = null;
            while ($erregistroa = $erregistroak->fetch()) {
                $kategoria = new Kategoria();
                $kategoria->setId($erregistroa['id']);
                $kategoria->setIzena($erregistroa['izena']);
                $kategoria->setDeskribapena($erregistroa['deskribapena']);
            }
            return $kategoria;
        } catch (Exception $e) {
            echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }


    public static function insertKategoria($kategoria)
    {
        try {
            $db = Database::getConnection();
            $sql = "insert into kategoriak(izena,deskribapena) values";
            $sql = $sql . "('" . $kategoria->getIzena() . "'";
            $sql = $sql . ",'" . $kategoria->getDeskribapena() . "')";
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }


    public static function aldatuKategoria($kategoria)
    {
        try {
            $db = Database::getConnection();
            $sql = "UPDATE kategoriak 
            SET izena = '" . $kategoria->getIzena() . "', 
                deskribapena = '" . $kategoria->getDeskribapena() . "'
                WHERE id = " . $kategoria->getId();
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }


    public static function ezabatuKategoria($kategoria)
    {
        try {
            $db = Database::getConnection();
            $sql = "DELETE FROM kategoriak WHERE id = '" . $kategoria->getId() . "'";
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }
}
