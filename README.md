## README

#### Running locally

* `clear && php -S localhost:8888 index.php`

#

#### SEE
select * from pokemon_type;
select * from pokemon;

#### DELETE
DROP TABLE pokemon_type;
DROP TABLE pokemon;


#### CREATE 

CREATE TABLE pokemon (
  id INT NOT NULL,
  name varchar(255),
  PRIMARY KEY (id)
) ENGINE=INNODB;

CREATE TABLE pokemon_type (
  id INT NOT NULL AUTO_INCREMENT,
  pokemon_id INT,
  type varchar(255),
  INDEX par_ind (pokemon_id),
  FOREIGN KEY (pokemon_id) REFERENCES pokemon(id) ON DELETE CASCADE,
  PRIMARY KEY (id)
) ENGINE=INNODB;
