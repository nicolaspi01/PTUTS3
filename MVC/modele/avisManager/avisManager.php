<?php
    require("../Model.php");

    public class avisManager extends Model
    {
        //Ajouter un avis
        public function addAvis($commentaire, $pseudo, $note)
        {
            //Test si l'utilisateur n'a pas deja donné un avis
            $doublon = $this->executerRequete("select numUser from avis where numUser in (select pseudo
                                                                                           from utilisateur
                                                                                           where pseudo = ?)", $array($pseudo);)
            $doublon = $doublon->fetchAll(PDO::FETCH_ASSOC);
            if($doublon == false)
            {
                //Si que des espaces on mets a null
                if($commentaire == " ")
                {
                    $commentaire == null;
                }
                //On recupere le NumUser associé
                $user = $this->getNumUser($pseudo);

                $resultat = $this->executerRequete('insert into avis (Numuser, avis, note, date, dateDernierVote)
                                        values(?, ?, ?, CURRENT_DATE(), null)', array($user['NumUser'], $commentaire, $note));

                //Correspond a l'erreur du trigger: avisSansCommande
                if($resultat->errorCode() == '12000')
                {
                    return false;
                }
                return true;
            }
        }

        //Modifier avis
        public function modifAvis($commentaire, $pseudo, $note)
        {
            //On recupere le NumUser associé
            $user = $this->getNumUser($pseudo);

            //Si que des espaces on mets a null
            if($commentaire == " ")
            {
                $commentaire == null;
            }

            $resultat = $this->executerRequete('update avis
                                                set commentaire= ?, note = ?
                                                where numUser= ?', array($commentaire, $note, $user));

            return $resultat;
        }

        //L'utilisateur vote
        public function addVote($numAvis, $vote, $pseudo)
        {
            //On recupere le NumUser associé
            $user = $this->getNumUser($pseudo);

            $resultat = $this->executerRequete('insert into vote(numAvis, numUser, vote)
                                               values(?, ?, ?)', array($numAvis, $user, $vote));

            //Correspond au trigger voteSonAvis
            if($resultat->errorCode() == '15000')
            {
                return false;
            }
            //Correspond au trigger voteAvisSansCommentaire
            else if($resultat->errorCode() == '11000')
            {
                return false;
            }
            //Correspond au trigger voteParAvisParUtilisateur
            else if($resultat->errorCode() == '13000')
            {
                return false;
            }
            return true;
        }

        //Permet de recuperer le NumUser à partir du pseudo
        public function getNumUser($pseudo)
        {
            $resultat = $this->executerRequete('select numUser from utilisateur where pseudo = ?', array($pseudo));
            $resultat->fetch();

            return $resultat;
        }


    }
 ?>
