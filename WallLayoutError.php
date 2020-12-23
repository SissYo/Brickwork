<?php

//  Class for handling errors.
class WallLayoutError
{
    public $error = "";

//  Validating rows and columns values.
    public function catchAreaSizeErrors($rows, $columns) {
//      Checks if these values match the regex. This allows to be inserted only numbers for rows and columns values.
        if(!preg_match("/[0-9]+$/", $rows) || !preg_match("/[0-9]+$/", $columns)) {
            $this->error = "Rows and columns must be numbers. \n";
            $this->handleErrors();
        }

//      Checks if the two values are even.
        if($rows%2 !== 0 || $columns%2 !==0) {
            $this->error = "* -1 * \n"
                ."There is no solution. \n";
            $this->handleErrors();
        }

//      Checks if the two values are bigger than 100.
        if($rows > 100 || $columns > 100) {
            $this->error = "Rows and columns can not exceed 100. \n";
            $this->handleErrors();
        }

//      Checks if the two values are positive numbers different from 0.
        if($rows <= 0 || $columns <=0) {
            $this->error = "Invalid input. \n";
            $this->handleErrors();
        }
    }

//  Checks if the input has exactly the number of rows and columns.
    public function catchLayoutErrors($length, $input) {
        if($length != $input) {
            $this->error =  "Error: Invalid input. \n";
        }
    }

//  If there is any error, exit the program and print the error.
    public function handleErrors() {
        if($this->error !== "") {
            exit($this->error);
        }
    }
}