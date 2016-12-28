<?php
    require_once("Model.php");

    class ProduitModel extends Model
    {
		public function getInformationsProduit($numProduit)
		{
			$requete = "select numProduit, libelle, description, prix, sourcePetit, sourceMoyen, sourceGrand from produit p join image i on p.numImage = i.numImage where numProduit = ?;";
			$resultat = $this->executerRequete($requete);
			$resultat = $resultat->fetch();
			
			return $resultat;
		}
		
		# Pas terminée
		public function ajouterProduit($libelle, $description, $typeProduit, $prix, $sourcePetit, $sourceMoyen, $sourceGrand, $compatibilite = null)
		{
			/*$resultat = $this->executerRequete('insert into image values(?, ?, ?)', array($sourcePetit, $sourceMoyen, $sourceGrand));
			$image = $this->executerRequete('select numImage from image where sourcePetit')*/
			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			/* !!!!! Comment ajouter les images pour un produit (contraintes clefs étrangères) ? !!!!! */
			/* !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
			
			# On considère qu'on a le $numImage
			$resultat = $this->executerRequete('insert into produit (libelle,description,typeProduit,prix,numImage)
								values (?,?,?,?,?)', array($libelle, $description, $typeProduit, $prix, $numImage));
			
			
			if($compatibilite == null)
			{
				
			}
		}
		
		public function supprimerProduit($numProduit)
		{
			$produit = self::getInformationsProduit($numProduit);
			$produit = $produit->fetch();
			$prix = floatval((-1)*floatval($produit["prix"]));
			
			$requete = "update produit set prix = :prix where numProduit = :numProduit";
			$params = array(
					'prix' => $prix,
					'numProduit' => $numProduit
					);
			$resultat = $this->executerRequete($requete, $params);
			$resultat = $resultat->fetch();
			
			# Si on supprime plus d'1 produit, on dit qu'il y a eu une erreur
			if($resultat == 1) return true;
			else return false;
		}
		
		public function modifierProduit($numProduit)
		{
			
		}
		
		public function ajouterCompatibilite()
		{
			
		}
		
		/* ============= Fonctions sur la carte des produits ============= */
		
		public function recupererCarte($tailleImage)
		{
			switch($tailleImage)
			{
			# Oui je me suis tapé un petit kiff,
			# on peut accorder en genre ou non le paramètre :-)
				case "grand":
				case "grande":
					$requete = "select numProduit, libelle, description, sourceGrand, prix from produit p join image i on p.numImage = i.numImage;";
				break;
			
				case "petit":
				case "petite":
				$requete = "select numProduit, libelle, description, sourcePetit, prix from produit p join image i on p.numImage = i.numImage;";
			
				case "moyen":
				case "moyenne":
				default:
				$requete = "select numProduit, libelle, description, sourceMoyen, prix from produit p join image i on p.numImage = i.numImage;";
			}
			$resultat = $this->executerRequete($requete);

			return $resultat;
		}
    }