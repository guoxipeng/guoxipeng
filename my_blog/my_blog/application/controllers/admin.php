<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('article_model');
    }

    public function index(){
        $this->load->view('admin_index');
    }
    public function newblog(){
        $loginedUser = $this->session->userdata('loginedUser');
        $types = $this->article_model->get_types_by_user($loginedUser->user_id);
        $this->load->view('newblog', array(
            'types' => $types
        ));
    }

    public function post_blog(){
        $title = htmlspecialchars($this->input->post('title'));
        $content = htmlspecialchars($this->input->post('content'));
        $type_id = $this->input->post('type_id');

        $loginedUser = $this->session->userdata('loginedUser');

        $rows = $this->article_model->save_article($title, $content, $type_id, $loginedUser->user_id);
        if($rows > 0){
            redirect('admin/list_blogs');
        }else{
            echo 'fail';
        }
    }

    public function list_blogs(){
        $loginedUser = $this->session->userdata('loginedUser');
        $articles = $this->article_model->get_ariticles_by_user($loginedUser->user_id);
        $this->load->view('list_blogs', array(
            'articles' => $articles
        ));
    }
    public function delete_articles(){
        $ids = $this->input->get('ids');

        $rows = $this->article_model->delete_articles($ids);
        if($rows > 0){
            echo 'success';
        }else{
            echo 'fail';
        }
    }
}