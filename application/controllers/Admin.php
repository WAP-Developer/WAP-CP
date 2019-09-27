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
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '90%';
                $config['width'] = 2100;
                $config['height'] = 1400;
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
                    $config['quality'] = '90%';
                    $config['width'] = 2100;
                    $config['height'] = 1400;
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
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '90%';
                $config['width'] = 2100;
                $config['height'] = 1400;
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
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '90%';
                    $config['width'] = 2100;
                    $config['height'] = 1400;
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
        }
    }
}
