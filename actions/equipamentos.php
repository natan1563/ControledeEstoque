<?php

 $sql = "SELECT id_equipamento, nome_equipamento FROM equipamentos";
 $query = mysqli_query($conexao, $sql);


while ($dados = mysqli_fetch_array($query)) { ?>
	<option value="<?=$dados[0]?>"><?=$dados[1]?></option>';
<?php 
}

?>