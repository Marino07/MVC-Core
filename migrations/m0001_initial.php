<?php
class m0001_initial {
    public function up() {
        $db = \app\core\Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            firstname VARCHAR(100) NOT NULL,
            lastname VARCHAR(100) NOT NULL,
            status TINYINT NOT NULL DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";

        // Debug info
        echo "SQL za kreiranje tabele: $sql" . PHP_EOL;

        // Izvrši SQL upit
        $result = $db->pdo->exec($sql);

        // Provjeri rezultat izvršenja
        if ($result !== false) {
            echo 'Tabela users je uspješno kreirana' . PHP_EOL;
        } else {
            echo 'Greška pri kreiranju tabele users' . PHP_EOL;
            // Debug informacije o greškama
            $errorInfo = $db->pdo->errorInfo();
            var_dump($errorInfo);
        }
    }

    public function down() {
        $db = \app\core\Application::$app->db;
        $sql = "DROP TABLE IF EXISTS users";

        // Debug info
        echo "SQL za brisanje tabele: $sql" . PHP_EOL;

        // Izvrši SQL upit
        $result = $db->pdo->exec($sql);

        // Provjeri rezultat izvršenja
        if ($result !== false) {
            echo 'Tabela users je uspješno obrisana' . PHP_EOL;
        } else {
            echo 'Greška pri brisanju tabele users' . PHP_EOL;
            // Debug informacije o greškama
            $errorInfo = $db->pdo->errorInfo();
            var_dump($errorInfo);
        }
    }
    public function hello(){
        echo 'tusam';
    }
}


