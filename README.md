# Exercice 1
Systeme de gestion de bibliotheque avec calcul de frais de retard et algorithme de recherche

## Recherche a faire:
#### algoritme de donne pour faire de la recherche efficace
## algorithme de recherche auto  completion
- distance leveinschtene
- fuzzy peach theorie
#### algoritme de navigation



### files a faire
##  --formulaire(index)--
gere la date  et la date de retour du livre choisi
- [ ] faire le formulaire
- [ ] trouver le nombre de jour entre la date demprunt et la date de retour
- [ ] tester 
## -- livre model --
user-define type
- [x] donner les attributs necessaire
- [x] creer un public constructor
- [x] creer des getters
- [ ] creer le Tostring() necessaire
- [ ] tester

## -- location --
class qui prends des livres et sassure qu'ils sont disponible(si nous avons le temps)
- [x] necessaire prendre plusieurs livres
- [ ] creer le Tostring() necessaire
- [ ] optionnel regarder si le livre est dispo

## -- gestion des locations --
- [x] rajoute ou creer un fichier xml 
- [ ] tester 
## -- gestion des retour --
- [x] lit a travers le fichiers xml 
- [x] regarde le jour de retour et rajoute les frais si necessair
- [ ] tester 
## -- barre de recherche --
- [ ]implimentation dun algorithm de recherche
- [ ] creation de la barre de recherche visuellement

# Exercice 2
Creer un programme qui calcule le salaire net d’un employee en tenant compte des bonus et des penalites, et resout des suites arithmetiques pour les augmentations salariales.

## recherche a faire
- suite arithmetique
  $$ u_n = u_0 + n \cdot r $$
### files a faire

## -- formulaire de salaire --
L’utilisateur entre le salaire de base, le nombre d’heures supplementaires et les absences.
- [ ]creation du formulaire

## -- gestion des salaire --
- [ ] retourne le hedomadaire salaire
- [ ] gestion des bonus et des impots
- [ ] gestion de la suite arithmetique


# Exercice 3
Creer un systeme de gestion de stock qui suit les niveaux d’inventaire et genere des alertes lorsque le stock est faible, et inclut un calcul base sur la table de multiplication pour gerer les quantit´es de produits en stock.

## recherche a faire
pourquoi devoir implimenter un table de multiplication

### files a faire
## -- formulaire commande --
- [ ] formulaire pour achater des produits avec leur quantite

## -- inventaire --
- [ ] detient l'inventaire
- [ ] afficher la liste
## -- gestion d'inventaire --
- [ ]  il observe le nombre de produit de stock
- [ ]  il gere les seuil critique
- [ ]  il achete et alerte les utilisateur
- [ ]  utilise un tableau de multiplication


# Exercice 4
Creer un simulateur de gestion de projet ou l’utilisateur peut ajouter des taches avec des dates de debut et de fin. Le programme doit afficher un calendrier avec les taches et optimiser le planning en utilisant des algorithmes de recherche pour trouver les creneaux disponibles.

## recherche a faire
- algoritme de recherche pour gestion des creneaux
### files a faire
## -- projet --
user define type
- [ ] creation

## -- horaire -- 
gere les projets
- [ ] tableaux qui prends des projet
## -- formualair --
- [ ] permet de ajouter un projet
- [ ] montre lhoraire
## -- gestion des creneaux horaire
gere les disponibilite base sur la proximite et disponibilte
- [ ] recherchetemps disponible
- [ ] rajoute une date de debut et une date de fin au projet
