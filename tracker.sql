CREATE database tracker;
use tracker;
CREATE TABLE project_tracker(
 id INT(11) AUTO_INCREMENT PRIMARY KEY,
 project_name VARCHAR(30),
 esthrs INT,
 tothrs INT
)