<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ningoldprocess extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->output->enable_profiler(FALSE);
	}
	public function index()
	{
		if(null ==($this->session->userdata('gold'))){
			$gold = 0;
		}
		else{
			$gold = $this->session->userdata('gold');
		}
		
		if(null == $this->session->userdata('activity')){
			$activity = array();
		}
		else{
			$activity = $this->session->userdata('activity');
		}

		if($this->input->get('shop')=='farm'){
			$gain = rand(10,20);
			$win = 1;
			array_push($activity, "<p style='color:green'>You went to a farm and won $gain gold.</p>");
		}

		if($this->input->get('shop')=='cave'){
			$gain = rand(5,10);
			$win = 1;
			array_push($activity, "<p style='color:green'>You went to a cave and won $gain gold.</p>");
		}

		if($this->input->get('shop')=='house'){
			$gain = rand(2,5);
			$win = 1;
			array_push($activity, "<p style='color:green'>You went to a house and won $gain gold.</p>");
		}
		
		if($this->input->get('shop')=='casino'){
			$win = rand(0,1);
			$val = rand(0,50);
			if($win == 1){
				$gain = $val;
				array_push($activity, "<p style='color:green'>You went to a casino and won $gain gold. Lucky!</p>");
			}
			else{
				$gain = $val * -1;
				array_push($activity, "<p style='color:red'>You went to a casino and lost $val gold. Bummer..</p>");
			}
		}

		if($this->input->get('shop')==null){
			$gain = 0; //catches errors caused by url manipulation / back button
			$win = 0;
		}

		$gold = $gain + $gold;
		$this->session->set_userdata('gold',$gold);
		$this->session->set_userdata('activity',$activity);
		$this->session->set_userdata('win',$win);
		$this->load->view('ningoldresult');
	}
}
