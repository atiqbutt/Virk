<?php

if (!defined('BASEPATH'))
    exit('No direct script  allow');

class Report_model extends CI_Model {
           
     public function __construct()
    {
        parent::__construct();
    }


    public function get_all_trip()
    {

        return $this->db->select()->from('get_all_trips')->get()->result_array();

    }
    public function getReportData($view,$params,$startdate,$enddate,$vehicle)
    {
        //var_dump($params);
    $this->db->select()->from($view);
            $this->db->where($params);
            if($startdate!=""){
             $this->db->where('entry_date>=', $startdate);
             // var_dump($startdate);
             }
             if($vehicle!=""){
                $this->db->where_in('vechileid',$vehicle);
             }
         if($enddate!="")
             $this->db->where('entry_date <=', $enddate);
        return $this->db->get()->result_array();

    }

    public function get_all_expense($view,$params,$startdate,$enddate)
    {
        //var_dump($params);

    $this->db->select()->from($view);
            $this->db->where($params);
            if($startdate!=""){
             $this->db->where('entry_date>=', $startdate);
             // var_dump($startdate);
             }
         if($enddate!="")
             $this->db->where('entry_date <=', $enddate);
        return $this->db->get()->result_array();

    }
    public function get_all_expenses()
    {
        return $this->db->from('get_expense_by_trips')->get()->result_array();

/*        return $this->db->query("select t.id,e.date,e.amount,t.type,et.name,v.heading as vehicle,p.heading as product FROM `expense` e join tripmanagement t on t.id=e.`trip_id` join expensetype et on et.id=e.`expensetype_id`
join vehicle v on t.vehicle_id=v.id join tripproduct tp on tp.trip_id=t.id join product p on p.id=tp.product_id
ORDER BY t.id")->result_array();*/

    }

    public function get_all_expense_by_vehicle()
    {
        return $this->db->from('get_expense_by_vehicle')->get()->result_array();

/*        return $this->db->query("select t.id,e.date,e.amount,t.type,et.name,v.heading as vehicle,p.heading as product FROM `expense` e join tripmanagement t on t.id=e.`trip_id` join expensetype et on et.id=e.`expensetype_id`
join vehicle v on t.vehicle_id=v.id join tripproduct tp on tp.trip_id=t.id join product p on p.id=tp.product_id
ORDER BY t.id")->result_array();*/

    }

public function report()
{

$this->db->query("select `t`.`id` AS `id`,`com`.`id` as companyid,`ltd`.`id` as destinationid,`lt`.`id` as sourceid,`p`.`id` as productid, `v`.`id` as vechileid,di.id as driverid,`t`.`type` AS `type`,`p`.`heading` AS `productname`,`t`.`meter_reading` AS `meter_reading`,`t`.`filling_date` AS `filling_date`,`tp`.`product_gravity` AS `gravity`,`tp`.`carriage_commission` AS `carriage`,`tp`.`withholding_tax` AS `withholdingtax`,`tp`.`product_temperature` AS `temperature`,`tp`.`freight_rate` AS `freight_rate`,`tp`.`product_quantity` AS `quantity`,`tp`.`servicecharges` AS `servicecharges`,`tp`.`remaining_commission` AS `remaining_commission`,`t`.`status` AS `status`,`v`.`registerationno` AS `vehicleregisterationno`,`v`.`chassisno` AS `chassisno`,`v`.`heading` AS `vehiclename`,`v`.`engineno` AS `vehicleengineno`,`lt`.`name` AS `source`,`ltd`.`name` AS `destination`,`com`.`name` AS `comname`,`con`.`name` AS `conname`
 from `tripmanagement` `t` left join `tripproduct` `tp` on `tp`.`trip_id` = `t`.`id` join `vehicle` `v` on `t`.`vehicle_id` = `v`.`id` join
 `product` `p` on `tp`.`product_id` = `p`.`id` join `locationtype` `lt` on `t`.`source` = `lt`.`id` join 
 `locationtype` `ltd` on`tp`.`destination` = `ltd`.`id` join `customerinformation` `com` on `t`.`company_id` = `com`.`id` join 
 `contractorinformation` `con` on `t`.`contractor_id` = `con`.`id` join `trip_members` `tmem` on 
 `tmem`.trip_id=t.id inner join driverinformation di on di.id=tmem.member_id
 where `t`.`is_deleted` = 0")->result_array();
    }
 }