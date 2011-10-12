<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * AK Layout - A simple view layout library for CodeIgniter
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    Libraries
 * @version     0.1.0
 * @author      Aaron Kuzemchak <aaron@kuzemchak.net>
 * @copyright   Copyright (c) 2011, Aaron Kuzemchak
 */
class Ak_layout {
	
	/**
	 * @var     object     CodeIgniter instance
	 * @access  protected
	 */
	protected $CI;
	
	/**
	 * @var     array      View data
	 * @access  protected
	 */
	protected $data = array();
	
	/**
	 * @var     string     Default layout
	 * @access  protected
	 */
	protected $layout = '';
	
	/**
	 * Constructor
	 *
	 * @param  array  Initial configuration settings
	 */
	public function __construct($config = array())
	{
		$this->CI =& get_instance();
		
		// setup config options
		if( ! empty($config))
		{
			$this->layout = $config['default_layout'];
		}
	}
	
	/**
	 * Render the layout
	 *
	 * @param  null|string  The layout
	 * @param  bool         If TRUE, return the output
	 */
	public function render($layout = NULL, $return = FALSE)
	{
		// if layout is passed, use it instead of default
		$layout = ( ! $layout) ? $this->layout : $layout;
		
		return $this->CI->load->view($layout, $this->data, $return);
	}
	
	/**
	 * Set layout variables
	 *
	 * @param  string  The variable name
	 * @param  mixed   The variable value
	 * @param  bool    If TRUE, encode HTML
	 */
	public function set($name, $val, $encode = FALSE)
	{
		// encode html if specified
		$val = ($encode) ? htmlentities($val) : $val;
		
		$this->data[$name] = $val;
		
		return $this;
	}
	
	/**
	 * Set layout partial
	 *
	 * @param  string  The variable name
	 * @param  string  The view to load for content
	 * @param  array   View data for the partial
	 */
	public function partial($name, $view, $data = array())
	{
		$this->data[$name] = $this->CI->load->view($view, $data, TRUE);
		
		return $this;
	}
	
	/**
	 * Set global variables to be used in any view
	 *
	 * @param  string  The variable name
	 * @param  mixed   The variable value
	 * @param  bool    If TRUE, encode HTML
	 */
	public function set_global($name, $val, $encode = FALSE)
	{
		// encode html if specified
		$val = ($encode) ? htmlentities($val) : $val;
		
		$this->CI->load->vars(array(
			$name => $val
		));
		
		return $this;
	}
	
}

/* End of file ak_layout.php */