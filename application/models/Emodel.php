<?php 
class Emodel extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function login()
        {
        	$emailId= $this->input->post('email');
        	$passWord= $this->input->post('password');
        	$query = $this->db->query("SELECT * FROM users where email='$emailId' AND password='$passWord'");
        	return $query->result();
        }

        public function signup()
        {
        	$new_user = array(
        	'username' => $this->input->post('username'),
        	'email' => $this->input->post('email'),
        	'password' => $this->input->post('password')
        	);
			return $this->db->insert('users',$new_user);	
        }

        public function create_petition($filename)
        {
        	$new_petition = array(
        	'heading' => $this->input->post('heading'),
        	'category' => $this->input->post('category'),
        	'description' => $this->input->post('description'),
        	'image' => $filename
        	);
			$this->db->insert('petitions',$new_petition);
			$insert_id = $this->db->insert_id();
  			return  $insert_id;	
        }

        public function viewPetition($id)
        {
            $postNcomment = array();

            $query = $this->db->query("Select * from petitions where petitionId='$id'");
            $row = $query->row();
            array_push($postNcomment, $row);

            $query = $this->db->query("Select users.username ,comments.comment from comments INNER JOIN users ON comments.userId=users.userid where petitionId='$id' ORDER BY commentId DESC");
            $comments = array();
            foreach ($query->result() as $row)
            {
                array_push($comments, $row);
            }
            array_push($postNcomment, $comments);

            $query = $this->db->query(" Select likes from responses where likes = 1 ");
            array_push( $postNcomment, $query->num_rows() );

            $query = $this->db->query(" Select sign from responses where sign = 1 ");
            array_push( $postNcomment, $query->num_rows() );

            return $postNcomment;
        }

        public function latestPost()
        {
            $query = $this->db->query("Select * from petitions ORDER BY petitionId DESC LIMIT 4");
            $results = array();
            foreach ($query->result() as $row)
            {
                array_push($results, $row);
            }
            return ($results);
        }

        public function chooseCategory()
        {
            $category = $this->input->post('category');

            if($category == 'all')
                $query = $this->db->query("Select * from petitions order by petitionId DESC");
            else 
                $query = $this->db->query("Select * from petitions where category='$category' order by petitionId DESC");
            $results = array();
            foreach ($query->result() as $row)
            {
                array_push($results, $row);
            }
            return ($results);    
        }

        public function comment()
        {
            $petitionId = $this->input->post('petitionId');

            $new_comment = array(
            'userid' => $_SESSION['userid'],
            'petitionId' => $petitionId,
            'comment' => $this->input->post('comment'),
            );
            $this->db->insert('comments',$new_comment);
        }

        public function like($petitionId)
        {
            $id = $_SESSION['userid'];
            $query = $this->db->query("Select * from responses where user_id='$id' AND petition_id='$petitionId' ");
            $row=$query->result();
            if($row)
            {
                $responseId = $row[0]->responses_id;
                if($row[0]->likes)
                {
                    $data=array('likes'=>0);
                    $this->db->where('responses_id',$responseId);
                    $this->db->update('responses',$data);
                    return 1;
                }
                else
                {
                    $data=array('likes'=>1);
                    $this->db->where('responses_id',$responseId);
                    $this->db->update('responses',$data);
                    return 1;
                }
            }
            else
            {
                $new_like = array(
                'user_id' => $_SESSION['userid'],
                'petitionId' => $petitionId,
                'likes' => 1,
                );
                $this->db->insert('responses',$new_like);
            }
            // var_dump($row);
        }

        public function BothStatus($petitionId)
        {
            if( isset($_SESSION['userid']) )
            {    
                $id = $_SESSION['userid'];
                $query = $this->db->query("Select * from responses where user_id='$id' AND petition_id='$petitionId' ");
                $row=$query->result();
                if($row)
                {    
                    $like_status = $row[0]->likes;
                    $sign_status = $row[0]->sign;
                    $status = array();
                    array_push($status, $like_status);
                    array_push($status, $sign_status);
                    return $status;
                }
                else
                {
                    $like_status = 0;
                    $sign_status = 0;
                    $status = array();
                    array_push($status, $like_status);
                    array_push($status, $sign_status);
                    return $status;
                }
            }
            else
            {
                    $like_status = 0;
                    $sign_status = 0;
                    $status = array();
                    array_push($status, $like_status);
                    array_push($status, $sign_status);
                    return $status;
            }    

        }



}

?>