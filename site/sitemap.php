<?php
  header ("Content-Type:text/xml");
  include_once "configuration.php";
  echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <url>
     <loc><?php echo $USOC["DOMAIN"] ?></loc>
     <changefreq>weekly</changefreq>
   </url>
   <url>
     <loc><?php echo $USOC["DOMAIN"] ?>login.php</loc>
     <changefreq>never</changefreq>
   </url>
  <?php
    $sql = "SELECT * FROM Sites";
    $db_erg = mysqli_query( $U->db_link, $sql );
    while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC)){
      echo "<url><loc>".$USOC["DOMAIN"]."/".$zeile["Name"]."</loc><changefreq>weekly</changefreq></url>";
    }
    $sql = "SELECT * FROM Blog";
    $db_erg = mysqli_query( $U->db_link, $sql );
    while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC)){
      echo "<url><loc>".$USOC["DOMAIN"]."/blog/".$zeile["Name"]."</loc><changefreq>weekly</changefreq></url>";
    }
  ?>
</urlset>
