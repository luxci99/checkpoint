<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
inicializa();
protegeArquivo(basename(__FILE__));
function inicializa(){
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
	
	if(file_exists(dirname(__FILE__).'/config.php')):
		require_once(dirname(__FILE__).'/config.php');
	else:
		die(utf8_decode("O arquivo de configuração não foi localizado, contate o administrador"));
	endif;
	$constantes = array('BASEPATH', 'BASEURL', 'ADMURL', 'CLASSESPATH', 'MODULOSPATH', 'CSSPATH', 'JSPATH', 'DBHOST', 'DBUSER', 'DBPASS', 'DBNAME');
	foreach ($constantes as $valor) {
		if(!defined($valor)):
			die(utf8_decode("Faltam configurações básicas do sistema, contate o administrador: ".$valor));
		endif;
	}
	
	require_once(BASEPATH.CLASSESPATH.'/autoload.php');
}

?>