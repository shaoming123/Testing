<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class blog_m extends CI_Model{

		public function getPosts(){
			$query = $this->db->get('blog');
			if($query->num_rows() > 0){

				return $query->result();

			}}

		public function getuser(){
			$query = $this->db->get('user');
			if($query->num_rows() > 0){

				return $query->result();

			}

		}
		public function addPost($data){		
				return $this->db->insert('blog', $data);
			
				}

		

		public function singlepost($id){

		
			$query = $this->db->get_where('blog', array('id' => $id));
			if($query->num_rows() > 0){
		
				return $query->row();

			
		}else{
			

		}

		}
		public function updatePost($data, $id){
			return $this->db->where('id',$id)
						->update('blog', $data);
		}

		public function deletepost($id){
			 return $this->db->delete('blog',['id' => $id]);
			
		}
		public function File_upload($data){
			return $this->db->insert('blog', $data);
		}
		


	}


?>