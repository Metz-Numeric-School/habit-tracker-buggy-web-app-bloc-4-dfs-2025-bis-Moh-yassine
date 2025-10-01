### Security

#### Fixed SQL Injection Vulnerabilities
- **HabitRepository**: Remplacé les requêtes SQL concaténées par des requêtes préparées dans les méthodes `insert()`, `find()`, et `findByUser()`
- **UserRepository**: Remplacé les requêtes SQL concaténées par des requêtes préparées dans les méthodes `find()` et `findByEmail()`
- Prévention des injections SQL comme l'exemple : `foo', 'INJECTED-DESC', NOW()); --`

#### Fixed XSS Vulnerabilities
- Ajout de `htmlspecialchars()` sur tous les affichages de données utilisateur dans les templates
- Templates sécurisés :
  - `templates/admin/user/index.html.php`
  - `templates/admin/user/new.html.php`
  - `templates/security/login.html.php`
  - `templates/register/index.html.php`

#### Implemented Password Hashing
- Remplacement du stockage en texte brut par `password_hash()` (bcrypt) lors de la création d'utilisateurs
- Utilisation de `password_verify()` pour la vérification lors de la connexion
- Mise à jour des mots de passe dans :
  - `database.sql` : utilisateurs admin et standard
  - `demo_data.sql` : utilisateur demo
- Controllers mis à jour :
  - `src/Controller/SecurityController.php`
  - `src/Controller/RegisterController.php`
  - `src/Controller/Admin/UserController.php`

#### Fixed Unauthorized Access to Admin Interface
- Ajout du guard `AdminGuard` sur les routes d'administration des utilisateurs :
  - `/admin/user` (liste des utilisateurs)
  - `/admin/user/new` (création d'utilisateur)
- Empêche les utilisateurs non-admin d'accéder à l'interface de gestion

### Fixed

#### Fixed 404 Error on /habit/toggle
- Ajout de la route manquante `/habit/toggle` dans `config/routes.json`
- Route correctement mappée vers `HabitsController::toggle()`

#### Fixed Fatal Error on /api/habits
- Correction du nom de classe `HabitController` → `HabitsController` dans `src/Controller/Api/HabitsController.php`
- Le nom de la classe correspond maintenant à celui défini dans les routes
