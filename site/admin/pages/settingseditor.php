<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $U->getLang("admin") ?> - <?php echo $U->getLang("admin.settings") ?></title>
  </head>
  <body>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?URL=mainpage"><?php echo $U->getLang("admin.back") ?></a>
    <?php
      if(!isset($_GET["N"])){
        $text = <<<'CODE'
        <form action="%a">
        <select name="N">
        CODE;
          $db_link = mysqli_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE);

          $sql = "SELECT * FROM Settings";
          $db_erg = mysqli_query( $db_link, $sql );
          while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
          {
            $text = $text."<option value='".$zeile["Name"]."'>".$zeile["Name"]."</option>";
          }
          $text = $text.<<<'CODE'
          </select>
          <input type="hidden" name="URL" value="settingseditor" />
          <button type="submit">%b</button>
          </form>
          CODE;
        $text = str_replace('%a',$_SERVER['PHP_SELF'],$text);
        $text = str_replace('%b',$U->getLang("admin.settings.edit.p"),$text);
        echo $text;
      }else{
        require_once ('konfiguration.php');
        $db_link = mysqli_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE);
        $sql = "SELECT * FROM Settings;";
        $db_erg = mysqli_query( $db_link, $sql );
        while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC)){
          if ($zeile["Name"] == $_GET["N"]){
            $type = $zeile["Type"];
            $value = $zeile["Value"];
          }
        }
      }
      if(isset($type)){
        if($type == "Bool"){
          $text = <<<'CODE'
          <form action="%a">
          <input type="hidden" name="URL" value="settingseditorsend" />
          <input type="hidden" name="N" value="%b" />
          <br />1:<input type="radio" name="V" value="1" />
          <br />0:<input type="radio" name="V" value="0" /><br />
          <button type="submit">%c</button>
          </form>
          CODE;
          $text = str_replace('%b',$_GET["N"],$text);
          $text = str_replace('%a',$_SERVER['PHP_SELF'],$text);
          $text = str_replace('%c',$U->getLang("admin.settings.edit.p"),$text);
        }elseif($type == "Int"){
          $text = <<<'CODE'
          <form action="%a">
          <input type="hidden" name="URL" value="settingseditorsend" />
          <input type="hidden" name="N" value="%b" />
          <br /><input type="number" name="V" value="%c" /><br />
          <button type="submit">%d</button>
          </form>
          CODE;
          $text = str_replace('%c',$value,$text);
          $text = str_replace('%b',$_GET["N"],$text);
          $text = str_replace('%a',$_SERVER['PHP_SELF'],$text);
          $text = str_replace('%d',$U->getLang("admin.settings.edit.p"),$text);
        }elseif($type == "Text"){
          $text = <<<'CODE'
          <form action="%a">
          <input type="hidden" name="URL" value="settingseditorsend" />
          <input type="hidden" name="N" value="%b" />
          <br /><input type="Text" name="V" value="%c" /><br />
          <button type="submit">%d</button>
          </form>
          CODE;
          $text = str_replace('%c',$value,$text);
          $text = str_replace('%b',$_GET["N"],$text);
          $text = str_replace('%a',$_SERVER['PHP_SELF'],$text);
          $text = str_replace('%d',$U->getLang("admin.settings.edit.p"),$text);
        }
        echo $text;
      }
    ?>
  </body>
</html>
