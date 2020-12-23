<?php
require_once("./WallLayoutError.php");

// class Brick inherits class WallLayoutError
class Brick extends WallLayoutError
{
    public $rows, $columns;
    public $layout = [];

//  Constructor method which is called when an instance of the class has been created.
//  In this case the method is setting variables $rows and $columns and
//  calls method for validating values for these variables.
    function __construct($rows, $columns)
    {
//      Settings values for variables
        $this->rows = $rows;
        $this->columns = $columns;

//      Calling method from inherited class
        parent::catchAreaSizeErrors($this->rows, $this->columns);
    }

//  Method for setting the new layout of the bricks
    function setNewLayout() {
//      Push every inserted row of the first layer in an array $layout
//      Then validating every row and.
        for ($i = 0; $i < $this->rows; $i++) {
            $this->layout[$i] = explode(" ", readline());

//          Calling method from the inherited class for validating every inserted row from the first layer.
            parent::catchLayoutErrors(count($this->layout[$i]), $this->columns);

//          If the layout has more than 2 columns, every last element from the row is moved to the beginning of the array.
            if($this->columns > 2) {
//              removes the last element from the array
                $remove = array_pop($this->layout[$i]);
//              inserts the removed element in the beginning of the array
                array_unshift($this->layout[$i], $remove);
            }
        }
//      Separating all rows by 2 and switch the last element from the first row with the first element from the second row.
        for($row = 0; $row < $this->rows; $row+=2) {
            $pop = array_pop($this->layout[$row]);
            $shift = array_shift($this->layout[$row + 1]);
            array_push($this->layout[$row], $shift);
            array_unshift($this->layout[$row+1], $pop);
        }
    }

//  Printing every element from $layouts array on new row
    function printWall() {
        if($this->error == "") {
            for($i = 0; $i < $this->rows; $i++) {
                echo "* ";
                foreach ($this->layout[$i] as $k) {
                    echo "$k * ";
                }
                echo "\n";
            }
        }
    }
}