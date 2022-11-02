
<?php

//    echo 'This is a test';
//?>
<!---->
<?php //echo 'This is a test' ?>
<!---->
<?php //echo 'We omitted the last closing tag';
//// Affiche toutes les informations, comme le ferait INFO_ALL
//phpinfo();
//
//// Affiche uniquement le module d'information.
//// phpinfo(8) fournirait les mêmes informations.
//phpinfo(INFO_MODULES);


echo "FATY LAMINE " ;

$action_show='faty';

if($action_show =='FATY'){

    echo "Vie " ;
}
else {
    echo "mort";
}
echo "<br>";

//
//$tab = array('X', 'Y', 'X');
//if (is_array($tab))
//{
//for($i=0 ;$i<count($tab);$i++) {
//    $tab[$i] = $tab[$i];
//}
//echo $tab ;
//}
//else
//    echo "Ceci n'est pas un tableau....";





//La methode GET

if($_GET['nom'] || $_GET['age'] !== null) {
    echo "Votre nom est ".$_GET['nom'] . "\n";
    echo "Votre age est :". $_GET['age']. " ans.";
}
?>
<html>
<body>
<form action = "<?php echo $_SERVER["PHP_SELF"];?>" method = "GET">
    Nom: <input type = "text" name = "nom" />
    Age: <input type = "text" name = "age" />
    <input type = "submit" />
</form>
</body>
</html>
