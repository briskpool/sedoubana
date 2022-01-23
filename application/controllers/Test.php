<?php 
/**
 * 
 */
class Test extends CI_Controller
{
	function index()
	{	
		$this->db->like('name', 'sh', 'after');
		$query=$this->db->get('cities');
		?>
		<select name="" id="">
			<?php
		foreach ($query->result() as $row) {
			?>
				
				<option value=""><?= $row->name;?></option>
			
			<?php
		}
		?>
		</select>
		<input type="text" onkeydown="alert('hello');">
		<?php
	}
	
}
 ?>