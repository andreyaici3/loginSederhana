<?php 


/**
 * 
 */
class M_auth extends CI_Model
{
	public function login(){
		// $pass = "1234567890";
		$email = $this->input->post('email');
		$pass = md5($this->input->post('pass'));
		$cek = $this->db->get_where('sid_users',['email' => $email]);

		if ($cek->num_rows() > 0) {
			if ($cek->row()->Active == 1) {
				if ($cek->row()->Password == $pass) {
					//siapkan session setelah login, bisa dirubah apapun
					$data = [
						'id' => $cek->row()->ID,
						'nama_lengkap' => $cek->row()->Nama_Depan . " " . $cek->row()->Nama_Belakang,
						'status' => $cek->row()->Status,
						'keterangan' => $cek->row()->Keterangan
					];

					$this->session->set_userdata(array('login' => $data));
					echo "<script>alert('Login Sukses')</script>";
					redirect('home');
				} else {
					echo "User / Password Salah";
				}
			} else {
				echo "Akun Tidak Aktif";
			}
		} else {
			echo "User / Password Salah";
		}
	}
}