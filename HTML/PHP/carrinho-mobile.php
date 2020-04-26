<?php
// Create connection
$con=mysqli_connect("localhost","keydev44_admpi","@zxasqw12","keydev44_pizzaria");
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$cliente = $_GET["usuario"];

// Select all of our stocks from table 'stock_tracker'
$sql = "

SELECT cod_produto, descricao, Quantidade, Preco, categoria, complemento, cod_carrinho FROM carrinho
INNER JOIN cliente ON cliente.cod_cliente = carrinho.cod_usuario
WHERE cliente.usuario = '$cliente'

";
// Confirm there are results
if ($result = mysqli_query($con, $sql))
{
// We have results, create an array to hold the results
        // and an array to hold the data
$resultArray = array();
$tempArray = array();
// Loop through each result
while($row = $result->fetch_object())
{
// Add each result into the results array
$tempArray = $row;
    array_push($resultArray, $tempArray);
}
// Encode the array to JSON and output the results
echo json_encode($resultArray);
}
// Close connections
mysqli_close($con);
?>