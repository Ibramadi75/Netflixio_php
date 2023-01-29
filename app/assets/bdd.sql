DROP DATABASE IF EXISTS `netflixio`;
CREATE DATABASE IF NOT EXISTS `netflixio`;
USE `netflixio`;

CREATE TABLE app_users (
  id INTEGER AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  subscription_type INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE app_subscriptionTypes(
  id INTEGER AUTO_INCREMENT PRIMARY KEY,
  libelle VARCHAR(255) NOT NULL,
  price FLOAT NOT NULL
);

CREATE TABLE app_contents (
  id INTEGER AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  release_year INTEGER NOT NULL,
  duration INTEGER NULL,
  number_of_seasons INTEGER NULL,
  rating FLOAT NOT NULL
);

CREATE TABLE app_episodes (
  id INTEGER AUTO_INCREMENT PRIMARY KEY,
  idContent INTEGER NOT NULL,
  title VARCHAR(255) NOT NULL,
  description VARCHAR(255) NOT NULL,
  season_number INTEGER NOT NULL,
  episode_number INTEGER NOT NULL,
  duration INTEGER NOT NULL,
  rating FLOAT NOT NULL,
  FOREIGN KEY (idContent) REFERENCES app_contents(id)
);

CREATE TABLE app_contentsProfiles(
  id INTEGER AUTO_INCREMENT PRIMARY KEY,
  idContent INTEGER NOT NULL,
  url_affiche VARCHAR(255),
  FOREIGN KEY (idContent) REFERENCES app_contents(id)
);

CREATE TABLE app_userWatchHistory (
  id INTEGER PRIMARY KEY,
  user_id INTEGER NOT NULL,
  idContent INTEGER,
  episode_id INTEGER,
  watch_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES app_users(id),
  FOREIGN KEY (idContent) REFERENCES app_contents(id),
  FOREIGN KEY (episode_id) REFERENCES app_episodes(id)
);

CREATE TABLE app_userRatings (
  id INTEGER PRIMARY KEY,
  user_id INTEGER NOT NULL,
  idContent INTEGER,
  episode_id INTEGER,
  rating INTEGER NOT NULL,
  FOREIGN KEY (user_id) REFERENCES app_users(id),
  FOREIGN KEY (idContent) REFERENCES app_contents(id),
  FOREIGN KEY (episode_id) REFERENCES app_episodes(id)
);

CREATE TABLE config_paths(
  id INTEGER AUTO_INCREMENT PRIMARY KEY,
  rootPath VARCHAR(255) NOT NULL
);

CREATE TABLE config_erreurs(
  code INT NOT NULL PRIMARY KEY,
  description TEXT,
  urlBackground VARCHAR(255) NOT NULL
);

-- INSERT A DES FINS DE TESTS
INSERT INTO app_subscriptionTypes(libelle, price) VALUES('free', 0.0), ('standard', 3.99), ('premium', 4.99), ('ultra', 7.99);
INSERT INTO app_users(username,password,email,subscription_type,created_at)VALUES('user1','password1','user1@example.com',2,'2022-12-31'),('user2','password2','user2@example.com', 0,'2023-01-31'),('user3','password3','user3@example.com', 1,'2022-11-30');
INSERT INTO app_contents(title,release_year,number_of_seasons,duration,rating)VALUES('Titanic',2021,NULL,134,3.0),('Rebelle',2020,NULL,86,4.2),('Tenet',2019,NULL,92,2.8),('Titanic',2021,NULL,134,3.0),('Rebelle',2020,NULL,86,4.2),('Tenet',2019,NULL,92,2.8),
('Titanic',2021,NULL,134,3.0),('Rebelle',2020,NULL,86,4.2),('Tenet',2019,NULL,92,2.8),
('Titanic',2021,NULL,134,3.0),('Rebelle',2020,NULL,86,4.2),('Tenet',2019,NULL,92,2.8), ('Futurama', 1997, 8, NULL, 4.4);
INSERT INTO app_contentsProfiles(idContent, url_affiche) VALUES(1, "https://m.media-amazon.com/images/I/8129a7-9A7L._AC_SX425_.jpg"), (2, "https://m.media-amazon.com/images/I/81G2BOxV96L._AC_SY879_.jpg"), (3, "https://static.actu.fr/uploads/2021/01/cine-affiche-tenet.jpg"), (4, "https://m.media-amazon.com/images/I/8129a7-9A7L._AC_SX425_.jpg"), (5, "https://m.media-amazon.com/images/I/81G2BOxV96L._AC_SY879_.jpg"), (6, "https://static.actu.fr/uploads/2021/01/cine-affiche-tenet.jpg"),(7, "https://m.media-amazon.com/images/I/8129a7-9A7L._AC_SX425_.jpg"), (8, "https://m.media-amazon.com/images/I/81G2BOxV96L._AC_SY879_.jpg"), (9, "https://static.actu.fr/uploads/2021/01/cine-affiche-tenet.jpg"),(10, "https://m.media-amazon.com/images/I/8129a7-9A7L._AC_SX425_.jpg"), (11, "https://m.media-amazon.com/images/I/81G2BOxV96L._AC_SY879_.jpg"), (12, "https://static.actu.fr/uploads/2021/01/cine-affiche-tenet.jpg"), (13, "https://flxt.tmsimg.com/assets/p9932851_b_h9_ab.jpg");
INSERT INTO config_erreurs(description, code, urlBackground) VALUES("La ressource n'a pas pu être trouvée", "404", "")