<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Maaf! Silakan masuk terlebih dahulu.</span></div>');
            redirect('cp-admin/auth/login');
        }

        $this->load->model('admin_m', 'admin');
    }

    public function dashboard()
    {
        $id = $this->session->userdata('id');

        $data = array(
            'name' => $this->security->get_csrf_token_name(),
            'role' => $this->admin->getCurrentRole(),
            'user' => $this->admin->getActiveUser(),
            'check' => $this->admin->getSeo(),
            'sidebars' => $this->admin->getSidebar($id),
            'title' => 'Dashboard'
        );

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/footer');
    }

    public function seo()
    {
        $this->form_validation->set_rules('title', 'Title Website', 'required|max_length[60]', array(
            'required' => '%s Harus diisi.',
            'max_length' => '%s Tidak boleh lebih dari 60 karakter.'
        ));
        $this->form_validation->set_rules('description', 'Description', 'max_length[160]', array(
            'max_length' => '%s Tidak boleh lebih dari 160 karakter.'
        ));
        $this->form_validation->set_rules('crawl_landing', 'Crawl Landing Page', 'required', array(
            'required' => '%s Harus dipilih',
        ));
        $this->form_validation->set_rules('follow_landing', 'Follow Landing Page', 'required', array(
            'required' => '%s Harus dipilih',
        ));
        $this->form_validation->set_rules('crawl_admin', 'Crawl Admin Panel', 'required', array(
            'required' => '%s Harus dipilih',
        ));
        $this->form_validation->set_rules('follow_admin', 'Follow Admin Panel', 'required', array(
            'required' => '%s Harus dipilih',
        ));

        if ($this->form_validation->run() == FALSE) {
            $id = $this->session->userdata('id');
            $data = array(
                'user' => $this->admin->getActiveUser(),
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),
                'sidebars' => $this->admin->getSidebar($id),
                'check' => $this->admin->getSeo(),
                'title' => "SEO Management"
            );
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('admin/seo', $data);
            $this->load->view('template/footer');
        } else {
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $meta = $this->input->post('meta');
            $cl = $this->input->post('crawl_landing');
            $fl = $this->input->post('follow_landing');
            $ca = $this->input->post('crawl_admin');
            $fa = $this->input->post('follow_admin');
            $check = $this->admin->getSeo();

            $data = [
                'title' => $title,
                'description' => $description,
                'meta' => $meta,
                'crawl_landing' => $cl,
                'follow_landing' => $fl,
                'crawl_admin' => $ca,
                'follow_admin' => $fa,
                'update_at' => date('Y-m-d', time())
            ];

            if (!$check) {
                $this->admin->insertSeo($data);
            } else {
                $this->admin->updateSeo($title, $data);
            }

            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! SEO Website Telah di Simpan.</span></div>');
            redirect('cp-admin/seo-management');
        }
    }

    public function profile()
    {
        $password = $this->input->post('password');
        $confirm = $this->input->post('confirm');
        $this->form_validation->set_rules('name', 'Nama', 'required', array(
            'required' => '%s Harus diisi.'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', array(
            'required' => '%s Harus diisi.',
            'valid_email' => 'Penulisan %s yang anda masukan salah'
        ));

        if ($password != NULL || $confirm != NULL) {
            $this->form_validation->set_rules('password', 'kata Sandi', 'required|min_length[6]|matches[confirm]', array(
                'required' => '%s Harus diisi.',
                'min_length' => '%s Minimal 6 karakter.',
                'matches' => '%s Yang anda masukan tidak sama.'
            ));
            $this->form_validation->set_rules('confirm', 'kata Sandi', 'required|min_length[6]|matches[password]', array(
                'required' => '%s Harus diisi.',
                'min_length' => '%s Minimal 6 karakter.'
            ));
        }

        if ($this->form_validation->run() == FALSE) {
            $id = $this->session->userdata('id');
            $data = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),
                'user' => $this->admin->getActiveUser(),
                'sidebars' => $this->admin->getSidebar($id),
                'check' => $this->admin->getSeo(),
                'title' => 'Profile Pengguna'
            );
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('admin/profile', $data);
            $this->load->view('template/footer');
        } else {
            $id = $this->session->userdata('id');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $oldpassword = $this->admin->getOldPassword();

            if ($password != NULL || $confirm != NULL) {
                $pwd = md5($password);
            } else {
                $pwd = $oldpassword['password'];
            }

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $pwd
            ];

            $this->admin->updateUser($id, $data);

            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Profil anda berhasil diupdate.</span></div>');
            redirect('cp-admin/profile');
        }
    }

    public function gallery()
    {
        if ($this->input->post('addAlbum')) {
            $album = $this->input->post('album');

            $lower = str_replace(" ", "-", strtolower($album));

            $data = [
                'album' => $album,
                'slug' => $lower . ".html",
                'update_at' => date('Y-m-d', time())
            ];

            $this->admin->insertAlbum($data);

            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Album berhasil ditambahkan.</span></div>');
            redirect('cp-admin/gallery');
        } else if ($this->input->post('editAlbum')) {
            $idAlbum = $this->input->post('id');
            $album = $this->input->post('album');

            $lower = str_replace(" ", "-", strtolower($album));

            $data = [
                'album' => $album,
                'slug' => $lower . ".html",
                'update_at' => date('Y-m-d', time())
            ];

            $this->admin->updateAlbum($idAlbum, $data);

            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Album berhasil diedit.</span></div>');
            redirect('cp-admin/gallery');
        }

        $id = $this->session->userdata('id');
        $data = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'user' => $this->admin->getActiveUser(),
            'albums' => $this->admin->getAlbum(),
            'sidebars' => $this->admin->getSidebar($id),
            'check' => $this->admin->getSeo(),
            'title' => 'Album Kegiatan'
        );
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/album', $data);
        $this->load->view('template/footer');
    }

    public function delete_album($id)
    {
        $queryChecks = $this->db->query("SELECT * FROM wb_album_foto WHERE album_id=$id")->result_array();

        if ($queryChecks) {
            foreach ($queryChecks as $queryCheck) {
                unlink(FCPATH . 'assets/img/gallery/' . $queryCheck['photo']);
            }
        }

        $this->admin->deleteAlbum($id);
        $this->admin->deleteAlbumPhoto($id);

        $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Album berhasil dihapus.</span></div>');
        redirect('cp-admin/gallery');
    }

    public function gallery_photo()
    {
        $idAlbum = $this->uri->segment(3);
        $idPhoto = $this->input->post('id');
        if ($this->input->post('addFoto')) {
            $title = $this->input->post('judul');

            $config['upload_path'] = './assets/img/gallery';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['file_name'] = 'foto' . time();

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo')) {
                $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>' . $this->upload->display_errors() . '</span></div>');
            } else {
                $img = $this->upload->data('file_name');
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/gallery/' . $img;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '80%';
                $config['new_image'] = './assets/img/gallery/' . $img;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = [
                    'album_id' => $idAlbum,
                    'title_photo' => $title,
                    'photo' => $img,
                    'update_at' => date('Y-m-d', time())
                ];

                $this->admin->insertGalleryPhoto($data);
                $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Photo berhasil ditambahkan.</span></div>');
                redirect('cp-admin/gallery-photo/' . $idAlbum);
            }
        } else if ($this->input->post('editFoto')) {
            $title = $this->input->post('judul');

            if (empty($_FILES['photo']['name'])) {
                $img = $this->input->post('old_img');
            } else {
                $config['upload_path'] = './assets/img/gallery';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['file_name'] = 'foto' . time();

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>' . $this->upload->display_errors() . '</span></div>');
                } else {
                    unlink(FCPATH . 'assets/img/gallery/' . $this->input->post('old_img'));

                    $img = $this->upload->data('file_name');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/img/gallery/' . $img;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '80%';
                    $config['new_image'] = './assets/img/gallery/' . $img;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }
            }

            $data = [
                'album_id' => $idAlbum,
                'title_photo' => $title,
                'photo' => $img,
                'update_at' => date('Y-m-d', time())
            ];

            $this->admin->updatePhoto($idPhoto, $data);
            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Photo berhasil diubah.</span></div>');
            redirect('cp-admin/gallery-photo/' . $idAlbum);
        }

        $id = $this->session->userdata('id');
        $data = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'idAlbum' => $idAlbum,
            'user' => $this->admin->getActiveUser(),
            'getOneAlbums' => $this->admin->getOneAlbum($idAlbum),
            'sidebars' => $this->admin->getSidebar($id),
            'check' => $this->admin->getSeo(),
            'title' => 'Foto Album'
        );
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/album_foto', $data);
        $this->load->view('template/footer');
    }

    public function delete_gallery_photo($id)
    {
        $idAlbum = $this->uri->segment(3);
        $this->admin->deletePhoto($id);
        $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Foto berhasil dihapus.</span></div>');
        redirect('cp-admin/gallery-photo/' . $idAlbum);
    }

    public function role()
    {
        $this->form_validation->set_rules('role', 'Role', 'required', array(
            'required' => '%s Harus diisi.'
        ));

        if ($this->form_validation->run() == FALSE) {
            $id = $this->session->userdata('id');
            $data = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),
                'user' => $this->admin->getActiveUser(),
                'check' => $this->admin->getSeo(),
                'sidebars' => $this->admin->getSidebar($id),
                'roles' => $this->admin->getRoles(),
                'title' => 'Role Management'
            );
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('template/footer');
        } else {
            if ($this->input->post('add')) {
                $roleInput = $this->input->post('role');
                $data = [
                    'role' => $roleInput,
                    'create_at' => date('Y-m-d', time())
                ];

                $this->admin->insertRole($data);

                $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Role berhasil ditambahkan.</span></div>');
                redirect('cp-admin/role-management');
            }

            if ($this->input->post('edit')) {
                $id = $this->input->post('id');
                $roleInput = $this->input->post('role');
                $data = [
                    'role' => $roleInput,
                    'create_at' => date('Y-m-d', time())
                ];

                $this->admin->updateRole($id, $data);

                $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Role berhasil ditambahkan.</span></div>');
                redirect('cp-admin/role-management');
            }
        }
    }

    public function delete_role($id)
    {
        $this->admin->deleteRole($id);
        $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Role berhasil ditambahkan.</span></div>');
        redirect('cp-admin/role-management');
    }

    public function menu()
    {
        if ($this->input->post('addMenu')) {
            $menu = $this->input->post('menu');
            $icon = $this->input->post('icon');
            $url = $this->input->post('url');

            $data = [
                'menu' => $menu,
                'icon' => $icon,
                'url' => $url,
                'update_at' => date('Y-m-d', time())
            ];

            $this->admin->insertMenu($data);
            $this->session->set_flashdata('notificationa', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Menu berhasil ditambahkan.</span></div>');
            redirect('cp-admin/menu-management/');
        } else if ($this->input->post('addSub')) {
            $menu = $this->input->post('menu');
            $sub = $this->input->post('sub');
            $url = $this->input->post('url');

            $data = [
                'menu_id' => $menu,
                'sub_menu' => $sub,
                'sub_url' => $url,
                'update_at' => date('Y-m-d', time())
            ];

            $this->admin->insertSubMenu($data);
            $this->session->set_flashdata('notificationb', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Sub-Menu berhasil ditambahkan.</span></div>');
            redirect('cp-admin/menu-management/');
        } else if ($this->input->post('editMenu')) {
            $id = $this->input->post('id');
            $menu = $this->input->post('menu');
            $icon = $this->input->post('icon');
            $url = $this->input->post('url');

            $data = [
                'menu' => $menu,
                'icon' => $icon,
                'url' => $url,
                'update_at' => date('Y-m-d', time())
            ];

            $this->admin->updateMenu($id, $data);
            $this->session->set_flashdata('notificationa', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Menu berhasil diubah.</span></div>');
            redirect('cp-admin/menu-management/');
        } else if ($this->input->post('editSubMenu')) {
            $id = $this->input->post('id');
            $menu = $this->input->post('menu');
            $sub = $this->input->post('sub');
            $url = $this->input->post('url');

            $data = [
                'menu_id' => $menu,
                'sub_menu' => $sub,
                'sub_url' => $url,
                'update_at' => date('Y-m-d', time())
            ];

            $this->admin->updateSubMenu($id, $data);
            $this->session->set_flashdata('notificationb', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Sub-Menu berhasil diubah.</span></div>');
            redirect('cp-admin/menu-management/');
        }

        $id = $this->session->userdata('id');
        $data = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'getMenus' => $this->admin->getMenu(),
            'getSubMenus' => $this->admin->getSubMenu(),
            'user' => $this->admin->getActiveUser(),
            'check' => $this->admin->getSeo(),
            'sidebars' => $this->admin->getSidebar($id),
            'roles' => $this->admin->getRoles(),
            'title' => 'Menu Manajemen'
        );
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/menu', $data);
        $this->load->view('template/footer');
    }

    public function delete_menu($id)
    {
        $this->admin->deleteMenu($id);
        $this->session->set_flashdata('notificationa', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Menu berhasil dihapus.</span></div>');
        redirect('cp-admin/menu-management/');
    }

    public function delete_sub_menu($id)
    {
        $this->admin->deleteSubMenu($id);
        $this->session->set_flashdata('notificationb', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Sub-Menu berhasil dihapus.</span></div>');
        redirect('cp-admin/menu-management/');
    }

    public function menu_role()
    {

        if ($this->input->post('addRoleMenu')) {
            $currentRole = $this->session->userdata('currentId');
            $menu = $this->input->post('menu');

            $data = [
                'menu_id' => $menu,
                'role_id' => $currentRole
            ];

            $this->admin->insertRoleMenu($data);
            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Sub-Menu berhasil ditambahkan.</span></div>');
            redirect('cp-admin/menu-role/' . $currentRole);
        }

        $idUser = $this->session->userdata('id');
        $id = $this->uri->segment(3);
        $this->session->set_userdata('currentId', $id);
        $data = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'getRoleMenus' => $this->admin->getRoleMenu($id),
            'getMenus' => $this->admin->getMenu(),
            'sidebars' => $this->admin->getSidebar($idUser),
            'user' => $this->admin->getActiveUser(),
            'check' => $this->admin->getSeo(),
            'roles' => $this->admin->getRoles(),
            'title' => 'Role Menu'
        );

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/role_menu', $data);
        $this->load->view('template/footer', $data);
    }

    public function delete_m_role($id)
    {
        $currentRole = $this->session->userdata('currentId');
        $this->admin->deleteMenuRole($id);
        $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Sub-Menu berhasil dihapus.</span></div>');
        redirect('cp-admin/menu-role/' . $currentRole);
    }

    public function organization()
    {
        if ($this->input->post('addEmploye')) {
            $front = $this->input->post('front');
            $end = $this->input->post('end');
            $position = $this->input->post('position');

            $config['upload_path'] = './assets/img/organization';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['file_name'] = 'employe' . time();

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo')) {
                $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>' . $this->upload->display_errors() . '</span></div>');
            } else {
                $img = $this->upload->data('file_name');
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/organization/' . $img;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '80%';
                $config['new_image'] = './assets/img/organization/' . $img;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = [
                    'front_name' => $front,
                    'end_name' => $end,
                    'position' => $position,
                    'photo' => $img,
                    'update_at' => date('Y-m-d', time())
                ];

                $this->admin->insertEmploye($data);
                $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Staff berhasil ditambahkan.</span></div>');
                redirect('cp-admin/profile/organization');
            }
        } else if ($this->input->post('editEmploye')) {
            $idEmploye = $this->input->post('id');
            $front = $this->input->post('front');
            $end = $this->input->post('end');
            $position = $this->input->post('position');

            if (empty($_FILES['photo']['name'])) {
                $img = $this->input->post('old_img');
            } else {
                $config['upload_path'] = './assets/img/organization/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['file_name'] = 'employe' . time();

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>' . $this->upload->display_errors() . '</span></div>');
                } else {
                    unlink(FCPATH . '/assets/img/organization/' . $this->input->post('old_img'));

                    $img = $this->upload->data('file_name');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/img/organization/' . $img;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '90%';
                    $config['new_image'] = './assets/img/organization/' . $img;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }
            }

            $data = [
                'front_name' => $front,
                'end_name' => $end,
                'position' => $position,
                'photo' => $img,
                'update_at' => date('Y-m-d', time())
            ];

            $this->admin->updateEmploye($idEmploye, $data);
            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Staff berhasil diubah.</span></div>');
            redirect('cp-admin/profile/organization');
        }

        $data = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'getMenus' => $this->admin->getMenu(),
            'getSubMenus' => $this->admin->getSubMenu(),
            'user' => $this->admin->getActiveUser(),
            'check' => $this->admin->getSeo(),
            'getOrgs' => $this->admin->getOrganization(),
            'sidebars' => $this->admin->getSidebar($this->session->userdata('id')),
            'roles' => $this->admin->getRoles(),
            'title' => 'Organisasi'
        );

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/organization', $data);
        $this->load->view('template/footer');
    }

    public function delete_employe($id)
    {
        $getEmploye = $this->db->get_where('wb_employe', array('id' => $id))->row_array();
        if ($getEmploye) {
            unlink(FCPATH . '/assets/img/organization/' . $getEmploye['photo']);
        }
        $this->admin->deleteEmploye($id);
        $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Employe berhasil dihapus.</span></div>');
        redirect('cp-admin/profile/organization');
    }

    public function achievement()
    {
        if ($this->input->post('addAcv')) {
            $acv = $this->input->post('acv');
            $description = $this->input->post('description');

            $config['upload_path'] = './assets/img/achievement/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['file_name'] = 'achievement' . time();

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo')) {
                $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>' . $this->upload->display_errors() . '</span></div>');
            } else {
                $img = $this->upload->data('file_name');
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/achievement/' . $img;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '80%';
                $config['new_image'] = './assets/img/achievement/' . $img;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = [
                    'achievement' => $acv,
                    'description' => $description,
                    'photo' => $img,
                    'update_at' => date('Y-m-d', time())
                ];

                $this->admin->insertAchievement($data);
                $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Penghargaan berhasil ditambahkan.</span></div>');
                redirect('cp-admin/profile/achievement');
            }
        } else if ($this->input->post('editAcv')) {
            $idAcv = $this->input->post('id');
            $acv = $this->input->post('acv');
            $description = $this->input->post('description');

            $config['upload_path'] = './assets/img/achievement/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['file_name'] = 'achievement' . time();

            $this->load->library('upload', $config);

            if (empty($_FILES['photo']['name'])) {
                $img = $this->input->post('old_img');
            } else {
                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>' . $this->upload->display_errors() . '</span></div>');
                } else {
                    unlink(FCPATH . '/assets/img/achievement/' . $this->input->post('old_img'));
                    $img = $this->upload->data('file_name');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/img/achievement/' . $img;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '80%';
                    $config['new_image'] = './assets/img/achievement/' . $img;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }
            }
            $data = [
                'achievement' => $acv,
                'description' => $description,
                'photo' => $img,
                'update_at' => date('Y-m-d', time())
            ];

            $this->admin->updateAchievement($idAcv, $data);
            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Penghargaan berhasil diubah.</span></div>');
            redirect('cp-admin/profile/achievement');
        }

        $data = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'getMenus' => $this->admin->getMenu(),
            'getSubMenus' => $this->admin->getSubMenu(),
            'user' => $this->admin->getActiveUser(),
            'check' => $this->admin->getSeo(),
            'getAcv' => $this->admin->getAchievement(),
            'sidebars' => $this->admin->getSidebar($this->session->userdata('id')),
            'roles' => $this->admin->getRoles(),
            'title' => 'Penghargaan'
        );

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/achievement', $data);
        $this->load->view('template/footer');
    }

    public function delete_achievement($id)
    {
        $getAchievement = $this->db->get_where('wb_achievement', array('id' => $id))->row_array();
        if ($getAchievement) {
            unlink(FCPATH . '/assets/img/organization/' . $getAchievement['photo']);
        }
        $this->admin->deleteAchievement($id);
        $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Penghargaan berhasil dihapus.</span></div>');
        redirect('cp-admin/profile/achievement');
    }

    public function message()
    {
        $this->form_validation->set_rules('message', 'Pesan', 'required', array(
            'required' => '%s Harus diisi.'
        ));
        $this->form_validation->set_rules('name', 'Nama', 'required', array(
            'required' => '%s Harus diisi.'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),
                'getMenus' => $this->admin->getMenu(),
                'getSubMenus' => $this->admin->getSubMenu(),
                'user' => $this->admin->getActiveUser(),
                'getMessages' => $this->admin->getMessage(),
                'check' => $this->admin->getSeo(),
                'sidebars' => $this->admin->getSidebar($this->session->userdata('id')),
                'roles' => $this->admin->getRoles(),
                'title' => 'Pesan Presiden'
            );

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('admin/message', $data);
            $this->load->view('template/footer');
        } else {
            $message = $this->input->post('message');
            $name = $this->input->post('name');
            $getMessage = $this->admin->getMessage();

            $config['upload_path'] = './assets/img';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['file_name'] = 'president' . time();

            $this->load->library('upload', $config);

            if (!$getMessage) {
                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>' . $this->upload->display_errors() . '</span></div>');
                } else {
                    $img = $this->upload->data('file_name');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/img/' . $img;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '80%';
                    $config['new_image'] = './assets/img/' . $img;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $data = [
                        'message' => $message,
                        'president' => $name,
                        'photo' => $img,
                        'update_at' => date('Y-m-d', time())
                    ];

                    $this->admin->insertMessage($data);
                    $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Pesan Presiden berhasil disimpan.</span></div>');
                    redirect('cp-admin/profile/message-president');
                }
            } else {
                if (empty($_FILES['photo']['name'])) {
                    $img = $getMessage['photo'];
                } else {
                    if (!$this->upload->do_upload('photo')) {
                        $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>' . $this->upload->display_errors() . '</span></div>');
                    } else {
                        unlink(FCPATH . 'assets/img/' . $getMessage['photo']);
                        $img = $this->upload->data('file_name');
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/img/' . $img;
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = TRUE;
                        $config['quality'] = '80%';
                        $config['new_image'] = './assets/img/' . $img;
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                    }
                }

                $idMessage = $getMessage['id'];

                $data = [
                    'message' => $message,
                    'president' => $name,
                    'photo' => $img,
                    'update_at' => date('Y-m-d', time())
                ];

                $this->admin->updateMessage($idMessage, $data);
                $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Pesan Presiden berhasil disimpan.</span></div>');
                redirect('cp-admin/profile/message-president');
            }
        }
    }

    public function history()
    {
        if ($this->input->post('addHistory')) {
            $year = $this->input->post('year');
            $about = $this->input->post('about');

            $count = $this->db->get('wb_history')->num_rows();

            if ($count % 2 == 0) {
                $content = "timeline-content";
            } else {
                $content = "timeline-content right";
            }

            $data = [
                'year' => $year,
                'history' => $about,
                'content' => $content,
                'update_at' => date('Y-m-d')
            ];

            $this->admin->insertHistory($data);
            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Sejarah berhasil disimpan.</span></div>');
            redirect('cp-admin/profile/history');
        } else if ($this->input->post('editHistory')) {
            $idHistory = $this->input->post('id');
            $year = $this->input->post('year');
            $about = $this->input->post('about');
            $content = $this->input->post('content');

            $data = [
                'year' => $year,
                'history' => $about,
                'content' => $content,
                'update_at' => date('Y-m-d')
            ];

            $this->admin->updateHistory($idHistory, $data);
            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Sejarah berhasil diubah.</span></div>');
            redirect('cp-admin/profile/history');
        }

        $data = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'getMenus' => $this->admin->getMenu(),
            'getSubMenus' => $this->admin->getSubMenu(),
            'user' => $this->admin->getActiveUser(),
            'check' => $this->admin->getSeo(),
            'getHistories' => $this->admin->getHistory(),
            'sidebars' => $this->admin->getSidebar($this->session->userdata('id')),
            'roles' => $this->admin->getRoles(),
            'title' => 'Sejarah'
        );

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/history', $data);
        $this->load->view('template/footer');
    }

    public function delete_history($id)
    {
        $this->admin->deleteHistory($id);
        $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! History berhasil dihapus.</span></div>');
        redirect('cp-admin/profile/history');
    }

    public function vm()
    {
        $vm = $this->db->get('wb_vm')->row_array();

        if ($this->input->post('sendvisi')) {
            $data = [
                'visi' => $this->input->post('visi'),
                'update_at' => date('Y-m-d')
            ];

            if ($vm) {
                $this->admin->updateVm($vm['id'], $data);
            } else {
                $this->admin->insertVm($data);
            }

            $this->session->set_flashdata('notificationa', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Visi berhasil disimpan.</span></div>');
            redirect('cp-admin/profile/vm');
        } else if ($this->input->post('sendmisi')) {
            $data = [
                'misi' => $this->input->post('misi'),
                'update_at' => date('Y-m-d')
            ];

            if ($vm) {
                $this->admin->updateVm($vm['id'], $data);
            } else {
                $this->admin->insertVm($data);
            }

            $this->session->set_flashdata('notificationb', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! misi berhasil disimpan.</span></div>');
            redirect('cp-admin/profile/vm');
        }

        $data = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'getMenus' => $this->admin->getMenu(),
            'getSubMenus' => $this->admin->getSubMenu(),
            'user' => $this->admin->getActiveUser(),
            'getVM' => $vm,
            'check' => $this->admin->getSeo(),
            'roles' => $this->admin->getRoles(),
            'sidebars' => $this->admin->getSidebar($this->session->userdata('id')),
            'title' => 'Visi & Misi'
        );

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/vm', $data);
        $this->load->view('template/footer');
    }

    public function group()
    {
        if ($this->input->post('addGroup')) {
            $company = $this->input->post('company');
            $link = $this->input->post('link');
            $description = $this->input->post('description');

            $config['upload_path'] = './assets/img/group';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['file_name'] = 'group' . time();

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('photo')) {
                $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>' . $this->upload->display_errors() . '</span></div>');
            } else {
                $img = $this->upload->data('file_name');
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/group/' . $img;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '80%';
                $config['new_image'] = './assets/img/group' . $img;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = [
                    'company' => $company,
                    'link' => $link,
                    'description' => $description,
                    'photo' => $img,
                    'update_at' => date('Y-m-d', time())
                ];

                $this->admin->insertGroup($data);
                $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Group berhasil ditambahkan.</span></div>');
                redirect('cp-admin/profile/group');
            }
        } else if ($this->input->post('editGroup')) {

            $idGroup = $this->input->post('id');
            $company = $this->input->post('company');
            $link = $this->input->post('link');
            $description = $this->input->post('description');

            $config['upload_path'] = './assets/img/group';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['file_name'] = 'group' . time();

            $this->load->library('upload', $config);

            if (empty($_FILES['photo']['name'])) {
                $img = $this->input->post('img_old');
            } else {
                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>' . $this->upload->display_errors() . '</span></div>');
                } else {
                    unlink(FCPATH . '/assets/img/group/' . $this->input->post('img_old'));
                    $img = $this->upload->data('file_name');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/img/group/' . $img;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '80%';
                    $config['new_image'] = './assets/img/group' . $img;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }
            }
            $data = [
                'company' => $company,
                'link' => $link,
                'description' => $description,
                'photo' => $img,
                'update_at' => date('Y-m-d', time())
            ];

            $this->admin->updateGroup($idGroup, $data);
            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Group berhasil diubah.</span></div>');
            redirect('cp-admin/profile/group');
        }

        $data = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'getMenus' => $this->admin->getMenu(),
            'getSubMenus' => $this->admin->getSubMenu(),
            'getGroups' => $this->admin->getGroup(),
            'user' => $this->admin->getActiveUser(),
            'check' => $this->admin->getSeo(),
            'roles' => $this->admin->getRoles(),
            'sidebars' => $this->admin->getSidebar($this->session->userdata('id')),
            'title' => 'Group'
        );

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/group', $data);
        $this->load->view('template/footer');
    }

    public function delete_group($id)
    {
        $getGroup = $this->db->get_where('wb_group', array('id' => $id))->row_array();
        if ($getGroup) {
            unlink(FCPATH . '/assets/img/group/' . $getGroup['photo']);
        }
        $this->admin->deleteGroup($id);
        $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Group berhasil dihapus.</span></div>');
        redirect('cp-admin/profile/group');
    }

    public function all_news()
    {
        $data = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'getMenus' => $this->admin->getMenu(),
            'getSubMenus' => $this->admin->getSubMenu(),
            'user' => $this->admin->getActiveUser(),
            'check' => $this->admin->getSeo(),
            'getAllNews' => $this->admin->getAllNews(),
            'getSelected' => $this->admin->getSelectedNews($this->session->userdata('id')),
            'roles' => $this->admin->getRoles(),
            'sidebars' => $this->admin->getSidebar($this->session->userdata('id')),
            'title' => 'Semua Berita'
        );

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/all_news', $data);
        $this->load->view('template/footer');
    }

    public function add_news()
    {
        $this->form_validation->set_rules('title', 'Judul', 'required|max_length[60]', array(
            'required' => '%s Harus diisi.',
            'max_length' => 'Panjang karakter harus kurang dari 60 karakter.'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),
                'getMenus' => $this->admin->getMenu(),
                'getSubMenus' => $this->admin->getSubMenu(),
                'user' => $this->admin->getActiveUser(),
                'check' => $this->admin->getSeo(),
                'roles' => $this->admin->getRoles(),
                'sidebars' => $this->admin->getSidebar($this->session->userdata('id')),
                'title' => 'Tambah Berita'
            );

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('admin/add_news', $data);
            $this->load->view('template/footer');
        } else {
            $title = $this->input->post('title');
            $news = $this->input->post('news');
            $update_at = $this->input->post('update');

            $slug = strtolower(urlencode(str_replace(" ", "-", $title)));

            $config['upload_path'] = './assets/img/news';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['file_name'] = 'news' . time();

            $this->load->library('upload', $config);

            if (empty($_FILES['photo']['name'])) {
                $img = "no-photo.png";
            } else {
                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>' . $this->upload->display_errors() . '</span></div>');
                } else {
                    $img = $this->upload->data('file_name');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/img/news/' . $img;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '80%';
                    $config['new_image'] = './assets/img/news/' . $img;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }
            }

            $data = [
                'admin_id' => $this->session->userdata('id'),
                'title' => $title,
                'news' => $news,
                'slug' => $slug . '.html',
                'photo' => $img,
                'update_at' => $update_at
            ];

            $this->admin->insertNews($data);
            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Berita berhasil ditambah.</span></div>');
            redirect('cp-admin/news/all-news');
        }
    }

    public function edit_news($id)
    {
        $this->form_validation->set_rules('title', 'Judul', 'required|max_length[60]', array(
            'required' => '%s Harus diisi.',
            'max_length' => 'Panjang karakter harus kurang dari 60 karakter.'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),
                'getMenus' => $this->admin->getMenu(),
                'getSubMenus' => $this->admin->getSubMenu(),
                'user' => $this->admin->getActiveUser(),
                'getNews' => $this->admin->getNews($id),
                'check' => $this->admin->getSeo(),
                'roles' => $this->admin->getRoles(),
                'sidebars' => $this->admin->getSidebar($this->session->userdata('id')),
                'title' => 'Edit Berita'
            );

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('admin/edit_news', $data);
            $this->load->view('template/footer');
        } else {
            $idNews = $this->input->post('id');
            $title = $this->input->post('title');
            $news = $this->input->post('news');
            $update_at = $this->input->post('update');

            $slug = strtolower(urlencode(str_replace(" ", "-", $title)));

            $config['upload_path'] = './assets/img/news';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['file_name'] = 'news' . time();

            $this->load->library('upload', $config);

            if (empty($_FILES['photo']['name'])) {
                $img = $this->input->post('img_old');
            } else {
                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>' . $this->upload->display_errors() . '</span></div>');
                } else {
                    if ($this->input->post('img_old') != "no-photo.png") {
                        unlink(FCPATH . '/assets/img/news/' . $this->input->post('img_old'));
                    }
                    $img = $this->upload->data('file_name');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/img/news/' . $img;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '80%';
                    $config['new_image'] = './assets/img/news/' . $img;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }
            }

            $data = [
                'admin_id' => $this->input->post('admin_id'),
                'title' => $title,
                'news' => $news,
                'slug' => $slug . '.html',
                'photo' => $img,
                'update_at' => $update_at
            ];

            $this->admin->updateNews($idNews, $data);
            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Berita berhasil diubah.</span></div>');
            redirect('cp-admin/news/edit-news/' . $id);
        }
    }

    public function delete_news($id)
    {
        $getNews = $this->db->get_where('wb_news', array('id' => $id))->row_array();
        if ($getNews) {
            unlink(FCPATH . '/assets/img/news/' . $getNews['photo']);
        }
        $this->admin->deleteNews($id);
        $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Berita berhasil dihapus.</span></div>');
        redirect('cp-admin/news/all-news');
    }

    public function departement()
    {
        if ($this->input->post('add')) {
            $data = [
                'departement' => $this->input->post('dep'),
                'update_at' => date('Y-m-d')
            ];

            $this->admin->insertDep($data);
            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Departement berhasil ditambah.</span></div>');
            redirect('cp-admin/job/departement');
        } else if ($this->input->post('edit')) {
            $idDep = $this->input->post('id');
            $data = [
                'departement' => $this->input->post('dep'),
                'update_at' => date('Y-m-d')
            ];

            $this->admin->updateDep($idDep, $data);
            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Departement berhasil diubah.</span></div>');
            redirect('cp-admin/job/departement');
        }
        $data = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'getMenus' => $this->admin->getMenu(),
            'getSubMenus' => $this->admin->getSubMenu(),
            'getDepartement' => $this->admin->getDepartement(),
            'user' => $this->admin->getActiveUser(),
            'check' => $this->admin->getSeo(),
            'roles' => $this->admin->getRoles(),
            'sidebars' => $this->admin->getSidebar($this->session->userdata('id')),
            'title' => 'Departement'
        );

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/departement', $data);
        $this->load->view('template/footer');
    }

    public function deleteDepartement($id)
    {
        $this->admin->deleteDep($id);
        $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Album berhasil dihapus.</span></div>');
        redirect('cp-admin/job/departement');
    }

    public function all_job()
    {
        $data = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'getMenus' => $this->admin->getMenu(),
            'getSubMenus' => $this->admin->getSubMenu(),
            'getJob' => $this->admin->getJob(),
            'user' => $this->admin->getActiveUser(),
            'check' => $this->admin->getSeo(),
            'roles' => $this->admin->getRoles(),
            'sidebars' => $this->admin->getSidebar($this->session->userdata('id')),
            'title' => 'Seluruh Loker'
        );

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/all_job', $data);
        $this->load->view('template/footer');
    }

    public function add_job()
    {
        $this->form_validation->set_rules('title', 'Lowongan Pekerjan', 'required|max_length[60]', array(
            'required' => '%s Harus diisi.',
            'max_length' => '%s Lebih dari 60 Karakter'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),
                'getMenus' => $this->admin->getMenu(),
                'getSubMenus' => $this->admin->getSubMenu(),
                'getDepartement' => $this->admin->getDepartement(),
                'user' => $this->admin->getActiveUser(),
                'check' => $this->admin->getSeo(),
                'roles' => $this->admin->getRoles(),
                'sidebars' => $this->admin->getSidebar($this->session->userdata('id')),
                'title' => 'Tambah Loker'
            );

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('admin/add_job', $data);
            $this->load->view('template/footer');
        } else {
            $recruit = $this->input->post('recruit');
            if ($recruit == NULL) {
                $ejob = "0";
            } else {
                $ejob = "1";
            }
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $departement = $this->input->post('departement');
            $education = $this->input->post('education');
            $publish = $this->input->post('publish');
            $expired = $this->input->post('expired');

            $data = [
                'departement_id' => $departement,
                'job' => $title,
                'description' => $description,
                'education' => $education,
                'publish_date' => $publish,
                'expired_date' => $expired,
                'logo' => 'logo.png',
                'status' => $ejob
            ];

            $this->admin->insertJob($data);
            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Loker berhasil diterbitkan.</span></div>');
            redirect('cp-admin/job/all-job');
        }
    }

    public function update_job($id)
    {
        $this->form_validation->set_rules('title', 'Lowongan Pekerjan', 'required|max_length[60]', array(
            'required' => '%s Harus diisi.',
            'max_length' => '%s Lebih dari 60 Karakter'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'name' => $this->security->get_csrf_token_name(),
                'hash' => $this->security->get_csrf_hash(),
                'getMenus' => $this->admin->getMenu(),
                'getSubMenus' => $this->admin->getSubMenu(),
                'getDepartement' => $this->admin->getDepartement(),
                'getSelectedJob' => $this->admin->getSelectedJob($id),
                'user' => $this->admin->getActiveUser(),
                'check' => $this->admin->getSeo(),
                'roles' => $this->admin->getRoles(),
                'sidebars' => $this->admin->getSidebar($this->session->userdata('id')),
                'title' => 'Edit Loker'
            );

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('admin/edit_job', $data);
            $this->load->view('template/footer');
        } else {
            $idJob = $this->input->post('id');
            $recruit = $this->input->post('recruit');
            if ($recruit == NULL) {
                $ejob = "0";
            } else {
                $ejob = "1";
            }
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $departement = $this->input->post('departement');
            $education = $this->input->post('education');
            $publish = $this->input->post('publish');
            $expired = $this->input->post('expired');

            $data = [
                'departement_id' => $departement,
                'job' => $title,
                'description' => $description,
                'education' => $education,
                'publish_date' => $publish,
                'expired_date' => $expired,
                'status' => $ejob
            ];

            $this->admin->updateJob($idJob, $data);
            $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Loker berhasil diubah.</span></div>');
            redirect('cp-admin/job/all-job');
        }
    }

    public function deleteJob($id)
    {
        $this->admin->deleteJob($id);
        $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Selamat! Loker berhasil dihapus.</span></div>');
        redirect('cp-admin/job/all-job');
    }

    public function all_recruitment()
    {
        $data = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'getMenus' => $this->admin->getMenu(),
            'getSubMenus' => $this->admin->getSubMenu(),
            'user' => $this->admin->getActiveUser(),
            'getApplied' => $this->admin->getUserApplied(),
            'getJob' => $this->admin->getEJob(),
            'check' => $this->admin->getSeo(),
            'roles' => $this->admin->getRoles(),
            'sidebars' => $this->admin->getSidebar($this->session->userdata('id')),
            'title' => 'Semua Pelamar'
        );

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/allrec', $data);
        $this->load->view('template/footer');
    }

    public function acc()
    {
        $idUser = $this->uri->segment(4);
        $data = [
            'status' => 2
        ];
        $this->admin->updateStatus($idUser, $data);
        $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Peserta telah ditolak.</span></div>');
        redirect('cp-admin/job/all-recruitment');
    }

    public function no_acc()
    {
        $idUser = $this->uri->segment(4);
        $getEmail = $this->db->get('wb_applied', array('id' => $idUser))->row_array();
        $data = [
            'status' => 0
        ];

        $message = '';

        $this->admin->updateStatus($idUser, $data);
        $this->__SendEmail($getEmail['email'], 0, $message);
    }

    public function sendAcc()
    {
        $date = $this->input->post('date');
        $email = $this->input->post('email');

        $status = '1';
        $this->__SendEmail($email, $status, $date);
    }

    private function __SendEmail($email, $status, $message)
    {

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mail.jibuhin.co.id',
            'smtp_user' => 'hrd@jibuhin.co.id',
            'smtp_pass' => 'karbvba5lw87',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('hrd@jibuhin.co.id', 'PT. Jidosha Buhin Indonesia');

        if ($status == 0) {
            $data = [
                'status' => 'Ditolak'
            ];
            $message = $this->load->view('email/noAcc', $data, true);
            $this->email->to($email);
            $this->email->subject('Maaf, Pengajuan Lamaran di Tolak');
            $this->email->message($message);

            if ($this->email->send()) {
                $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Peserta telah ditolak.</span></div>');
                redirect('cp-admin/job/all-recruitment');
            } else {
                echo $this->email->print_debugger();
                die;
            }
        } else if ($status == 1) {
            $data = [
                'status' => 'Diterima',
                'date' => $message
            ];
            $message = $this->load->view('email/Acc', $data, true);
            $this->email->to($email);
            $this->email->subject('Selamat! Pengajuan Lamaran di Terima');
            $this->email->message($message);

            if ($this->email->send()) {
                $this->session->set_flashdata('notification', '<div class="kt-alert kt-alert--outline alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button><span>Email Telah Terkirim.</span></div>');
                redirect('cp-admin/job/all-recruitment');
            } else {
                echo $this->email->print_debugger();
                die;
            }
        }
    }

    public function fetchUser()
    {
        $job_id = $this->input->post('id');
        if ($job_id) {
            echo $this->admin->fetchUser($job_id);
        }
    }
}
