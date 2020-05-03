<?php
//Done by Andra
class AccountMenu extends Controller
{

    public function index()
    {
        session_start();
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {

            $model = $this->model("accountmodel");
            $this->view('account/AccountMenu', $model->getInitialData());
        } else {
            header(Constants::LOCATION_SIGNIN);
        }
    }


    public function changeUsername()
    {
        session_start();
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            $model = $this->model("accountmodel");

            if (isset($_POST["username"]) && $_POST["username"] != "") {

                if ($model->isUniqueUsername($this->sanitizeString($_POST["username"])) === null) {

                    $model->updateUsername($this->sanitizeString($_POST["username"]));
                    $_SESSION["username"] = $this->sanitizeString($_POST["username"]);
                    header(Constants::LOCATION_ACCOUNTMENU);
                } else {
                    $this->view('account/AccountMenu', $model->getInvalidUsername());
                }
            }
        } else {
            header(Constants::LOCATION_SIGNIN);
        }
    }


    public function changePassword()
    {
        session_start();
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            $model = $this->model("accountmodel");

            if (isset($_POST["password"]) && $_POST["password"] != "") {
                $model->updatePassword($this->sanitizeString($_POST["password"]));
                $_SESSION["password"] = $this->sanitizeString($_POST["password"]);
                header(Constants::LOCATION_ACCOUNTMENU);
            }
        } else {
            header(Constants::LOCATION_SIGNIN);
        }
    }

    public function changeEmail()
    {
        session_start();
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            $model = $this->model("accountmodel");

            if (isset($_POST["email"]) && $_POST["email"] != "") {
                if ($model->isUniqueEmail($this->sanitizeString($_POST["email"])) === null) {
                    $model->updateMail($this->sanitizeString($_POST["email"]));
                    $_SESSION["email"] = $this->sanitizeString($_POST["email"]);
                    header(Constants::LOCATION_ACCOUNTMENU);
                } else {
                    $this->view('account/AccountMenu', $model->getInvalidEmail());
                }
            }
        } else {
            header(Constants::LOCATION_SIGNIN);
        }
    }
}
