<?php
$file = dirname(__FILE__) . "/matchs.csv";
if (file_exists($file) && $id_file = fopen($file, "r")) {
    while ($tab = fgetcsv($id_file, 200, ";")) {
        $categorie = $tab[0];
        $competition = $tab[1];
        $equipe = $tab[2];
        $clubadv = $tab[3];
        $localiteadv = $tab[4];
        $equipeadv = $tab[5];
        $datem = $tab[6];
        $heure = $tab[7];
        $deplacement = $tab[8];
        $terrain = $tab[9];
        $site = $tab[10];
        echo "<tr>
        <td>$categorie</td>
        <td>$competition</td>
        <td>$equipe</td>
        <td>$clubadv</td>
        <td>$localiteadv</td>
        <td>$equipeadv</td>
        <td>$datem</td>
        <td>$heure</td>
        <td>$deplacement</td>
        <td>$terrain</td>
        <td>$site</td>
        </tr>";
    }
    fclose($id_file);
}
?>
