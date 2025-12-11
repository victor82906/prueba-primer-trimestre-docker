
<h2>¿Independizar Linares de la provincia de Jaén?</h2>
<form method="POST">
    <label>SI (vota aqui)</label>
    <input type="radio" name="lenguaje" value="si"> <br>
    <label>NO</label>
    <input type="radio" name="lenguaje" value="no"> <br>
    <button type="submit">Votar</button>
</form>

<?php

$conexion = new PDO('mysql:host=prueba_encuesta;port=3306;dbname=encuesta', 'root', 'root');
// en host tengo que poner en nombre que le doy a la base en el compose


// ENCUESTA

if(isset($_POST['lenguaje'])){
    $voto = $_POST['lenguaje'];

    $sql = "INSERT INTO votos (voto) VALUES('" . $voto . "')";
    $stmt = $conexion->prepare($sql);

    if ($stmt->execute()) {
        echo "✅ Voto guardado correctamente.<br>";
    }else{
        echo "❌ Error al guardar el voto.<br>";
    }
}


// RESULTADOS

$sql = "SELECT voto, COUNT(*) AS total FROM votos GROUP BY voto";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$votos = $stmt->fetchAll(\PDO::FETCH_ASSOC);

if(count($votos) === 0){
    echo "No hay votaciones";
}else{
    for($i = 0; $i < count($votos); $i++){
        echo "<br><strong>" . $votos[$i]['voto'] . "</strong> tiene ". $votos[$i]['total'] . " votos";
    }
}


echo "<br><br>Muestro balanceo. IP: ".$_SERVER["SERVER_ADDR"];

?>
