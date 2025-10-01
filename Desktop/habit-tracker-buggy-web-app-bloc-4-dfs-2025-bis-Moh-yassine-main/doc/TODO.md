# TODO

Suite à un audit effectué en amont, voici les failles et les bugs qui ont été identifés comme prioritaire.

## FAILLES

* Des utilsateurs non admin ont des accès à l'interface de gestion des utilisateurs
* Les mots de passes ne sont pas chiffrée en base de données...
* Des injections de type XSS ont été détéctées sur certains formulaires
* On nous a signalé des injections SQL lors de la création d'une nouvelles habitudes
  * exemple dans le champs "name" : foo', 'INJECTED-DESC', NOW()); --

## BUGS

* Une 404 est détéctée lors de l'accès à l'URL ``/habit/toggle``
* Fatal error: Uncaught Error: Class "App\Controller\Api\HabitsController" lorsque l'on accède à l'URL  ``/api/habits``

**ATTENTION : certains bugs n'ont pas été listé**
