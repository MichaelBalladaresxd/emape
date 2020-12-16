<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_datos extends CI_Model {

	function __construct() {
        parent::__construct();
        $this->load->database();

    }

	public function getMax($table, $max, $where=false){
		try {

			$this->db->select_max($max);
			if($where != false) {
				$this->db->where($where);
			}
			// echo $data = $this->db->get_compiled_select($table);exit;
			// $data = $this->db->get($table);
			$data = $this->db->get($table);
			if (!$data) {
				$db_error = $this->db->error();
				$data['result'] = 'ERROR';
				$data['msj'] = "Code: ".$db_error['code'].'<br>Mensaje: '.$db_error['message'];
				return $data;
			}else{
				$result = 'row';
				if ($result=='row') {
					return $data->row();
				} else {
					return $data->result();
				}
			}
		} catch (Exception $e) {
			throw new Exception($e);
			return $e->getMessage();
		}
	}

	public function queryBending($sql, $params, $result=false){
		try {
			$data = $this->db->query($sql, $params);
			if (!$data) {
				$db_error = $this->db->error();
				$data['result'] = 'ERROR';
				$data['msj'] = "Code: ".$db_error['code'].'<br>Mensaje: '.$db_error['message'];
				return $data;
			}else{
				if ($result=='row') {
					return $data->row();
				} else {
					return $data->result();
				}
			}
		} catch (Exception $e) {
			throw new Exception($e);
			return $e->getMessage();
		}
	}

	public function get($table, $where=false, $result=false, $like = false){
		try {
			if($where != false) {
				$this->db->where($where);
			}

			if ($like != false) {
				$i = 0;
				foreach ($like as $key => $value) {
					if ($i == 0) {
						$this->db->like($key,$value);
					}else{
						$this->db->or_like($key,$value);
					}
					$i++;
				}
			}
			// echo $data = $this->db->get_compiled_select($table);exit;
			// $data = $this->db->get($table);
			$data = $this->db->get($table);
			if (!$data) {
				$db_error = $this->db->error();
				$data['result'] = 'ERROR';
				$data['msj'] = "Code: ".$db_error['code'].'<br>Mensaje: '.$db_error['message'];
				return $data;
			}else{
				if ($result=='row') {
					return $data->row();
				} else {
					return $data->result();
				}
			}
		} catch (Exception $e) {
			throw new Exception($e);
			return $e->getMessage();
		}
	}

	public function getQuery($sql, $result=false){
		$data = $this->db->query($sql);
		if ($result=='row') {
			return $data->row();
		}else{
			 $result['data'] = $data->result();
			 return $result;
			 //return $result;
		}
	}

	public function insert($table, $dato){		
		try {
			// $dato['fecreg']		= now();
			// $dato['userreg'] 	= (isset($_SESSION['idUser']))?$_SESSION['idUser']:'';
			$result = $this->db->insert($table, $dato);
			if (!$result) {
				$db_error = $this->db->error();
				$data['result'] = 'ERROR';
				$data['msj'] = "Code: ".$db_error['code'].'<br>Mensaje: '.$db_error['message'];
				return $data;
			}else{
				$data['result'] = 'OK';
				$data['id'] = $this->db->insert_id();
				$data['msj'] = "Se registro con éxito.";
				return $data;
			}
		} catch (Exception $e) {
			throw new Exception($e);
			return $e->getMessage();
		}	
	}
	
	public function update($table, $dato, $where){
		try {
			//$dato['feccmod'] = now();
			$result = $this->db->update($table, $dato, $where);
			if (!$result) {
				$db_error = $this->db->error();
				$data['result'] = 'ERROR';
				$data['msj'] = $db_error['message'];
			}else{
				$data['result'] = 'OK';
				$data['msj'] = "Actualizado con éxito.";
			}
			return $data;
		} catch (Exception $e) {
			throw new Exception($e);
			return $e->getMessage();
		}		
	}
	
	public function delete($table, $where){
		try {
			$this->db->delete($table, $where);
			if($this->db->affected_rows() != 1) {
				$db_error = $this->db->error();
				$data['result'] = 'ERROR';
				$data['msj'] = "Code: ".$db_error['code'].'<br>Mensaje: '.$db_error['message'];
				return $data;
			}else{
				$data['result'] = 'OK';
				$data['msj'] = "Se elimino con éxito.";
				return $data;
			}
		} catch (Exception $e) {
			$data['result'] = 'ERROR';
			$data['msj'] = $db_error['message'];
			return $data;
		}	
	}

	public function listar($tabla, $campos, $where=false, $like=false, $whereIni = false){

		$columns		= $_POST['columns'];
		$pgStart		= $_POST['start'];
		$pgSize			= $_POST['length'];
		$buscar 		= $_POST['search'];
		$busqueda 		= $buscar['value'];
		$sort			= $_POST['order'];

		$orden = '';
		$dividir = '';
		foreach ($sort as $key => $value) {
			$column_name	= $columns[$value['column']]['data'];
			$column_order	= $value['dir'];
			$orden .=$dividir. $column_name.' '.$column_order.' ';
			$dividir = ', ';
		}
		// echo json_encode($where);exit;

		$response = array();
		$this->db->start_cache();
		$this->db->select($campos);
		$this->db->from($tabla);
		if ($whereIni == false) {
			$response['recordsTotal'] = $this->db->count_all_results();
		}
		if ($like != false) {
			$i = 0;
			foreach ($like as $key => $value) {
				if ($i == 0) {
					$this->db->like($key,$value);
				}else{
					$this->db->or_like($key,$value);
				}
				$i++;
			}
		}
		if ($where != false) {
			foreach ($where as $key => $value) {
				$this->db->where($key,$value);
			}
		}

		if ($whereIni != false) {
			foreach ($whereIni as $key => $value) {
				$this->db->where_in($key,$value);
			}
			$response['recordsTotal'] = $this->db->count_all_results();
		}
		$this->db->stop_cache();
		$response['recordsFiltered'] = $this->db->count_all_results();

		

		$this->db->order_by($orden);
		if((int)$pgSize > 0){
			$this->db->limit($pgSize,$pgStart);
		}
		$query = $this->db->get();
		$response['data'] = $query->result();
		$this->db->flush_cache();
		return $response;
	}

	public function getExcel($tabla, $campos, $where=false, $like=false){
		$head = explode(",", $campos);
		foreach ($head as $key => $value) {
			$cabecera[] =  trim($value);
		}
		$response['cabecera'] = $cabecera;
		
		$this->db->start_cache();
		$this->db->select($campos);
		$this->db->from($tabla);
		if ($like != false) {
			$i = 0;
			foreach ($like as $key => $value) {
				if ($i == 0) {
					$this->db->like($key,$value);
				}else{
					$this->db->or_like($key,$value);
				}
				$i++;
			}
		}
		if ($where != false) {
			foreach ($where as $key => $value) {
				$this->db->where($key,$value);
			}
		}
		$this->db->stop_cache();

		$query = $this->db->get();
		$response['data'] = $query->result();
		$this->db->flush_cache();
		return $response;	
	}

}

/* End of file M_datos.php */
/* Location: ./application/models/M_datos.php */