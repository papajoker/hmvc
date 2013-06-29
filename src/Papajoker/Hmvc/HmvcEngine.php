<?php namespace papajoker\Hmvc;

use Illuminate\View\Engines\EngineInterface;

class HmvcEngine implements EngineInterface
{
	
	private $controller = false;
	private $attr = array();
	private $action = 'index';

	/**
         * Get the evaluated contents of the view.
         *
         * @param  string  $path .mhvc
         * @param  array   $data override attr in .mhvc
         * @return string
         */
	public function get($path, array $data = array())
	{
		$this->extract($data);
		$this->setConfig($path,$data);
		
		return $this->run();
	}
	
	/**
	 * load mhvc file
	 */
	protected function setConfig($path, array $data)
	{
		$conf = \File::getRequire($path);
		$this->controller=$conf['controller'];

		$this->attr = (array_key_exists('attr',$conf)) ? $conf['attr'] : array();
		// overwrite attr in file hmvc ?
		$this->attr = array_merge($this->attr, $data);
		$this->action = (array_key_exists('action',$conf)) ? $conf['action'] : 'index';
	}
	
	/**
	 *  load controller in hmvc file
	 *  run action in hmvc file
	 */
	protected function run()
	{
		// php artisan dump-autoload
		$controller = new $this->controller();
		return $controller->{$this->action}(
			 $this->attr
			);
	}
	
	/*
	 * want only datas for attr
	 */
	private function extract(&$data){
		unset($data['__env']);
		unset($data['app']);
		unset($data['errors']);
		unset($data['path']);
	}	
}