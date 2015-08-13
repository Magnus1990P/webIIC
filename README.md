# webIIC
Web app for manual classification of an image database

Files
-----
* imgSkelList.txt
  * List of all images to be imported to the database in a skeleton format
* loadList.php
  * PHP script for reading the imgSkelList.txt and import it to the database
* index.php
  * Main website for which is used for classifying the images in database.  Loads and classifies images using JavaScript
* dbScheme.sql
  * The database scheme for MySQL server, creates the database and the table.
* getImg.php
  * Retrives and returns a single image from the database and the current progress of classification
* clasImg.php
  * Receives the AID and classification parameters, validates and updates the corresponding entry in the database.
