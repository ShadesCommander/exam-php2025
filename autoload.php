<?php
/**
 * Autoload personnalisé pour charger automatiquement les classes du dossier /App
 */

spl_autoload_register(function ($className) {
    // Définir le chemin racine de l'application
    $baseDir = __DIR__ . '/App/';

    // Liste des sous-dossiers où chercher les classes
    $folders = ['config', 'entity', 'repository'];

    $found = false;

    foreach ($folders as $folder) {
        $file = $baseDir . $folder . '/' . $className . '.php';

        if (file_exists($file)) {
            require_once $file;
            $found = true;
            break;
        }
    }

    // Si la classe n'a pas été trouvée, on affiche une erreur explicite
    if (!$found) {
        if (ini_get('display_errors')) {
            echo "<div style='background:#330000;color:#fff;padding:10px;border:1px solid #990000;margin:10px 0;'>";
            echo "<strong>Erreur d'autoload :</strong><br>";
            echo "Impossible de charger la classe <strong>{$className}</strong>.<br>";
            echo "Fichiers recherchés dans les dossiers suivants : <br><ul>";
            foreach ($folders as $folder) {
                echo "<li>{$baseDir}{$folder}/{$className}.php</li>";
            }
            echo "</ul></div>";
        }
    }
});
