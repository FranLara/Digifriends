-- Create syntax for DATABASE 'digifriends_challenge'
CREATE DATABASE digifriends_challenge;

-- Create syntax for USER 'user_challenge'
CREATE USER 'user_challenge'@'localhost' IDENTIFIED BY 'password_challenge';
GRANT ALL PRIVILEGES ON digifriends_challenge.* TO 'user_challenge'@'localhost';
FLUSH PRIVILEGES;

-- Create syntax for TABLE 'number_digifriends'
CREATE TABLE 'number_digifriends' (
  'number' int(11) unsigned NOT NULL,
  'digifriends' text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY ('number')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Create syntax for TABLE 'user_number_request'
CREATE TABLE 'user_number_request' (
  'id' int(11) unsigned NOT NULL AUTO_INCREMENT,
  'uid' int(11) NOT NULL,
  'number' int(11) NOT NULL,
  'date_request' bigint(11) NOT NULL,
  PRIMARY KEY ('id'),
  KEY 'user_id' ('uid')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
