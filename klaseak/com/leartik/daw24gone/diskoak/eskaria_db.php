<?php
namespace com\leartik\daw24gone\diskoak;

use com\leartik\daw24gone\diskoak\Eskaria;
use com\leartik\daw24gone\diskoak\Bezeroa;
use PDO;
use Exception;

require_once __DIR__ . '/../../../../../database.php';

class EskariaDB {

    public static function selectEskaria($id) {
        try {
            $db = Database::getConnection();
            
            $sql = "SELECT e.*, b.izena, b.abizena, b.helbidea, b.herria, b.posta_kodea, b.email 
                    FROM eskariak e 
                    JOIN bezeroak b ON e.id_bezero = b.id 
                    WHERE e.id = :id";
            
            $stmt = $db->prepare($sql);
            $stmt->execute([':id' => $id]);
            
            if ($erregistroa = $stmt->fetch()) {
                $eskaria = new Eskaria();
                $eskaria->setId($erregistroa['id']);
                $eskaria->setData($erregistroa['data']);
                $eskaria->setEgoera($erregistroa['egoera']);

                $bezeroa = new Bezeroa();
                $bezeroa->setIzena($erregistroa['izena']);
                $bezeroa->setAbizena($erregistroa['abizena']);
                $bezeroa->setHelbidea($erregistroa['helbidea']);
                $bezeroa->setHerria($erregistroa['herria']);
                $bezeroa->setPostaKodea($erregistroa['posta_kodea']);
                $bezeroa->setEmaila($erregistroa['email']);

                $eskaria->setBezeroa($bezeroa);
                return $eskaria;
            }
            return null;
        } catch (Exception $e) {
            return null;
        }
    }

    public static function selectEskariak() {
        try {
            $db = Database::getConnection();

            $sql = "SELECT e.id AS eskaria_id, e.data, b.* FROM eskariak e 
                    INNER JOIN bezeroak b ON e.id_bezero = b.id 
                    ORDER BY e.data ASC";

            $erregistroak = $db->query($sql);
            $eskariak = array();

            while ($lerroa = $erregistroak->fetch()) {
                $eskaria = new Eskaria();
                $eskaria->setId($lerroa['eskaria_id']);
                $eskaria->setData($lerroa['data']);
                
                $bezeroa = new Bezeroa();
                $bezeroa->setIzena($lerroa['izena']);
                $bezeroa->setAbizena($lerroa['abizena']);
                $bezeroa->setEmaila($lerroa['email']);
                
                $eskaria->setBezeroa($bezeroa);
                $eskariak[] = $eskaria;
            }
            return $eskariak;
        } catch (Exception $e) {
            return array();
        }
    }

    public static function insertEskaria($eskaria) {
        try {
            $db = Database::getConnection();

            $bezeroa = $eskaria->getBezeroa();
            $sqlBezeroa = "INSERT INTO bezeroak (izena, abizena, helbidea, herria, posta_kodea, email) 
                           VALUES (:izena, :abizena, :helbidea, :herria, :pk, :email)";
            
            $stmtBez = $db->prepare($sqlBezeroa);
            $stmtBez->execute([
                ':izena' => $bezeroa->getIzena(),
                ':abizena' => $bezeroa->getAbizena(),
                ':helbidea' => $bezeroa->getHelbidea(),
                ':herria' => $bezeroa->getHerria(),
                ':pk' => $bezeroa->getPostaKodea(),
                ':email' => $bezeroa->getEmaila()
            ]);
            
            $bezero_id = $db->lastInsertId();

            $sqlEskaria = "INSERT INTO eskariak (data, id_bezero, egoera) VALUES (:data, :id_bezero, 'Prestatzen')";
            $stmtEsk = $db->prepare($sqlEskaria);
            $stmtEsk->execute([
                ':data' => $eskaria->getData(),
                ':id_bezero' => $bezero_id
            ]);
            
            $eskaria_id = $db->lastInsertId();

            $sqlDetailea = "INSERT INTO eskari_detaileak (id_eskaria, id_diskoa, kopurua, prezioa_unitateko) VALUES (:eskaria_id, :d_id, :kop, :prez)";
            $stmtDet = $db->prepare($sqlDetailea);

            foreach ($eskaria->getDetaileak() as $detailea) {
                $stmtDet->execute([
                    ':eskaria_id' => $eskaria_id,
                    ':d_id' => $detailea->getDiskoa()->getId(),
                    ':kop' => $detailea->getKopurua(),
                    ':prez' => $detailea->getDiskoa()->getPrezioa()
                ]);
            }

            return $eskaria_id;

        } catch (Exception $e) {
            die("DATU-BASEKO ERROREA: " . $e->getMessage());
        }
    }

    public static function deleteEskaria($id) {
        try {
            $db = Database::getConnection();
            $sql = "DELETE FROM eskariak WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount(); 
        } catch (Exception $e) {
            return 0;
        }
    }
}
?>