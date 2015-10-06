<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MX_Controller {
	public function index(){
		echo phpinfo();
	}
}