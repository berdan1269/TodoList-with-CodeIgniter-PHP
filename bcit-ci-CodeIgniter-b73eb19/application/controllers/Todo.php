<?php
class Todo extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("todo_model");
	}

	//siteadı/controlleradı/metodaadı/paremetre1/parametreN..
	public function index(){



		$items = $this->todo_model->get_all();

		$viewData=array(
			"todos"=>$items
			//burdaki indisler view kısmında bir değişkene dönüşür
			//ve kullanmak istedigimizde todosu kullanırız.
		);

		$this->load->view("todo_list",$viewData);


	}

	public function insert(){

  	$todo_title= $_POST['todo_title'];
  	$todo_priority=$_POST["todo_priority"];

  	$todo_finishdate =$_POST['todo_finishdate'];

  	if($todo_finishdate ==0000-00-00){
  		$todo_finishdate = null;
	}

  	$insert =	$this->todo_model->insert(array(
		"title"=>$todo_title,
		"isCompleted"=>0,
		"createdAt"=>date("Y-m-d"),
		"priority"=>$todo_priority,
		"finishdate"=>$todo_finishdate

	));

  	if($insert){

  		redirect(base_url());

	}

	}
	public function delete($id){


		$delete = $this->todo_model->delete($id);

		if($delete){
			redirect(base_url());
		}

	}

	public function isCompletedSetter($id){

		$completed = ($this->input->post("completed") =="true") ? 1 : 0;


		$this->todo_model->update($id,array(

			"isCompleted"=>$completed

		));

	}

}
