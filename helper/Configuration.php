<?php
include_once("helper/MysqlDatabase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");

include_once("controller/MainController.php");
include_once("controller/BDDJsonController.php");
include_once("controller/FiltroController.php");

include_once("model/MainModel.php");


include_once('third-party/mustache/src/Mustache/Autoloader.php');
include_once("Router.php");

class Configuration
{

    private function getDatabase()
    {
        $config = $this->getConfig();
        return new MysqlDatabase(
            $config["servername"],
            $config["username"],
            $config["password"],
            $config["dbname"]
        );
    }

    private function getConfig()
    {
        return parse_ini_file("config/config.ini");
    }


    public function getRender()
    {
        return new Render('view/partial');
    }

    public function getRouter()
    {
        return new Router($this);
    }

    public function getUrlHelper()
    {
        return new UrlHelper();
    }

    public function getMainController()
    {
        $mainModel = $this->getMainModel();
        return new MainController($this->getRender(), $mainModel);
    }

    public function getBDDJsonController()
    {
        $mainModel = $this->getMainModel();
        return new BDDJsonController($this->getRender(), $mainModel);
    }
   public function getFiltroController()
    {
        $mainModel = $this->getMainModel();
        return new FiltroController($this->getRender(), $mainModel);
    }

    public function getMainModel()
    {
        $database = $this->getDatabase();
        return new MainModel($database);
    }

}