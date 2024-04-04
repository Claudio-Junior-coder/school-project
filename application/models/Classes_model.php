<?php
 
 
class Classes_model extends CI_Model{
 
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
        $classes = $this->db->get("classes")->result();
        return $classes;
    }
     
    /*
        Store the record in the database
    */
    public function store()
    {            
        $data = $this->getData ();

        $result = $this->db->insert('classes', $data);
        return $result;
    }

    /*
        Get an specific record from the database
    */
    public function get($id)
    {
        $result = $this->db->get_where('classes', ['id' => $id ])->row();
        return $result;
    }

    /*
        Get an specific record from the database by class_id
    */
    public function getByClassIdVacancies($id)
    {
        $this->db->select('vacancies');
        $result = $this->db->get_where('classes', ['id' => $id ])->row();
        return $result;
    }

    /*
        Update or Modify a record in the database
    */
    public function update($id) 
    {
        $data = $this->getData ();
 
        $result = $this->db->where('id',$id)->update('classes',$data);
        return $result;
                 
    }

    /*
        Destroy or Remove a record in the database
    */
    public function delete($id)
    {
        $result = $this->db->delete('classes', array('id' => $id));
        return $result;
    }

    public function getData () {
        return $data = [
            'serie' => $this->input->post('serie'),
            'shift' => $this->input->post('shift'),
            'room' => $this->input->post('room'),
            'vacancies' => $this->input->post('vacancies'),
        ];
    }
}
?>