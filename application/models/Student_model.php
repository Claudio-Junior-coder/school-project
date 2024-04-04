<?php
 
 
class Student_model extends CI_Model{
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
 
    /*
        Get all the records from the database
    */
    public function get_all()
    {
        $students = $this->db->get("students")->result();
        return $students;
    }

    /* Search by student */
    public function search($search) {

        $query = $this->db->select('*')->from('students')->where("name ILIKE '%$search%'")->get()->result_array();

        return $query;
    }
 
    /*
        Store the record in the database
    */
    public function store()
    {    
        $data = $this->getData ();
 
        $result = $this->db->insert('students', $data);
        return $result;
    }
 
    /*
        Get an specific record from the database
    */
    public function get($id)
    {
        $result = $this->db->get_where('students', ['id' => $id ])->row();
        return $result;
    }
 
 
    /*
        Update or Modify a record in the database
    */
    public function update($id) 
    {
        $data = $this->getData ();
 
        $result = $this->db->where('id',$id)->update('students',$data);
        return $result;
                 
    }
 
    /*
        Destroy or Remove a record in the database
    */
    public function delete($id)
    {
        $result = $this->db->delete('students', array('id' => $id));
        return $result;
    }

    public function getData () {
        return $data = [
            'name' => $this->input->post('name'),
            'date' => $this->input->post('date'),
            'address' => $this->input->post('address'),
            'responsible' => $this->input->post('responsible'),
            'contact' => $this->input->post('contact'),
        ];
    }
     
}
?>