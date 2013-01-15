<?php

class Controller{
	
	private $aViewVars = array();
	private $layout = 'defaut';
	
	public function set($aInfoForViews){
		$this->aViewVars = array_merge($this->aViewVars, $aInfoForViews);
	}
	
	public function render($fileName){
		extract($this->aViewVars);
		ob_start();
		require ROOT.'views/'.get_class($this).'/'.$fileName.'.php';
		$contentForLayout = ob_get_clean();
		if ($this->layout == false){
			echo $contentForLayout;
		}else{
			require ROOT.'views/layout/'.$this->layout.'.php';
		}
	}
	
	public function loadModel($modelFileName){
		require_once ROOT.'models/'.$modelFileName.'.php';
		$this->$modelFileName = new $modelFileName();
	}
	
}
