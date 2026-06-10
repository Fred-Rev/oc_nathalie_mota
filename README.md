# Nathalie Mota – Thème WordPress personnalisé

Projet réalisé dans le cadre de la formation **Développeur WordPress OpenClassrooms**.

---

## Description

Création d’un thème WordPress personnalisé pour la photographe Nathalie Mota.

Le projet comprend :

* une galerie dynamique de photos ;
* un système de filtres Ajax ;
* une lightbox fullscreen ;
* une modale de contact ;
* un responsive desktop/mobile ;
* des dropdowns personnalisés en JavaScript.

---

## Technologies utilisées

* WordPress
* PHP
* JavaScript
* Ajax
* HTML5
* CSS3
* Contact Form 7

---

## Fonctionnalités principales

### Galerie photo dynamique

* affichage des photos via `WP_Query` ;
* chargement progressif avec bouton “Charger plus” ;
* filtres dynamiques sans rechargement de page.

### Filtres Ajax

* filtre par catégorie ;
* filtre par format ;
* tri chronologique ;
* mise à jour dynamique des photos.

### Lightbox

* affichage fullscreen des photos ;
* navigation précédente/suivante ;
* informations de la photo ;
* compatible avec les contenus Ajax.

### Modale de contact

* intégration Contact Form 7 ;
* préremplissage automatique de la référence photo ;
* design responsive.

### Responsive

* adaptation mobile complète ;
* menu burger ;
* galerie responsive ;
* modale et lightbox adaptées mobile.

---

## Installation

### Cloner le repository

```bash
git clone https://github.com/Fred-Rev/oc_nathalie_mota.git
```

### Copier le thème dans

```text
wp-content/themes/
```

### Puis

* Activer le thème depuis WordPress
* Installer et activer Contact Form 7
* Importer les contenus/photos nécessaires

---

## Structure du projet

```text
assets/
    js/
        scripts.js
        lightbox.js
        custom-selects.js

template-parts/
    photo-block.php
    modal-contact.php

functions.php
front-page.php
single-photo.php
style.css
```

---

## Auteur

Fred
