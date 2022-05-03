<?php
class User
{
    // variables d'instance
    private $idUtilisateur;
    private $nom;
    private $prenom;
    private $noTel;
    private $pseudo;
    private $motDePasse;
    private $email;
    private $dateNaissance;
    private $permis;
    private $statut;

    /**
     * Get the value of idUtilisateur
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * Set the value of idUtilisateur
     *
     * @return  self
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of noTel
     */
    public function getNoTel()
    {
        return $this->noTel;
    }

    /**
     * Set the value of noTel
     *
     * @return  self
     */
    public function setNoTel($noTel)
    {
        $this->noTel = $noTel;

        return $this;
    }

    /**
     * Get the value of pseudo
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of motDePasse
     */
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * Set the value of motDePasse
     *
     * @return  self
     */
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of dateNaissance
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     *
     * @return  self
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get the value of permis
     */
    public function getPermis()
    {
        return $this->permis;
    }

    /**
     * Set the value of permis
     *
     * @return  self
     */
    public function setPermis($permis)
    {
        $this->permis = $permis;

        return $this;
    }

    /**
     * Get the value of statut
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    public static function Crypter($mdpclair)
    {
        return MD5($mdpclair);
    }

    public static function addUser(User $User)
    {
        if (user::checkExistantUser($User)) {
            return "utilisateur existant";
        } else {
            $Txt_Email = $User->getTxt_Email();
            $Nm_First = $User->getNm_First();
            $Nm_Last = $User->getNm_Last();
            $No_Tel = $User->getNo_Tel();
            $passHash = "f507c2000ef8b02db5eeb5f1722e948b";
            $passSalt = "SuperCfpt2020-2021";
            $cd_Role = "user";
            $req = MonPdo::getInstance()->prepare('INSERT INTO Tbl_User(Txt_Email,Nm_First,Nm_Last,No_Tel,Txt_Password_Hash,Txt_Password_Salt,Cd_Role) VALUES(:mail,:nm_first,:nm_last,:no_tel,:txt_password_hash,:txt_password_salt,:cd_role)');
            $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
            $req->bindParam(':mail', $Txt_Email);
            $req->bindParam(':nm_first', $Nm_First);
            $req->bindParam(':nm_last', $Nm_Last);
            $req->bindParam(':no_tel', $No_Tel);
            $req->bindParam(':txt_password_hash', $passHash);
            $req->bindParam(':txt_password_salt', $passSalt);
            $req->bindParam(':cd_role', $cd_Role);
            $req->execute();
            return MonPdo::getInstance()->lastInsertId();
        }
    }

    public static function getIdUserByEmail(string $email)
    {
        $sql = MonPdo::getInstance()->prepare('SELECT * from Tbl_User where Txt_Email = :email');
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $sql->bindValue(":email", $email);
        $sql->execute();
        $user = $sql->fetch();
        if ($user != false) {
            if (User::checkExistantUser($user)) {
                return $user->getId_User();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function checkExistantUser(User $user)
    {
        $email = $user->getTxt_Email();
        $req = MonPdo::getInstance()->query('SELECT Txt_Email from Tbl_User');
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $req->execute();
        $users = $req->fetchAll();

        foreach ($users as $userExistant) {
            if ($userExistant->getTxt_Email() == $email) {
                return true;
            }
        }
        return false;
    }


    public static function CheckConnect(User $user)
    {
        $username = $user->getTxt_Email();
        $password = $user->getTxt_Password_Hash();
        $req = MonPdo::getInstance()->query('SELECT Txt_Email, Txt_Password_Hash from loan_mgt.tbl_user');
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $req->execute();
        $users = $req->fetchAll();

        foreach ($users as $user) {
            if ($user->getTxt_Email() == $username && $user->getTxt_Password_Hash() == $password) {
                return true;
            }
        }
    }

    public static function getAllUsers()
    {
        $sql = MonPdo::getInstance()->query('SELECT * FROM Tbl_User');
        $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $sql->execute();
        return $sql->fetchAll();
    }
}
