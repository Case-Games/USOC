<!DOCTYPE html>
<html lang="<?php echo $U->getSetting("site.lang") ?>" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $U->getLang("admin") ?></title>
  </head>
  <body>
    <h1><?php echo $U->getLang("admin.welcome") ?></h1>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?URL=settingseditor"><?php echo $U->getLang("admin.settings.edit") ?></a><br />
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?URL=useredit"><?php echo $U->getLang("admin.user.edit") ?></a><br />
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?URL=editor"><?php echo $U->getLang("admin.edit.new.site") ?></a><br />
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?URL=blogeditor"><?php echo $U->getLang("admin.edit.new.blogsite") ?></a><br />
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?URL=deletepage"><?php echo $U->getLang("admin.delete") ?></a><br />
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?URL=about"><?php echo $U->getLang("admin.about") ?></a><br />
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <select name="SiteName">
        <?php
          $sql = "SELECT * FROM Sites";
          $db_erg = mysqli_query( $U->db_link, $sql );
          while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
          {
            echo "<option value='".$zeile["Name"]."'>".$zeile["Name"]."</option>";
          }
        ?>
      </select>
      <input type="hidden" name="URL" value="editor" />
      <button type="submit"><?php echo $U->getLang("admin.edit.site") ?></button>
    </form>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <select name="SiteName">
          <?php
            $sql = "SELECT * FROM Blog";
            $db_erg = mysqli_query( $U->db_link, $sql );
            while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
            {
              echo "<option value='".$zeile["Name"]."'>".$zeile["Name"]."</option>";
            }
         ?>
       </select>
        <input type="hidden" name="URL" value="blogeditor" />
        <button type="submit"><?php echo $U->getLang("admin.edit.blogsite") ?></button>
    </form>
  </body>
</html>
