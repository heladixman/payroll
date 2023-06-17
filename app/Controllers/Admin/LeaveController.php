<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Leave;


class LeaveController extends BaseController
{

    public function __construct(){
        $this->leave = new Leave();
    }

    public function indexLeave()
    {
        $base_url               = base_url();
        $uri                    = 'Leave';
        $parent                 = 'Employee';
        
        $UserLeave = [
            'title'             => $uri,
            'appName'           => $this->getAppName(),
            'parent'            => ['name' => $parent, 'url' => $base_url.$parent],
            'listuser'          => $this->leave->listUser()->getResult(),
            'leave'             => $this->leave->select('leave.id as id, users.name as user_name, leave_start, leave_end, reason, prove, total_leave, leave.status as status_leave')->orderBy('leave.id', 'desc')->join('users', 'leave.user_id = users.id')->findAll(),
            'content'           => 'Pages/admin/'.$parent.'/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $UserLeave);
    }

    public function insertLeave(){
        $id                     = $this->request->getPost('leaveUserId');
        $leave_start            = date_create($this->request->getPost('leaveStart'));
        $leave_end              = date_create($this->request->getPost('leaveEnd'));
        $total_leave            = date_diff($leave_start, $leave_end)->days + 1;
        $leave_prove            = $this->request->getFile('leaveProve');

        if($leave_prove){
            $targetDirectory    = 'assets/image/leave/';
            $targetName         = $leave_prove->getRandomName();
            $leave_prove->move($targetDirectory, $targetName);
        }

        $data = array(
            'user_id'           => $id,
            'leave_start'       => $this->request->getPost('leaveStart'),
            'leave_end'         => $this->request->getPost('leaveEnd'),
            'reason'            => $this->request->getPost('leaveReason'),
            'prove'             => $targetDirectory.$targetName,
            'total_leave'       => $total_leave,
            'status'            => $this->request->getPost('leaveStatus')
        );

        $this->leave->insertLeave($data);
        session()->setFlashData('message', 'Data Successfully Inserted');
        return redirect()->to(base_url().'employee/leave');
    }

    public function approveLeave(){
        $id                     = $this->request->getPost('approveidLeave');

        $this->leave->approveLeave($id);
        session()->setFlashData('message', 'Data Has Been Approved');
        return redirect()->to(base_url().'employee/leave');
    }

    public function declineLeave(){
        $id                     = $this->request->getPost('declineidLeave');
        $comment                = $this->request->getPost('commentLeave');

        $data = array(
            'comment'           => $comment,
            'status'            => 'Decline'
        );

        $this->leave->declineLeave($id, $data);
        session()->setFlashData('message', 'Data Has Been Declined');
        return redirect()->to(base_url().'employee/leave');
    }
}
