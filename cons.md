# MINI BLOG PHP PROCEDURAL

## Description

Dans ce mini projet, nous allons créer un mini blog en PHP procédural. Nous allons utiliser une base de données MySQL pour stocker les articles, les catégories et les commentaires et les utilisateurs.

## Installation
- Php 7.4 ou plus
- MySQL 5.7 ou plus
- Apache 2.4 ou plus

## Les fonctionnalités

- Ajout d'un article
- Affichage de tous les articles
- Modification d'un article
- Suppression d'un article



## Les tables de la base de données(mini_blog)
- articles
  - id_article(int pk auto_increment not null)
  - titre(varchar(255) not null)
  - contenu(text not null)
  - date_creation(datetime not null)
  - photo(varchar(255) not null)