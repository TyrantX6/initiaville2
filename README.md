PROJET INITIAVILLE

- Création du projet avec Symfony new Initiaville2 -- full
- Installation de webpack encore
- Passage en scss avec Enable Sass Loader
- Npm run watch fonctionnel

- Création des Entity dans le terminal
- Création des fixtures avec le make:fixtures
- Vérification des infos rentrées dans la base de données. Connexion OK !

- Ajout balises pour stylesheets et scripts
- Récupération code HTML "en dur"
- Adaptation de ce code au sein des templates
- Création du template _menu et _card, modification des valeurs codées en dur par leur équivalent Doctrine/Twig

TODO

___ Partie affichages dans les vues ___

* 3 derniers articles proposés réalisés avec un findBy() dans le defautController avec 'createdAt" en paramètre de tri et 3 en limit.
* Liste des catégories réalisée avec une boucle et une fonction catMenu() dans le default controller qui réalise une injection du repository Category et un render du menu pour l'inclure à l'appel du renderController en haut des pages qui le requiert(EDIT : Ajouté dans le base.html.twig au final)
* Réalisation du crud (make:crud) des Category, réutilisation et adaptation du show pour y afficher les projets par category avec la méthode getProjects() sur category.
* réalisation du crud des city pour avoir accès à la vue city/index, adaptation du code en boucle for...in avec une mise en forme en style card pour les villes.
* Lien vers les villes réalisé avec un path dans le menu reliant vers city/index
* Dans le lien "voir les projets" ajout du {{ path('city_show', {'name':city.name}) }} qui renvoie vers les projets d'une ville.
* Ajout d'un <h2> avec un bloc if ... else qui affiche un message qui indique le nombre de projets, ou au contraire l'absence de projets pour inciter les utilisateurs à participer.

___ Partie User, login, registration ___

* Création du formulaire de login avec la commande make:auth
* Modification du menu avec "if app.user" qui vérifie la connexion. On propose "Me connecter" si l'utilisateur n'est pas connecté, ou le dropdown menu si il est connecté avec le lien vers la deconnexion (app/logout) en bas.
* Changement de la route de logout vers la homepage
* Au niveau du register, modification des labels en français avec typage en TextType::Class puis implémentation de l'interface TextType dans les use du Form.
* Traduction en français du formulaire de login avec la même méthode.
* Dissimulation du bouton "Ajouter un projet" sous un bloc if app.user qui vérifie la connexion d'un utilisateur
* Relocalisation du render menu controller dans le fichier base et suppression de la ligne dupliquée dans les autres pages.
* Ajout du code HTML et adaptation en mode Twig et Doctrine pour la page mon compte. Boucle pour l'affichage des projets.
* Relocalisation de la page mon compte au départ sur le Show User vers le Edit User pour permettre la modification des infos et supprimmer le compte sans changement de page.
* Redirect to route vers lui même pour qu'après la modification on puisse rester sur la même page. Ajout du paramètre dans un array dans le controller User en PHP.
* Ajout d'une partie suppression clairement délimitée.
* Traduction des champs dans le builder du UserType.php pour un affichage plus cohérent, reprise du code déjà utilisé sur le RegistrationForm.
* Ajout du lien vers project new dans l'index et dans la page mon compte.
* Ajout méthode toString sur Category.label, user.email, et city.name pour affichage des pages générées par le CRUD et corriger l'erreur fatale
* Ajout du number format sur tous les costs des cards
* Dans le builder du form pour l'édition de projet (project/edit.html.twig), mise en commentaires des champs non désirés, et label modifié pour un affichage en français. Price type sur le champ du cost


___ partie technique, upload, sécurisation ___

* modification du fichier service/ config.yaml pour paramétrer les chemins d'uploads
* création de la classe FileUploader.php dans le dossier Service (récupéré de Symfony)
* ajout du paramètre FileUploader et son Use associé dans les function new et edit des projets.
* upload size augmenté en configurant le php.ini, options rajoutées dans le filetype du form edit.project pour que ça fonctionne
* Dans ProjectType.php passage du champ picture en FileType pour récupérer le bouton "Parcourir".
* Composer require annotations pour préparer la sécurisation des routes
* Sécurisation des routes dans city new edit et delete (admin) puis dans projet edit et delete (admin + utilisateur concerné). Méthode des annotations sur les routes et use IsGranted.
* Mise en forme du project.new avec ajout des liens y menant. _form réutilisé et quasi-fonctionnel, ajout du User connecté automatiquement avec un setUser dans le projectController (new)
* Installation easy admin avec composer req admin, lien vers admin caché et sécurisé derrière un role-admin dans le menu vers path-easyadmin
* Changement du défault locale en FR. Création du fichier de messages dans translation, modification des valeurs pour traduction.
* Sécurisation en décommentant une ligne dans easyadmin.yaml
* intégration du delete form dans la page edit pour pouvoir supprimer les projets depuis la page user. Mise en forme

--- Bonus ---

* Affichage des commentaires sous les postes avec une simple boucle sur project.comments. Adapatation du code HTML.
* Pour un meilleur formatage du temps et des heures composer req twig/intl-extra. Utilisation du format_datetime avec la locale fr
* Ajout du contenu du comment new dans le controller project show avec paramètre setUser et comment
* Ajout de la méthode post autour du form de l'include new comment pour que l'envoi de données se fasse bien en GET et non POST.
* Ajout d'un if et d'un h3 pour que le bloc ajout de commentaire ne soit visible qu'avec un utilisateur connecté.
* Création d'une property PicturePath sur l'entité City pour avoir un nom de photo exploitable dans l'interface easy admin. 
* Ajout de conditions différenciées sur un new project ou edit project pour ne pas redemander une photo à l'utilisateur en cas de simple modification.
* Ajout de code JS pour afficher le label dans les pictureupload des forms. Eventlistener.
* Petits changement de route à la suppression d'un projet et d'un user.
* Affinage du easy admin avec des disabled actions pour un résultat plus cohérent.
* Refonte du menu easy admin, CSS en lien avec le thème d'initiaville, ajout lien vers le site, changement du titre.

