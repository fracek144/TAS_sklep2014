/**
 * Parses the request URL into action and parameters.
 * @package    Core
 * @author 	   nameless
 */
class Router {
 
	protected $paramsURL;
	protected $file;
	private $paramsModel;
	private $model;
	private $action;
 
/**
 * URL to array
 * @return array URL
 * @access public
 */
	public function __construct($file = 'index.php') {
 
		if(stristr($_SERVER['REQUEST_URI'], $file)) {
			$tabURL = explode($file.'/',$_SERVER['REQUEST_URI']);
		}
		$this -> paramsURL = explode('/', $tabURL[1]);
	}
 
/**
 * Gets Models list
 * @return array
 * @access public
 */
	public function getModelsList() {
		return $this -> models = array('news','user','gallery');
	}
 
/**
 * Gets Actions list
 * @return array
 * @access public
 */
	public function getActionsList() {
		//return $this -> actions = array('login' => 'login', 'name' => 'showname');
	}
 
/**
 * Gets parameter URL information
 * @return string Model information
 * @access public
 */
	public function getModel() {
		return $model = $this -> paramsURL[0];
	}
 
/**
 * Gets parameter URL information
 * @return string Action information
 * @access public
 */
	public function getAction() {
		return $action = $this -> paramsURL[1];
	}
 
/**
 * Gets parameter URL information
 * @return array Parameter URL information
 * @access public
 */
	public function getParams() {	
		if(in_array($this -> paramsURL[0], Router::getModelsList())) {
				foreach($this -> paramsURL as $value) {
					$paramsModel[] = $value;				
				}
				array_shift($paramsModel);
				array_shift($paramsModel);
				return $paramsModel;
		}
	}
 
}
 
/**
 * Controller class
 * @package    Core
 * @author     Lib
 */
class Controller {
 
	public $modelsPOST = array('user');
 
/**
 * Controller Var-s
 * @return data
 * @access public
 */
	public function __construct() {
		$router = new Router();
		$this -> model = $router -> getModel();
		$this -> action = $router -> getAction();
		$this -> params = $router -> getParams();
		$this -> models_list = array('news','user','gallery');
		$this -> actions_list = $router -> getActionsList();
		Controller::__autoload($this -> model);
	}
 
/**
 * Load the classes
 * @return model file
 * @access public
 */
	function __autoload($name) {
		if(in_array($name, $this -> models_list)) {
      		require('/lib/'.'class.'.$name.'.php');
		} else {
			throw new Exception('Model not found!');
		}
 
  	}
 
/**
 * Load action and display view
 * @return Action and View
 * @access public
 */
	public function loadAction() {
			$methods = get_class_methods($this -> model);
			foreach($methods as $arr) {
				$array_methods[] = strtolower($arr);
			}
			if(in_array($this -> model, $this -> modelsPOST)) {
				array_pop($_POST);
				$this -> params = $_POST;
				print_r($_POST);
			}
			if($this -> action == '') {
				$this -> action = '__construct';
				$module = new $this -> model($this -> params);
			} else {
			if(in_array($this -> action, $array_methods))
			{
				$module = new $this -> model($this -> params);
				$moduleAction = $this -> action;
				$module -> $moduleAction();
			} else {
				throw new Exception('Action not found!');
			}
			}
	}
}
try {
	$ctrl = new Controller();
	$ctrl -> loadAction();
} catch(Exception $e) {
	echo $e -> getMessage();
}
 
#News
/*class news {
 
	public function __construct($args) {
		$this -> id = $args[0];
		$this -> content = $args[1];
		$this -> author = $args[2];
	}
 
	public function showNews() {
		echo $this -> id . $this -> content . $this -> author;
	}
}*/
#User
/*class user {
	public function __construct($args) {
		$this -> username = $args['login'];
		$this -> password = $args['password'];
	}
 
	public function Login() {
		if($this -> username == 'admin' and $this -> password == 'test') {
			echo 'Zalogowano';
		}
	}
}*/
?>