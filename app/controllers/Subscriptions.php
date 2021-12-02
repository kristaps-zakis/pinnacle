<?php

class Subscriptions extends Controller {

    public function __construct() {
        $this->postModel = $this->model('Subscription');
    }

    public function index() {
        $emails = $this->postModel->getList();

        $emailList = array();
        $emailTypes = array();

        foreach ($emails as $thisEmail):
            $thisEmailArray = (array) $thisEmail;

            $thisEmail = $thisEmailArray['email'];
            $emailSuffix = explode('@', $thisEmail)[1];

            array_push($emailTypes, $emailSuffix);
            array_push($emailList, $thisEmailArray);
        endforeach;

        $emailTypes = array_unique($emailTypes);

        $data['records'] = $emails;
        $data['types'] = $emailTypes;

        $this->view('subscriptions', $data);
    }

    public function delete () {
        $id = explode('/', $_GET['url'])[2];
        $data['deleted'] = $this->postModel->deletePost($id);

        redirect('subscriptions');
    }

    public function deleteMultiples () {
        $ids = $_GET['ids'];

        if (sizeof($ids) > 0) {
            $data['deleted'] = $this->postModel->deleteMultiples($ids);
        }

        redirect('subscriptions');
    }
}