<?php
require_once("./Brick.php");

// The first line from the input in the console is assigned to $input variable.
$input = readline();

// Separate $input variable on elements by space.
$numbers = explode(" ", $input);

// Check if $numbers contains more or less than 2 elements
if(count($numbers) != 2) {
    exit("Invalid input. \n");
}
// Check if there is empty element in $numbers
if(empty($numbers[0]) || empty($numbers[1])) {
    exit("Invalid input. \n");
}

// Assign each element in $numbers to variables
$n = $numbers[0];
$m = $numbers[1];

// Creating object $wall of class Brick
$wall = new Brick($n, $m);

// Calling method for setting the new layout
$wall->setNewLayout();

// Calling method for handling errors if any
$wall->handleErrors();

// Calling method to print the output with the new layout
$wall->printWall();
