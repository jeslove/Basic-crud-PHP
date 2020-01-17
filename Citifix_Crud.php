<?php 

/**
 * Basic CRUD for new PHP Developers
 * BELOW METHODS CAN DO THE A FULL FUNCTIONALITY OF THE (CREATE,READ,UPDATE AND DELETE IN PHP)
 * THE SCRIPT IN CREATED OUT OF LOVE TO HELP NEWLY PHP DEVELOPERS
 * FEEL FREE TO CHANGE ANYTHING YOUR DON'T LIKE ABOUT THE SCRIPT
 * @AUTHOR FRANK JESLOVE AYITEY
 * @EDUCATION APTECH WORLD EDUCATION
 * @OCCUPATION SOFTWARE ENGINEER 
 * @CONTACT (+233) 2455 - 91682
 */

 class Citifix_Crud extends Database
 {
    /**
     * BASE CREATE METHED THE ACCEPTS TWO PARAMETERS THE (TABLE NAME AND THE ARRAY DATA)
     * ARRAY DATA CAN BE PASS IN THE FORMATES ($data=['database feilds name'=>YOUR POST VALUE, 'database feilds   name'=>YOUR POST VALUE])
     */

    public static function create($table, $data)
    {
        $implodeColumns = implode(",", array_keys($data));

        $implodePlaceholder = implode(", :", array_keys($data));

        $citifix = Database::Db_conn()->prepare("INSERT INTO $table($implodeColumns)VALUES(:" . $implodePlaceholder . ")");

        foreach ($data as $key => $value) {

            $citifix->bindValue(':' . $key, $value);
        }

        return ($citifix->execute()) ? true : false;

        $citifix = null;
    }

     /**
      * BASE UPDATE METHOD THAT ACCEPTS THREE PARAMETERS THE TABLENAME, ITEM AND THE DATA
      *
      */

    public static function update($table, $fieldDetailsc, $item)
    {
        $sql = "UPDATE $table SET $fieldDetailsc WHERE id =:item";

        $citifix = Database::db_conn()->prepare($sql);

        $citifix->bindValue(':item', $item, PDO::PARAM_INT);

        return ($citifix->execute()) ? true : false;

        $stmt = null;
    }


    /**
     * BASE READ METHOD THAT ACCEPTS THREE PARAMETERS THE TABLENAME, ITEM AND THE DATA
     */

    public static function read_by_value($table, $value, $item)
    {
        $sql = "SELECT * FROM $table WHERE $value =:item";

        $citifix = Database::db_conn()->prepare($sql);

        $citifix->bindValue(':item', $item);

        $citifix->setFetchMode(PDO::FETCH_ASSOC);

        $citifix->execute();

        return ($citifix->fetch()) ? true : false;

        $stmt = null;
    }
     /**
      * GET ALL USER METHOD FROM A TABLE
      */
    public static function read_all($table)
    {
        $sql = "SELECT * FROM $table";

        $citifix = Database::db_conn()->prepare($sql);

        $citifix->setFetchMode(PDO::FETCH_ASSOC);

        $citifix->execute();

        return ($citifix->fetchAll()) ? true : false;

        $stmt = null;
    }

    /**
     * BASIC DELETE METHODS
     */

    public static function delete($table, $value, $item)
    {
        $sql = "DELETE FROM $table WHERE $value =:item";

        $citifix = Database::db_conn()->prepare($sql);

        $citifix->bindValue(':item', $item);

        return ($citifix->execute()) ? true : false;

        $citifix = null;
    }

    /**
     * BASIC FORM FILTER SCRIPT FOR YOUR POST AND GET VALUES
     */

    public static function validate($post = TRUE)
    {
        $post = htmlspecialchars($post);

        $post = trim($post);

        $post = htmlentities($post);
        
        $post = stripslashes($post);
    }

    /**
     * BASIC  LOOP FILTER
     */

    public static function check($value)
    {
       return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    /**
     * BASIC GENERATING UNIQID
     */

    public static function getid($getNewNumbers)
    {
        $citifix_code = uniqid(md5(true));

        $citifix_code = str_shuffle($citifix_code);

        return $citifix_code = substr($citifix_code, 10, $getNewNumbers);
    } 

    /**
     * GET USER IP ADDRESS BY VISIT OR LOGIN
     */

    public static function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

 }