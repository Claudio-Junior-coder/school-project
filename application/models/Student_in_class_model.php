<?php
 
 
class Student_in_class_model extends CI_Model{
 
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
        $classes = $this->db->get("student_in_class")->result();
        return $classes;
    }
     
    /*
        Store the record in the database
    */
    public function store()
    {            
        $data = $this->getData (); 
        $result = $this->db->insert('student_in_class', $data);
        return $result;
    }

    /*
        Get an specific record from the database
    */
    public function get($id)
    {
        $result = $this->db->get_where('student_in_class', ['id' => $id ])->row();
        return $result;
    }

    /*
        Get an specific record from the database
    */
    public function getByClassId($id)
    {
        $this->db->select('COUNT(*)');
        $result = $this->db->get_where('student_in_class', ['class_id' => $id ])->row();
        return $result;
    }

    /*
        Get an specific record from the database by student_id
    */
    public function getByStudentId($id)
    {
        $result = $this->db->get_where('student_in_class', ['student_id' => $id ])->row();
        return $result;
    }

    /*
        Update or Modify a record in the database
    */
    public function update($id) 
    {
        $data = $this->getData ();
 
        $result = $this->db->where('id',$id)->update('student_in_class',$data);
        return $result;
                 
    }

    /*
        Destroy or Remove all records in the database by classId
    */
    public function deleteAllByClassId($id)
    {
        $result = $this->db->delete('student_in_class', array('class_id' => $id));
        return $result;
    }

    /*
        Destroy or Remove a record in the database by studentId
    */
    public function deleteByStudentId($id)
    {
        $result = $this->db->delete('student_in_class', array('student_id' => $id));
        return $result;
    }

    /*
        Destroy or Remove a record in the database
    */
    public function delete($id)
    {
        $result = $this->db->delete('student_in_class', array('id' => $id));
        return $result;
    }

    public function getData () {
        return $data = [
            'class_id' => $this->input->post('class_id'),
            'student_id' => $this->input->post('student_id'),
            'date' => date('d/m/Y h:i:s a', time()),
        ];
    }
}
?>