<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerToprocess_query
 *
 * @author lokesh
 */
class ControllerToprocess_query {

    public function process_request() {


        require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '\PhpProject5\Model\Database_class.php');
        $date = $_REQUEST['date'];
        $maximum_of_day_or_week_or_month = $_REQUEST['category'];

        $instance_of_Datbase_Class = new Database_class;

        if ($maximum_of_day_or_week_or_month == "day") {
            $data = $instance_of_Datbase_Class->get_max_model_of_day($date);
        }
        if ($maximum_of_day_or_week_or_month == "month") {
            $date_with_month_as_substring = substr($date, 0, 8);
            $data = $instance_of_Datbase_Class->get_max__model_in_month($date_with_month_as_substring);
        }
        if ($maximum_of_day_or_week_or_month == "week") {

            $data = $instance_of_Datbase_Class->get_max__model_in_month($date);
        }

        include 'C:\xampp\htdocs\my-project\src\Views\View_Class.php';

        $instance_of_view = new View_Class;
        $instance_of_view->render($data, $date, $maximum_of_day_or_week_or_month);
    }

}
