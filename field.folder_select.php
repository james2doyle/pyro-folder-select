<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Folder Select Field Type
 *
 * @package		Addons\Field Types
 * @author		James Doyle (james2doyle)
 * @license		MIT License
 * @link		http://github.com/james2doyle/pyro-folder-select
 */
class Field_folder_select
{
	public $field_type_slug    = 'folder_select';
	public $db_col_type        = 'int';
	public $version            = '1.0.1';
	public $author             = array('name'=>'James Doyle', 'url'=>'http://github.com/james2doyle/pyro-folder-select');
	// public $custom_parameters  = array('folder_select');

	// --------------------------------------------------------------------------

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('files/file_folders_m');
	}

	/**
	 * Output form input
	 *
	 * @param	array
	 * @param	array
	 * @return	string
	 */
	public function form_output($data, $entry_id, $field)
	{
		$folders = $this->CI->file_folders_m->get_all();
		$values = array_for_select($folders, 'id', 'name');
		$dropdown = form_dropdown($data['form_slug'], array('-1' => 'None') + $values, $data['value']);
		return sprintf("<div id=\"%s_folder_select\" class=\"folder_select\">%s</div>", $data['form_slug'], $dropdown);
	}

	public function event($field)
	{
		// $this->CI->type->add_js('folder_select', 'folder_select.js');
		// $this->CI->type->add_css('folder_select', 'folder_select.css');
	}
}
