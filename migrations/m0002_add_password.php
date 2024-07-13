<?php

class m0002_add_password {
    public function up() {
        $db = \app\core\Application::$app->db;
        $sql = "ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL";

        // Debug info
        echo "SQL za dodavanje kolone: $sql" . PHP_EOL;

        // Izvrši SQL upit
        $result = $db->pdo->exec($sql);

        // Provjeri rezultat izvršenja
        if ($result !== false) {
            echo 'Kolona password je uspješno dodana u tabelu users' . PHP_EOL;
        } else {
            echo 'Greška pri dodavanju kolone password u tabelu users' . PHP_EOL;
            // Debug informacije o greškama
            $errorInfo = $db->pdo->errorInfo();
            var_dump($errorInfo);
        }
    }

    public function down() {
        $db = \app\core\Application::$app->db;
        $sql = "ALTER TABLE users DROP COLUMN password";

        // Debug info
        echo "SQL za uklanjanje kolone: $sql" . PHP_EOL;

        // Izvrši SQL upit
        $result = $db->pdo->exec($sql);

        // Provjeri rezultat izvršenja
        if ($result !== false) {
            echo 'Kolona password je uspješno uklonjena iz tabele users' . PHP_EOL;
        } else {
            echo 'Greška pri uklanjanju kolone password iz tabele users' . PHP_EOL;
            // Debug informacije o greškama
            $errorInfo = $db->pdo->errorInfo();
            var_dump($errorInfo);
        }
    }
}
