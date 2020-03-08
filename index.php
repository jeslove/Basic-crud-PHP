<?php

/**
 * How to use the validate method
 * Change this (FILTER_DEFAULT) to it respectful data type example (if the post value is string = FILTER_SANITIZE_STRING ETC)
 */
$YOUR_VALIABLE_NAME = Citifix_Crud::validate($_POST['POST_VALUE'], FILTER_DEFAULT);

/**
 * How to use the create method
 */

 $data = ['username'=>$YOUR_VALIABLE_NAME, 'email'=>$YOUR_VALIABLE_NAME];
/**
 * Where username,email are  fields from your database and the $YOUR_VALIABLE_NAME is the value from the post request
 * YOUR TABLE NAME SHOUD WE A PROTECTED OR PRIVATE MODIFY ex(protected $user = '`users`';)
 * Your also use it normal 
 */
 
  /**
   * IF USE IN A CLASS
   */
  $citi_response = Citifix_Crud::create(self::$user, $data);
//   Check if the response if positive
  if($citi_response == true)
  {
      echo 'Data posted';
  }
  else 
  {
    echo 'Data NOT posted';  
  }

//  Other ways for checking 

return ($citi_response) ? 'data poste' : 'data not posted';

//   #########################################################################
  /**
   * IF USE NORMAL
   */

$table = '`users`';

$citi_response = Citifix_Crud::create($table, $data);
//   Check if the response if positive
if ($citi_response == true)
{
    echo 'Data posted';
} 
else
{
    echo 'Data NOT posted';
}

/**
 * How to use the UPDATE METHOD
 */

$data = ['username' => $YOUR_VALIABLE_NAME, 'email' => $YOUR_VALIABLE_NAME];

ksort($data);// YOU CAN READ MORE ABOUT (KSORT) ON PHP MAIN WEBSITE

$fieldDetailsc = "";
// $item is the get value for the update
// YOU CAN US THE ISSET FUNCTION TO CHECK IF THE VALUE IS POSITIVE

$item = Citifix_Crud::validate($_GET['api'], FILTER_DEFAULT);
// LOOPING THROUGH THE DATA VALUE WITH KEY PERS
foreach ($data as $key => $value) {
    $fieldDetailsc .= "`$key`='$value',";
}
// ADDING COMMA TO THE VALUE PERS FOUND
$fieldDetailsc = rtrim($fieldDetailsc, ',');
// UPDATING THE DATABASE
$citi_response = Citifix_Crud::update($YOUR_TABLENAME, $fieldDetailsc, $item);
//   Check if the response if positive
if ($citi_response == true)
{
    echo 'Data Updated';
} 
else 
{
    echo 'Data NOT Updated';
}

/**
 * HOW TO USE THE GETID METHOD
 * YOU CAN PASS ANY INTEGER VALUE TO THE METHOD (5  IS A DEFAULT VALUE PASSED)
 */
$citi_code = Citifix_Crud::getid(5);

var_dump($citi_code); // to see the result on the browser

/**
 * HOW TO USE THE READ_VALUE METHOD
 */
  $value ='id';// value can be anything you want from the db
  $item = 'id'; // is the get value from you get request
  $table = '`users`';// tablename
  $citi_response = Citifix_Crud::read_by_value($table, $value, $item);
  var_dump($citi_response); // to see the result on the browser
//YOU CAN NOW MAP THE RESULT TO THE FIELDS

ECHO '<input type="text" value="'.$citi_response['username'].'">';

// we make use of the check method here for clear and free from sql injections

echo '<input type="text" value="' . Citifix_Crud::check($citi_response['username']) . '">';


/**
 * HOW TO USE THE READ ALL METHOD 
 */

$table = '`users`'; // tablename
$citi_response = Citifix_Crud::read_all($table);

var_dump($citi_response);// to see the result on the browser

// NOW LET LOOP THROUGH THE RESULT

foreach ($citi_response as $key => $value)
{
   echo $value['username'];//value now has all the result set
}

/**
 * HOW TO USE THE DELETE METHOD
 */
$value = 'id'; // value can be anything you want from the db
$item = 'id'; // is the get value from you get request
$table = '`users`'; // tablename
$citi_response = Citifix_Crud::delete($table, $value, $item);

/**
 * THANKS FOR YOUR TIME 
 * HAPPY CODING 
 */
