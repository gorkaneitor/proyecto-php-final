<?php 
    
    namespace com\leartik\daw24gone\diskoak;

    use com\leartik\daw24gone\diskoak\mezua;
    use PDO;
    use Exception;

    class MezuakDB{
        public static function selectMezuak(){
            try{
                $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka01\\denda.db");
                $erregistroak = $db->query("SELECT * FROM mezuak");
                $mezuak = array();
                while($erregistroa = $erregistroak->fetch()){
                    $mezua = new Mezua();
                    $mezua ->setId($erregistroa['id']);
                    $mezua ->setIzena($erregistroa['izena']);
                    $mezua ->setEmail($erregistroa['email']);
                    $mezua ->setMezua($erregistroa['mezua']);
                    $mezua ->setErantzunda($erregistroa['erantzunda']);
                    $mezua ->setSortzeData($erregistroa['mezu_data']);
                    $mezuak[] = $mezua;
                }
                return $mezuak;
            }catch(Exception $e){
                echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
                return null;
            }
        }
        public static function selectMezua($id){
            try{
                $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka01\\denda.db");
                $erregistroak = $db->query("SELECT * FROM mezuak WHERE id =". $id);
                $mezua = null;
                while($erregistroa = $erregistroak->fetch()){
                    $mezua = new Mezua();
                    $mezua ->setId($erregistroa['id']);
                    $mezua ->setIzena($erregistroa['izena']);
                    $mezua ->setEmail($erregistroa['email']);
                    $mezua ->setMezua($erregistroa['mezua']);
                    $mezua ->setErantzunda($erregistroa['erantzunda']);
                    $mezua ->setSortzeData($erregistroa['mezu_data']);
                }
                return $mezua;
            }catch(Exception $e){
                echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
                return null;
            }
        }
        public static function insertMezua($mezua){
            try{
                $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka01\\denda.db");
                $sql = "INSERT INTO mezuak (izena, email, mezua, erantzunda, mezu_data) VALUES";
                $sql = $sql . "('". $mezua->getIzena() . "'";
                $sql = $sql . ",'". $mezua->getEmail() . "'";
                $sql = $sql . ",'". $mezua->getMezua() . "'";
                $sql = $sql . ",'". $mezua->getErantzunda() . "'";
                $sql = $sql . ",'". $mezua->getSortzeData() . "')";
                $emaitza = $db-> exec($sql);
                return $emaitza;
            }catch(Exception $e){
                echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
                return 0;
            }
        }
        
        public static function aldatuMezua($mezua) {
            try{
                $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka01\\denda.db");
                
                $sql = "UPDATE mezuak SET " . 
                    "izena = '" . $mezua->getIzena() . "', " . 
                    "email = '" . $mezua->getEmail() . "', " . 
                    "mezua = '" . $mezua->getMezua() . "'," . 
                    "erantzunda = '" . $mezua->getErantzunda() . "'," . 
                    "mezu_data = '" . $mezua->getSortzeData() . "' " . 
                    "WHERE id = " . $mezua->getId(); 
                
                $emaitza = $db->exec($sql);
                return $emaitza;
            }catch(Exception $e){
                echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
                return 0;
            }
}
        
public static function ezabatuMezua($mezua){
    try{
        $db = new PDO("sqlite:C:\\xampp\\htdocs\\Erronka01\\denda.db");
        $sql = "DELETE FROM mezuak WHERE id = " . $mezua->getId();
        $emaitza = $db->exec($sql);
        return $emaitza;  
    }catch(Exception $e){
        echo "<p>Salbuespenak: " . $e->getMessage() . "</p>\n";
        return 0;
    }
}
}
    ?> 
