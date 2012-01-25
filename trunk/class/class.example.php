<?php
/**
* PHP Source File
* @author	Alyx Association <info@alyx.it>
* @version 2.1.0
* @copyright	Alyx Association 2008-2011
* @license GNU Public License
*/

require_once("../require.inc.php");

/*************************************************************************/

final class example extends jampBase {
	public function execute() {
		$this->doEvent('example.xml');
	}

	public function html_load() {
		$code = <<< JAVASCRIPT
SYSTEMEVENT.showHTML('Esempio', '<font color="blue" size=+2>Benvenuti nella nuova gestione degli eventi tramite gestione a classi</font>');
JAVASCRIPT;
		$this->setCodeJS($code);
	}

	public function data_after_update($ds) {
		$code = <<< JAVASCRIPT
SYSTEMEVENT.showHTML('data_after_update', '<font color="green">Evento data_after_update</font>');
JAVASCRIPT;
		$this->setCodeJS($code);
	}

}


/*
 * Caricamento ed esecuzione della classe
 */

$class = new example();
$class->execute();
exit;

