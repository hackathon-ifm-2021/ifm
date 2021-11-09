<?php
/* connexion à la base de données */
class ConnectToDb()
{
	/* Il faut toujours qu'une classe possède une valeur par défaut quand on l'utilise */
	private $defaultValue = null; // l'attribut qui est la valeur de la classe 'ConnectToDb'

	private function __construct()
	{
		$this -> defaultValue = "mybestfriends"; // On affecte la valeur 'mybestfriends' à l'attribut ci-dessus...
	}

	protected function db_connect() // function qui fait la connexion à la base de données...
	{
		/* la fonction créée est protected ici car on va seulement l'utiliser dans toutes les autres 'classe' dans ce fichiers */
		try
		{
			$database = new PDO('mysql:host=localhost; dbname=artizone; charset=utf8', 'root', '', 
				array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
			return $database; // on return l'objet donnée par PDO qui est la connexion à la DB...
		}

		catch(PDOException $e)
		{
			die('Erreur:<br>'.$e -> getMessage()); // On kill ici les erreurs s'il y en a afin que PHP n'affiche pas notre code...
		}
	}
}

class InsertInformations()
{
	private $defaultValue = null;

	public function __construct(int $nombre)
	{
		$this -> defaultValue = $nombre;
	}

	public function remplir_identities(array $donnees)
	{
		try
		{
			$database = $this -> db_connect(); // connexion à la base de données...

				/* la requete SQL qui faire une insertion d'informations dans la table 'identities'...
				Cependant, on prépare la requete puisqu'on attend encore des données venant de l'utilisateur*/
			$requete = $database -> prepare('INSERT INTO identities(names, last_name, pseudo, birthday, phone1, phone2, addresses, email, passwords, id_categorie)
				VALUES(:names, :last_name, :pseudo, :birthday, :phone1, :phone2, :addresses, :email, :password, :id_categorie)'); 

			$requete -> execute($donnees);
		}

		catch(PDOException $e)
		{
			die('Erreur:<br>'.$e -> getMessage());
		}

		$database = null;
	}

	public function remplir
}


