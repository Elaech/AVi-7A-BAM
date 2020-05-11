<?php
//Done by Ionita Andra
class Accident extends Controller
{
    function
    default()
    {
        if (isset($_POST['id']) && $_POST['id'] != "") {
            $this->response['status'] = 200;
            $this->body[$_SERVER['REQUEST_METHOD']] = 'success';
            $this->response['body'] = json_encode($this->body);
        } else {
            $this->response['status'] = 400;
            echo "accident.php Stuff";
        }
        return $this->response;
    }
}
