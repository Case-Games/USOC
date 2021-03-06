<?php
  /**
  * File with function getSetting()
  * @license https://standards.casegames.ch/cgs/0003/v1.txt Case Games Open-Source license
  */
  /**
  * This is a function for the class U.
  * This function deletes a content
  * @see U For more informations about U.
  * @version Pb2.3Bfx0
  * @since Pb2.3Bfx0
  * @param string $content Name of the content
  * @param string $name Name of the content page
  * @return bool True if succeeded, false if not
  */
  function deletePage(string $content, string $name):bool{
    global $U, $USOC;
    $sql = "SELECT * FROM ". $U->contentHandlers[$content]["Name"] . " WHERE name='" . $name . "';";
    $db_erg = mysqli_query($U->db_link, $sql);
    if($row = mysqli_fetch_array($db_erg, MYSQLI_ASSOC)){
      $id = $row["ID"];
    }
    if($U->contentHandlers[$content]["DeleteHandler"]($id) === False){
      return False;
    }
    $sql = "DELETE FROM " . $U->contentHandlers[$content]["Name"] . " WHERE Name='" . $name . "';";
    return mysqli_query($U->db_link, $sql);
  }
?>
