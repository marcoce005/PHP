<?php
//Creazione oggetto mysqli per realizzare la connessione 
$con = new mysqli("127.0.0.1","root","","utenti");
if (mysqli_connect_errno()) {
      echo("Connessione non effettuata: ".mysqli_connect_error()."<BR>");
      exit();
}
//Definizione stringa contenente comando SQL
$sql = "SELECT ID_utente,nome_utente,psw,conta_pres FROM users WHERE conta_pres<>0";
//Esecuzione query che restituisce $ris
$ris = $con->query($sql) or die ("Query fallita!");
//Genero tabella di visualizzazione
echo "<TABLE><TR><TH>ID utente<TH>Nome utente<TH>Password<TH>Contatore visite</TR>";
//Ciclo foreach legge gli elementi del resultset $ris
foreach($ris as $riga) 
{
   echo "<TR><TD>".$riga["ID_utente"];
   echo "<TD>".$riga["nome_utente"];
   echo "<TD>".$riga["psw"];
   echo "<TD>".$riga["conta_pres"];
}
//rilascio connessione
$con->close();
?>

