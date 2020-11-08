<?php
namespace App;


class Personnage {

  private $id,
          $degats,
          $nom;
  
  const CEST_MOI = 1;
  const PERSONNAGE_TUE = 2;
  const PERSONNAGE_FRAPPE = 3;


  public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
  }

    public function nomValide()
  {
    return !empty($this->_nom);
  }



  public function hydrate(array $donnees) {
    foreach ($donnees as $key => $value) {
      $method = 'set'.ucfirst($key);
      if(method_exists($this, $method)) {
        $this->$method($value);
      }
    }

  }

  
  public function frapper(Personnage $perso)
  {
    // Avant tout : vérifier qu'on ne se frappe pas soi-même.
    if($perso->getId() == $this->id) {
    // Si c'est le cas, on stoppe tout en renvoyant une valeur signifiant que le personnage ciblé est le personnage qui attaque. 
      return self::CEST_MOI;
    } else {
    // On indique au personnage frappé qu'il doit recevoir des dégâts.
      return $perso->recevoirDegats();
    }
     
    
  
  }
  
  public function recevoirDegats()
  {
    // On augmente de 5 les dégâts.
    $this->degats += 5;
    // Si on a 100 de dégâts ou plus, la méthode renverra une valeur signifiant que le personnage a été tué.
    if($this->degats > 100) {
      return self::PERSONNAGE_TUE;
    } else {
      return self::PERSONNAGE_FRAPPE;
    }
    // Sinon, elle renverra une valeur signifiant que le personnage a bien été frappé.
  }








  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

          /**
           * Get the value of degats
           */ 
          public function getDegats()
          {
                    return $this->degats;
          }

          /**
           * Set the value of degats
           *
           * @return  self
           */ 
          public function setDegats($degats)
          {
                    $this->degats = $degats;

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
}