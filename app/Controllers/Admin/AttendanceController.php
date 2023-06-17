<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Attendance;

class AttendanceController extends BaseController
{
    public function __construct(){
        $this->attendance   = new Attendance();
    }

    public function indexAttendance()
    {
        $base_url           = base_url();
        $uri                = 'attendance';
        $parent             = 'employee';
        
        $Attendance = [
            'title'         => $uri,
            'appName'       => $this->getAppName(),
            'parent'        => ['name' => $parent, 'url' => $base_url.$parent],
            'listuser'      => $this->attendance->listUser()->getResult(),
            'attendance'    => $this->attendance->select('attendances.id as id, users.user_number as user_number, users.name as user_name, user_id, log_type, datetime_log')->join('users', 'attendances.user_id = users.id')->findAll(),
            'content'       => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Attendance);
    }

    public function insertAttendance(){
        $data = array(
            'user_id'       => $this->request->getPost('attendanceUser'),
            'log_type'      => $this->request->getPost('attendanceType'),
            'datetime_log'  => $this->request->getPost('attendanceTime')
        );

        $this->attendance->insertAttendance($data);
        session()->setFlashData('message', 'Data Successfully Inserted');
        return redirect()->to(base_url().'employee/attendance');
    }
    public function updateAttendance(){
        $id = $this->request->getPost('attendanceId');
        $data = array(
            'user_id'       => $this->request->getPost('attendanceUser'),
            'log_type'      => $this->request->getPost('attendanceType'),
            'datetime_log'  => $this->request->getPost('attendanceTime')
        );

        $this->attendance->updateAttendance($data, $id);
        session()->setFlashData('message', 'Data Successfully Renewed');
        return redirect()->to(base_url().'employee/attendance');
    }
    public function deleteAttendance(){
        $id                 = $this->request->getPost('attendanceId');
        $date               = $this->request->getPost('attendanceDate');

        $this->attendance->deleteAttendance($id, $date);
        session()->setFlashData('error', 'Data Successfully Deleted');
        return redirect()->to(base_url().'employee/attendance');
    }
    public function deleteSingleAttendance(){
        $id                 = $this->request->getPost('attendanceIdSingle');

        $this->attendance->deleteSingleAttendance($id);
        session()->setFlashData('error', 'Data Successfully Deleted');
        return redirect()->to(base_url().'employee/attendance');
    }
}
