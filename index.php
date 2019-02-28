<?php
/**
 * Controller to handle job search requests
 * In a real application, should be a separate class
 */

require 'vendor/autoload.php';
require 'model.php';
// check descriptions
$description = $_REQUEST['description'];
// check location
$location = $_REQUEST['location'];
$fulltime = $_REQUEST['fulltime'];
// connect api
$model = new Model();
// get list of positions
$aPositionList = $model->getList($description, $location, $fulltime);
// display output
include 'views/index.php';

