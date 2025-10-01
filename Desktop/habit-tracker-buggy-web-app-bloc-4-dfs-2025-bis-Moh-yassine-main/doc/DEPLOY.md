# Procédure de Déploiement

Décrivez ci-dessous votre procédure de déploiement en détaillant chacune des étapes. De la préparation du VPS à la 
méthodologie de déploiement continu.

## Préparation du VPS

### Prérequis système
- **OS** : Debian 10/11/12
- **Panel** : aaPanel (dernière version)
- **Web Server** : Nginx
- **PHP** : 8.2 ou 8.3
- **Base de données** : MySQL 5.7+ / MariaDB 10.3+
- **Accès** : SSH root

### Installation des composants via aaPanel

1. **Installation de PHP 8.3**
   - Se connecter à aaPanel
   - Aller dans **App Store**
   - Installer **PHP 8.3**

2. **Installation de MySQL**
   - Dans **App Store**, installer **MySQL** (version 5.7 minimum)
   - Configurer un mot de passe root sécurisé

3. **Configuration de Nginx**
   - Nginx est généralement installé par défaut avec aaPanel
   - S'assurer qu'il est actif

## Méthode de déploiement

### Étape 1 : Transfert des fichiers

Transférer le code source sur le serveur dans le répertoire :
```bash
/www/wwwroot/habit-tracker-buggy-web-app-bloc-4-dfs-2025-bis-Moh-yassine
```

**Méthodes possibles :**
- Via **Git** : `git clone https://github.com/Metz-Numeric-School/habit-tracker-buggy-web-app-bloc-4-dfs-2025-bis-Moh-yassine.git`

### Étape 2 : Configuration PHP

#### 2.1 Débloquer les fonctions PHP nécessaires

Dans aaPanel :
1. **App Store** → **PHP 8.3** → **Settings** → **Disabled functions**
2. Supprimer (cliquer sur "Del") les fonctions suivantes :
   - `putenv`
   - `proc_open`
3. Sauvegarder et redémarrer PHP-FPM

**Commande alternative via SSH :**
```bash
# Éditer php.ini
nano /www/server/php/83/etc/php.ini

# Redémarrer PHP-FPM
systemctl restart php-fpm-83
```

#### 2.2 Installer Composer

```bash
cd /www/wwwroot/habit-tracker-buggy-web-app-bloc-4-dfs-2025-bis-Moh-yassine

# Installer Composer si nécessaire
curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# Installer les dépendances
composer install --no-dev --optimize-autoloader
```

### Étape 3 : Configuration de la base de données

#### 3.1 Créer la base de données via aaPanel

1. **Databases** → **Add database**
2. Paramètres :
   - **Database name** : `habit_tracker`
   - **Username** : `habit_user` 
   - **Password** : root
3. Cliquer sur **Submit**

**Alternative via ligne de commande :**
```bash
mysql -u root -p

# Dans MySQL
CREATE DATABASE IF NOT EXISTS habit_tracker CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE USER IF NOT EXISTS 'habit_user'@'localhost' IDENTIFIED BY 'root';
GRANT ALL PRIVILEGES ON habit_tracker.* TO 'habit_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

#### 3.2 Créer le fichier de configuration .env

```bash
cd /www/wwwroot/habit-tracker-buggy-web-app-bloc-4-dfs-2025-bis-Moh-yassine

cat > .env
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=habit_tracker
DB_USERNAME=habit_user
DB_PASSWORD=root


# Sécuriser le fichier
chmod 644 .env
```

⚠️ **Important** : Remplacer `root` par le vrai mot de passe de la base de données.

#### 3.3 Initialiser la base de données

```bash
# Créer les tables
php bin/create-database

# (Optionnel) Charger les données de démonstration
php bin/load-demo-data
```

### Étape 4 : Configuration du site web

#### 4.1 Configurer le Document Root dans aaPanel

1. **Website** → Sélectionner le site → **Settings**
2. **Site directory** → Modifier pour pointer vers :
   ```
   /www/wwwroot/habit-tracker-buggy-web-app-bloc-4-dfs-2025-bis-Moh-yassine/public
   ```
3. ⚠️ **Important** : Le document root DOIT pointer vers le dossier `/public`
4. Sauvegarder

#### 4.2 Configurer Nginx

Dans **Settings** du site → **Config**, remplacer la configuration par :

```nginx
server {
    listen 80;
    server_name votre-domaine.com;  # ou IP du serveur
    
    root /www/wwwroot/habit-tracker-buggy-web-app-bloc-4-dfs-2025-bis-Moh-yassine/public;
    index index.php index.html;

    access_log /www/wwwlogs/habit-tracker.log;
    error_log /www/wwwlogs/habit-tracker.error.log;

    # Gestion du routing pour l'application MVC
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # Configuration PHP-FPM
    location ~ \.php$ {
        fastcgi_pass unix:/tmp/php-cgi-83.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Sécurité : bloquer l'accès aux fichiers cachés
    location ~ /\. {
        deny all;
    }
}
```

Sauvegarder la configuration.

#### 4.3 Redémarrer Nginx

```bash
# Tester la configuration
nginx -t

# Redémarrer Nginx
systemctl restart nginx
# ou
/etc/init.d/nginx restart
```

### Étape 5 : Configuration des permissions

```bash
cd /www/wwwroot/habit-tracker-buggy-web-app-bloc-4-dfs-2025-bis-Moh-yassine

# Donner les bonnes permissions
chown -R www:www .
chmod -R 755 .
chmod 644 .env
```

### Étape 6 : Vérification du déploiement

1. **Tester l'accès à l'application** : `http://172.17.4.15/`
2. **Vérifier les logs en cas d'erreur** :
   ```bash
   tail -f /www/wwwlogs/habit-tracker.error.log
   ```

3. **Comptes de test disponibles** (si données de démo chargées) :
   - **Admin** : `admin@ht-buggy-wapp.fr` / `azertyuiop`
   - **User** : `user@ht-buggy-wapp.fr` / `azertyuiop`

## Déploiement continu

### Méthode Git Pull

Pour mettre à jour l'application après modifications :

```bash
cd /www/wwwroot/habit-tracker-buggy-web-app-bloc-4-dfs-2025-bis-Moh-yassine

# Récupérer les dernières modifications
git pull origin main

# Mettre à jour les dépendances si nécessaire
composer install --no-dev --optimize-autoloader

# Redémarrer PHP-FPM si nécessaire
systemctl restart php-fpm-83
```

### Sauvegarde de la base de données

Via aaPanel : **Databases** → Sélectionner `habit_tracker` → **Backup**

Ou via ligne de commande :
```bash
mysqldump -u habit_user -p habit_tracker > backup_$(date +%Y%m%d_%H%M%S).sql
```

## Sécurité post-déploiement

### Actions importantes :

1. **Changer les mots de passe par défaut** des comptes admin et user
2. **Sécuriser le fichier .env** (déjà fait avec chmod 644)
3. **Activer HTTPS** via Let's Encrypt dans aaPanel :
   - **Website** → **Settings** → **SSL** → **Let's Encrypt**
