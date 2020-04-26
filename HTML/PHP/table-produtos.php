<?php
define('DB_SERVIDOR', 'localhost');
define('DB_USUARIO', 'keydev44_admpi');
define('DB_SENHA', '@zxasqw12');
define('DB_NOME', 'keydev44_pizzaria');

/* Tentativa de conexao */
$link = mysqli_connect(DB_SERVIDOR, DB_USUARIO, DB_SENHA, DB_NOME);
$result = mysqli_query($link, "SELECT cod_produto as 'Código', descricao as 'Nome', ingredientes as 'Descrição', categoria as 'Categoria', preco as 'Valor', disponibilidade as 'Status' FROM produto");
echo '<div id="list-produtos" style="display: none;">';
echo '<h1>Produtos</h1>';
echo "<table class='table'>
<thead class='thead-dark'>
<tr>
<th scope='col'>Código</th>
<th scope='col'>Nome</th>
<th scope='col'>Descrição</th>
<th scope='col'>Categoria</th>
<th scope='col'>Valor</th>
<th scope='col'>Status</th>
</tr>
</thead>";

while($row = mysqli_fetch_array($result))
{
    echo "<tbody>";
    echo "<tr scope='row'>";
    echo "<td>" . $row['Código'] . "</td>";
    echo "<td>" . $row['Nome'] . "</td>";
    echo "<td>" . $row['Descrição'] . "</td>";
    echo "<td>" . $row['Categoria'] . "</td>";
    echo "<td>" . $row['Valor'] . "</td>";
    echo "<td>" . $row['Status'] . "</td>";
    echo "</tr>";
    echo "</tbody>";
}
echo "</table>";
echo '</div>';
mysqli_close($link);
?>