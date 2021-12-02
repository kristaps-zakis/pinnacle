<?php
session_start();

class Home extends Controller {
    public function __construct() {
        $this->postModel = $this->model('Subscription');
    }

    public function index(){
        $this->view('index');
    }

    public function post () {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $body = false;

        if (!isset($_POST)) {
            $body = file_get_contents('php://input');

            if ($body === '') {
                redirect('');
            }

            $body = json_decode($body);
            $body = get_object_vars($body);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_POST)) {
                $_POST = false;
                $thisEmail = $body['email'] ?? '';
            } else {
                $thisEmail = $_POST['email'] ?? '';
            }

            $data = [
                'email' => trim($thisEmail)
            ];

            if (empty($data['email'])) {
                $data['error']['email'] = 'Email address is required';
            } else if (!$this->validateEmail($data['email'])) {
                $data['error']['email'] = 'Please enter a valid email address';
            } else if (str_ends_with($data['email'], '.co')) {
                $data['error']['email'] = 'We are not accepting subscriptions from Colombia emails';
            }

            if (!isset($_POST['newsletter-agree']) && !isset($body['newsletter-agree'])) {
                $data['error']['agreement'] = 'false';
            }
        }

        if (!isset($data['error'])) {
            $data['record_saved'] = $this->postModel->addPost($data['email']);
        }

        if (isset($_POST['vue']) || isset($body['vue'])) {
            $response = json_encode($data);

            return $response;
        }

        $_SESSION['home_post'] =  $data;
        redirect('');
    }

    private function validateEmail($email) {
        $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
        return preg_match($regex, $email) ? true : false;
    }
}