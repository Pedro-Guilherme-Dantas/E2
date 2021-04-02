<?php 

function showMedias($key)
{
	// Mostra as médias e contagens
	$linhas = explode("\n", file_get_contents("./base.txt"));
    
	$divisao = explode("->", $linhas[$key]);

	return $divisao[1];

}

function validate()
{
	include "config.php";
	if (isset($_POST['btnEnviar'])) {

		$InpCpf = $_POST['inpCpf'];

		$buscaCpf = "SELECT CPF_CPF FROM CPFS WHERE CPF_CPF = '$InpCpf' ";
		$queryCpfs = mysqli_query($connect, $buscaCpf);

		$result = mysqli_fetch_array($queryCpfs);

		if (!empty($result)) {
			echo "Cpf já cadastrado!";
		} else {

			$cidade = $_POST['selectCidade'];

			$idade = $_POST['inpIdade'];
			$gpRisco = $_POST['check1'];
			$historicoInfeccao = $_POST['check2'];
			$situacaoVacina = $_POST['check3'];

			if (validaCpf($InpCpf) == true) {
				$insertSql = "INSERT INTO CPFS (CPF_CPF) VALUES ('$InpCpf') ";
				$insert = mysqli_query($connect, $insertSql);
				// echo "cidade: $cidade   idade: $idade   gr?: $gpRisco   infectado?:  $infec   sitvac: $vac";
				// echo "<script>alert('Obrigado pela contribuição!');</script>";

				$arquivo = "dados.csv";

				
				$fp = fopen($arquivo, "a+");
				$data = date("Y-m-d");
				$texto = "\n$data,$historicoInfeccao,".'"'.$cidade.'"'.",$idade,$gpRisco,$situacaoVacina";
				fwrite($fp, $texto);
				
				
				fclose($fp);

				sleep(3);
				header("Location:index.php");


			} else {
				echo "<script>alert('Cpf inválido!');</script>";
			}
		}

	}
}


function validaCpf($cpf)
{
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}

function criarSelect()
{

	include "config.php";
	$buscaCidades = "SELECT CID_NAME FROM cidades";
	$queryCidades = mysqli_query($connect, $buscaCidades);

	while ($res = mysqli_fetch_array($queryCidades)) {
		echo "<option>".$res['CID_NAME']."</option>";
	}

}

?>