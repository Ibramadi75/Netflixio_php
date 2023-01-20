DROP DATABASE IF EXISTS `netflixio`;
CREATE DATABASE IF NOT EXISTS `netflixio`;
USE `netflixio`;

CREATE TABLE users (
  id INTEGER PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  subscription_type ENUM('basic', 'standard', 'premium') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE movies (
  id INTEGER PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  release_year INTEGER NOT NULL,
  duration INTEGER NOT NULL,
  rating FLOAT NOT NULL
);

CREATE TABLE tv_shows (
  id INTEGER PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  release_year INTEGER NOT NULL,
  number_of_seasons INTEGER NOT NULL,
  rating FLOAT NOT NULL
);

CREATE TABLE episodes (
  id INTEGER PRIMARY KEY,
  tv_show_id INTEGER NOT NULL,
  season_number INTEGER NOT NULL,
  episode_number INTEGER NOT NULL,
  duration INTEGER NOT NULL,
  rating FLOAT NOT NULL,
  FOREIGN KEY (tv_show_id) REFERENCES tv_shows(id)
);

CREATE TABLE user_watch_history (
  id INTEGER PRIMARY KEY,
  user_id INTEGER NOT NULL,
  movie_id INTEGER,
  tv_show_id INTEGER,
  episode_id INTEGER,
  watch_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (movie_id) REFERENCES movies(id),
  FOREIGN KEY (tv_show_id) REFERENCES tv_shows(id),
  FOREIGN KEY (episode_id) REFERENCES episodes(id)
);

CREATE TABLE user_ratings (
  id INTEGER PRIMARY KEY,
  user_id INTEGER NOT NULL,
  movie_id INTEGER,
  tv_show_id INTEGER,
  episode_id INTEGER,
  rating INTEGER NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (movie_id) REFERENCES movies(id),
  FOREIGN KEY (tv_show_id) REFERENCES tv_shows(id),
  FOREIGN KEY (episode_id) REFERENCES episodes(id)
);

INSERT INTO users (id, username, password, email, subscription_type, created_at)
VALUES (0, 'user1', 'password1', 'user1@example.com', 'standard', '2022-12-31'),
(1, 'user2', 'password2', 'user2@example.com', 'premium', '2023-01-31'),
(2, 'user3', 'password3', 'user3@example.com', 'standard', '2022-11-30');

INSERT INTO movies (id, title, release_year, duration, rating)
VALUES (0, 'movie1', 2021, 134, 3.0),
(1, 'movie2', 2020, 86, 4.2),
(2, 'movie3', 2019, 92, 2.8);