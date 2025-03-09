<?php
require __DIR__ . '/vendor/autoload.php';

use phpseclib3\Net\SSH2;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['ssh_name'];
    $ip = $_POST['ssh_ip'];
    $password = $_POST['ssh_password'];

    // Simulation pour l'utilisateur "elisa@elisa"
    if ($name === "elisa@mail") {
        // Début du style terminal
        echo '<style>
            body, html {
                margin: 0;
                padding: 0;
                height: 100%;
                overflow: hidden;
                background-color: #1e1e1e;
            }
            .terminal {
                background-color: #1e1e1e;
                color: #00ff00;
                font-family: monospace;
                padding: 20px;
                white-space: pre-wrap;
                height: 100vh;
                width: 100vw;
                box-sizing: border-box;
                overflow-y: auto;
            }
        </style>';
        echo '<div class="terminal">';
        echo "Connexion à $ip avec l'utilisateur $name...\n";
        echo "Connexion SSH réussie.\n";
        echo "Exécution de la commande : ls -la\n";
        echo "----------------------------------------\n";
        echo "total 16\n";
        echo "drwxr-xr-x  4 elisa elisa 4096 Oct  1 12:34 .\n";
        echo "drwxr-xr-x 10 elisa elisa 4096 Oct  1 12:34 ..\n";
        echo "-rw-r--r--  1 elisa elisa  220 Oct  1 12:34 .bash_logout\n";
        echo "-rw-r--r--  1 elisa elisa 3771 Oct  1 12:34 .bashrc\n";
        echo "-rw-r--r--  1 elisa elisa  807 Oct  1 12:34 .profile\n";
        echo '</div>';
        exit; // Arrêter l'exécution du script après la simulation
    }

    // Connexion SSH réelle pour les autres utilisateurs
    $ssh = new SSH2($ip);

    if (!$ssh->isConnected()) {
        echo '<style>
            body, html {
                margin: 0;
                padding: 0;
                height: 100%;
                overflow: hidden;
                background-color: #1e1e1e;
            }
            .terminal {
                background-color: #1e1e1e;
                color: #ff0000;
                font-family: monospace;
                padding: 20px;
                white-space: pre-wrap;
                height: 100vh;
                width: 100vw;
                box-sizing: border-box;
                overflow-y: auto;
            }
        </style>';
        echo '<div class="terminal">';
        echo 'Impossible de se connecter au serveur SSH';
        echo '</div>';
        exit;
    }

    // Tenter de se connecter
    if (!$ssh->login($name, $password)) {
        echo '<style>
            body, html {
                margin: 0;
                padding: 0;
                height: 100%;
                overflow: hidden;
                background-color: #1e1e1e;
            }
            .terminal {
                background-color: #1e1e1e;
                color: #ff0000;
                font-family: monospace;
                padding: 20px;
                white-space: pre-wrap;
                height: 100vh;
                width: 100vw;
                box-sizing: border-box;
                overflow-y: auto;
            }
        </style>';
        echo '<div class="terminal">';
        echo 'Connexion SSH échouée : vérifiez le nom d\'utilisateur et le mot de passe';
        echo '</div>';
        exit;
    }

    // Afficher la sortie en style terminal
    echo '<style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            background-color: #1e1e1e;
        }
        .terminal {
            background-color: #1e1e1e;
            color: #00ff00;
            font-family: monospace;
            padding: 20px;
            white-space: pre-wrap;
            height: 100vh;
            width: 100vw;
            box-sizing: border-box;
            overflow-y: auto;
        }
    </style>';
    echo '<div class="terminal">';
    echo 'Connexion SSH réussie';
    echo "\n";
    echo $ssh->exec('ls -la');
    echo '</div>';
}
?>