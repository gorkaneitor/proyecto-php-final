<?php

namespace com\leartik\daw24gone\diskoak;

use PDO;
use Exception;

require_once __DIR__ . '/../../../../../Database.php';

class DiskoaDB
{
    public static function selectDiskoak()
    {
        try {
            $db = Database::getConnection();
            $erregistroak = $db->query("SELECT * FROM diskoak");
            $diskoak = array();
            while ($erregistroa = $erregistroak->fetch()) {
                $diskoa = new Diskoa();
                $diskoa->setId($erregistroa['id']);
                $diskoa->setId_kategoria($erregistroa['id_kategoria']);
                $diskoa->setTitulua($erregistroa['titulua']);
                $diskoa->setKanta_kop($erregistroa['kanta_kop']);
                $diskoa->setPrezioa($erregistroa['prezioa']);
                $diskoa->setDeskontua($erregistroa['deskontua']);
                $diskoa->setNobedadea($erregistroa['nobedadea']);
                $diskoak[] = $diskoa;
            }
            return $diskoak;
        } catch (Exception $e) {
            echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }


    public static function selectDiskoakByKategoria($id)
    {
        try {
            $db = Database::getConnection();
            $erregistroak = $db->query("SELECT * FROM diskoak WHERE id_kategoria =" . $id);
            $diskoak = array();
            while ($erregistroa = $erregistroak->fetch()) {
                $diskoa = new Diskoa();
                $diskoa->setId($erregistroa['id']);
                $diskoa->setId_kategoria($erregistroa['id_kategoria']);
                $diskoa->setTitulua($erregistroa['titulua']);
                $diskoa->setKanta_kop($erregistroa['kanta_kop']);
                $diskoa->setPrezioa($erregistroa['prezioa']);
                $diskoa->setDeskontua($erregistroa['deskontua']);
                $diskoa->setNobedadea($erregistroa['nobedadea']);
                $diskoak[] = $diskoa;
            }
            return $diskoak;
        } catch (Exception $e) {
            echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }


    public static function selectDiskoa($id)
    {
        try {
            $db = Database::getConnection();
            $erregistroak = $db->query("SELECT * FROM diskoak WHERE id =" . $id);
            $diskoa = null;
            while ($erregistroa = $erregistroak->fetch()) {
                $diskoa = new Diskoa();
                $diskoa->setId($erregistroa['id']);
                $diskoa->setId_kategoria($erregistroa['id_kategoria']);
                $diskoa->setTitulua($erregistroa['titulua']);
                $diskoa->setKanta_kop($erregistroa['kanta_kop']);
                $diskoa->setPrezioa($erregistroa['prezioa']);
                $diskoa->setDeskontua($erregistroa['deskontua']);
                $diskoa->setNobedadea($erregistroa['nobedadea']);
            }
            return $diskoa;
        } catch (Exception $e) {
            echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }


    public static function selectDeskontuak()
    {
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\denda\\diskoak.db");
            $erregistroak = $db->query("SELECT * FROM diskoak WHERE deskontua > 0");
            $diskoak = array();
            while ($erregistroa = $erregistroak->fetch()) {
                $diskoa = new Diskoa();
                $diskoa->setId($erregistroa['id']);
                $diskoa->setId_kategoria($erregistroa['id_kategoria']);
                $diskoa->setTitulua($erregistroa['titulua']);
                $diskoa->setKanta_kop($erregistroa['kanta_kop']);
                $diskoa->setPrezioa($erregistroa['prezioa']);
                $diskoa->setDeskontua($erregistroa['deskontua']);
                $diskoa->setNobedadea($erregistroa['nobedadea']);
                $diskoak[] = $diskoa;
            }
            return $diskoak;
        } catch (Exception $e) {
            echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }


    public static function selectNobedadeak()
    {
        try {
            $db = Database::getConnection();
            $erregistroak = $db->query("SELECT * FROM diskoak WHERE nobedadea = 1");
            $diskoak = array();
            while ($erregistroa = $erregistroak->fetch()) {
                $diskoa = new Diskoa();
                $diskoa->setId($erregistroa['id']);
                $diskoa->setId_kategoria($erregistroa['id_kategoria']);
                $diskoa->setTitulua($erregistroa['titulua']);
                $diskoa->setKanta_kop($erregistroa['kanta_kop']);
                $diskoa->setPrezioa($erregistroa['prezioa']);
                $diskoa->setDeskontua($erregistroa['deskontua']);
                $diskoa->setNobedadea($erregistroa['nobedadea']);
                $diskoak[] = $diskoa;
            }
            return $diskoak;
        } catch (Exception $e) {
            echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }


    public static function insertDiskoa($diskoa)
    {
        try {
            $db = Database::getConnection();
            $sql = "insert into diskoak(id_kategoria,titulua,kanta_kop,prezioa,deskontua,nobedadea) values";
            $sql = $sql . "('" . $diskoa->getId_kategoria() . "'";
            $sql = $sql . ",'" . $diskoa->getTitulua() . "'";
            $sql = $sql . ",'" . $diskoa->getKanta_kop() . "'";
            $sql = $sql . ",'" . $diskoa->getPrezioa() . "'";
            $sql = $sql . ",'" . $diskoa->getDeskontua() . "'";
            $sql = $sql . ",'" . $diskoa->getNobedadea() . "')";
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }


    public static function aldatuDiskoa($diskoa)
    {
        try {
            $db = Database::getConnection();
            $sql = "UPDATE diskoak 
            SET id_kategoria = '" . $diskoa->getId_kategoria() . "', 
                titulua = '" . $diskoa->getTitulua() . "', 
                kanta_kop = '" . $diskoa->getKanta_kop() . "',
                prezioa = '" . $diskoa->getPrezioa() . "', 
                deskontua = '" . $diskoa->getDeskontua() . "', 
                nobedadea = '" . $diskoa->getNobedadea() . "'
                WHERE id = " . $diskoa->getId();
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }


    public static function ezabatuDiskoa($diskoa)
    {
        try {
            $db = Database::getConnection();
            $sql = "DELETE FROM diskoak WHERE id = '" . $diskoa->getId() . "'";
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }
}
