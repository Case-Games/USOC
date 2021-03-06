<?php
  /**
  * File with function getSetting()
  * @license https://standards.casegames.ch/cgs/0003/v1.txt Case Games Open-Source license
  */
  /**
  * This is a function for the class U.
  * This function gets a value from the "settings" database.
  * @see U For more informations about U.
  * @version Pb2.0Bfx0RCA
  * @since Pb2.0Bfx0RCA
  * @param string $name The name of the setting. (For example: login.name)
  * @return string The value from the database.
  */
  function getSetting($name):string{
    global $U, $USOC;
    $sql = "SELECT * FROM Settings WHERE Name='".$name."'";
    $db_erg = mysqli_query( $U->db_link, $sql );
    while ($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)){
      return $row["Value"];
    }
  }
?>
