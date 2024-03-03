<?php
final class Database {
  private $_DB;

  public function __construct() {
    $this->_DB = __DIR__ . "/../csv/utilisateurs.csv";
  }

  public function getAllUtilisateurs(): array {
    $utilisateurs = [];
    if (($connexion = fopen($this->_DB, 'r')) !== FALSE) {
        // Read the first row, which typically contains headers, and ignore it
        fgetcsv($connexion, 1000, ",");

        while (($user = fgetcsv($connexion, 1000, ",")) !== FALSE) {
            // Check if the row has the expected number of elements
            if (count($user) == 6) {
                $utilisateurs[] = new User($user[1], $user[2], $user[3], $user[4], $user[5], $user[0]);
            } else {
                // Handle incorrect data format or missing fields
                // You may log an error or skip the current row
            }
        }

        fclose($connexion);
    }
    return $utilisateurs;
}


  public function getThisUtilisateurById(int $id): User|bool {
    if (($connexion = fopen($this->_DB, 'r')) !== FALSE) {
      while (($userData = fgetcsv($connexion, 1000, ",")) !== FALSE) {
        if ((int)$userData[0] === $id) {
          fclose($connexion);
          return new User($userData[1], $userData[2], $userData[3], $userData[4], $userData[5], $userData[0]);
        }
      }
      fclose($connexion);
    }
    return false;
  }

  public function getThisUtilisateurByMail(string $mail): User|bool {
    if (($connexion = fopen($this->_DB, 'r')) !== FALSE) {
      while (($userData = fgetcsv($connexion, 1000, ",")) !== FALSE) {
        if ($userData[3] === $mail) {
          fclose($connexion);
          return new User($userData[1], $userData[2], $userData[3], $userData[4], $userData[5], $userData[0]);
        }
      }
      fclose($connexion);
    }
    return false;
  }

  public function saveUtilisateur(User $user): bool {
    if (($connexion = fopen($this->_DB, 'ab')) !== FALSE) {
      $retour = fputcsv($connexion, $user->getObjectToArray());
      fclose($connexion);
      return $retour !== false;
    }
    return false;
  }

  public function deleteThisUser(int $IdUser): bool {
    if ($this->getThisUtilisateurById($IdUser)) {
      $utilisateurs = $this->getAllUtilisateurs();
      if (($connexion = fopen($this->_DB, 'wb')) !== FALSE) {
        foreach ($utilisateurs as $utilisateur) {
          if ($utilisateur->getId() !== $IdUser) {
            fputcsv($connexion, $utilisateur->getObjectToArray());
          }
        }
        fclose($connexion);
        return true;
      }
    }
    return false;
  }
}

?>
