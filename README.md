PROJET INITIAVILLE

- Création du projet avec Symfony new Initiaville2 -- full
- Installation de webpack encore
- passage en scss avec Enable Sass Loader
- npm run watch fonctionnel

- ajout balises pour stylesheets et scripts
- récupération code HTML "en dur"
- adaptation de ce code au sein des templates
- création du template _menu et _card modification des valeurs codées en dur par leur équivalent Doctrine/Twig

TODO

* 3 derniers articles proposés réalisés avec un findBy() dans le defautController avec 'createdAt" en paramètre de tri et 3 en limit.
* liste des catégories réalisée avec une boucle et une fonction catMenu() dans le default controller qui réalise une injection du repository Category et un render du menu pour l'inclure à l'appel du renderController en haut des pages qui le requiert
* réalisation du crud (make:crud) des category, réutilisation et adaptation du show pour y afficher les projets par category avec la méthode getProjects() sur category.
* réalisation du crud des city pour pour avoir accès au template index, adaptation du code en boucle for avec une mise en forme en card pour les villes.
* lien vers les villes réalisé avec un path dans le menu reliant vers index
* dans le lien "voir les projets" ajout du {{ path('city_show', {'name':city.name}) }} qui renvoie vers les projets d'une ville.
* Ajout d'un <h2> avec un bloc if ... else qui affiche un message qui indique le nombre de projets, ou au contraire l'absence de projets pour inciter les utilisateurs à participer.

* création du formulaire de login avec la commande make:auth
* modification du menu avec "if app.user" qui vérifie la connexion. On propose "Me connecter" si l'utilisateur n'est pas connecté, ou le dropdown menu si il est connecté avec le lien vers la deconnexion (app/logout) en bas.
* changement de la route de logout vers la homepage
* Au niveau du register, modification des labels en français avec typage en TextType::Class puis implémenatation de l'interface TextType dans les use et le form.
* Traduction en français du formulaire de login avec la même méthode.
* Dissimulation du bouton "Ajouter un projet" sous un bloc if app.user qui vérifie la connexion d'un utilisateur
* relocalisation du render menu controller dansle fichier base et suppression de la ligne duppliquée dans les autres pages.