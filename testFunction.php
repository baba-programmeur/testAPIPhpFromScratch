<?php

function mutiplication($val) :float {
    return $val*100 ;
}
  echo  mutiplication(100);

//echo  "\n" ;
//
// echo  var_dump( mutiplication(100.9999) );
//
//  echo  "\n" ;
//
// echo  var_dump(intval(8.1));


echo  "<br>" ;

// Recherche des nombres paires

$n=16 ;

if($n%2==0)
{

    print('nombre paire');
}
else
{
    print('nombre impaire');
}
echo "<br>";
$nom= "FATY";

if($nom==='FATY')
{
    echo  "Hello". $nom ;
}

elseif ($nom==='BA') {

    echo 'Hello '. $nom ;
}
else
{
    echo  'hello';
}
echo "<br>";

//Operation ternaire

$moyenne=10000;

echo $moyenne> 10 ? "Vous avez la moyenne" : "vous navez pas la moyenne" ;

function detecterLangage($langage){

    switch ($langage) {
        case 'java':
            echo "Votre langage prefree est le java";
            break;
        case 'PHP':
            echo "Votre langage prefree est le PHP";
            break ;
        case 'C':
            echo "Votre langage prefree est le C";
            break;

        default : echo "Vous navez pas de langage";
    }
}

$langage="C";

detecterLangage($langage);

//Les tableaux en PHP
echo "<br>";

$amis=array("Keba","Sara","Mamour","ziz");

echo  "Mes amis sont" . " " .$amis[0] . "et  " . " " .$amis[1];

$religions=array("Musulman","Christianisme","Juif");

foreach ($religions as $religion){

    echo  "<br>". $religion ."<br>" ;
}

//La boucle for en PHp
echo  "<br>" ;
$voitures=array("Bus","Taxi","Velo");

for($i=0 ;$i<count($voitures);$i++){

    echo "<br>". $voitures[$i];
}

echo "<br>" ;echo "<br>" ;

function multiplications($n)
{
    return($n * $n);
}
$tab = array(1,2,3,4);
print_r(array_map("multiplications", $tab));

//Transformer PHP en JSON
echo "<br>" ;

echo "Aujourd'hui c'est " .date("d/m/yy");

$isNullll=false ;

if(is_null($isNullll)){

    echo "la variable est null";

}
else
{
    echo "la variable nest  pas null";
}

?>
