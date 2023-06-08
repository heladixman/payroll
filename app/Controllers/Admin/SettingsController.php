<?php

namespace App\Controllers\Admin;
use App\Models\Allowance;
use App\Models\Bonus;
use App\Models\Deduction;
use App\Models\Departments;
use App\Models\Positions;
use App\Models\PaymentMethod;
use App\Models\Salaries;
use App\Models\WebData;
use Myth\Auth\Config\Auth;

use App\Controllers\BaseController;

class SettingsController extends BaseController
{
    public function __construct(){
        $base_url= base_url();
        $session = session();

        $this->allowance = new Allowance();
        $this->bonus = new Bonus();
        $this->deduction = new Deduction();
        $this->departments = new Departments();
        $this->position = new Positions();
        $this->paymentmethod = new PaymentMethod();
        $this->salary = new Salaries();
        $this->webdata = new WebData();
    }
    
    public function index()
    {
        $uri        = 'settings';
        
        $Settings = [
            'title'             => $uri,
            'allowance'         => $this->allowance->findAll(),
            'bonus'             => $this->bonus->findAll(),
            'deduction'         => $this->deduction->findAll(),
            'department'        => $this->departments->findAll(),
            'listDepartment'    => $this->position->listDepartment()->getResult(),
            'position'          => $this->position->select('positions.id as id,positions.name as position_name, departments.name as department_name, positions.department_id as position_department, description, salary_start, salary_end, positions.id as id')->join('departments', 'positions.department_id = departments.id')->findAll(),
            'payment'           => $this->paymentmethod->findAll(),
            'listPosition'      => $this->salary->listPosition()->getResult(),
            'salary'            => $this->salary->select('positions.name as position_name, salaries.position_id as position_id, positions.department_id as position_department, departments.name as department_name, amount, annual, salaries.id as id')->join('positions', 'salaries.position_id = positions.id')->join('departments', 'positions.department_id = departments.id')->findAll(),
            'webdata'           => $this->webdata->findAll(),
            'content'           => 'Pages/admin/'.$uri.'/index'
        ];

        return view('Pages/admin/index', $Settings);
    }

    // Function for Allowance

    public function insertAllowance(){
        $data = array(
            'name'        => $this->request->getPost('allowanceName'),
            'description' => $this->request->getPost('allowanceDescription')
        );

        $this->allowance->insertAllowance($data);
        session()->setFlashData('message', 'Data berhasil diinput');
        return redirect()->to(base_url().'settings');
    }
    public function getAllowance($id){
        $result = $this->allowance->find($id);
        return json_encode($result);
    }
    public function updateAllowance(){
        
        $id   = $this->request->getPost('allowanceId');
        $data = array(
            'name'        => $this->request->getPost('allowanceName'),
            'description' => $this->request->getPost('allowanceDescription')
        );

        $this->allowance->updateAllowance($data, $id);
        session()->setFlashData('message', 'Data berhasil diperbarui');
        return redirect()->to(base_url().'settings');
    }
    public function deleteAllowance(){
        $id   = $this->request->getPost('allowanceId');

        $this->allowance->deleteAllowance($id);
        session()->setFlashData('message', 'Data berhasil dihapus');
        return redirect()->to(base_url().'settings');
    }


    // Function for Bonus

    public function insertBonus(){
        $data = array(
            'name'        => $this->request->getPost('bonusName'),
            'description' => $this->request->getPost('bonusDescription')
        );

        $this->bonus->insertBonus($data);
        session()->setFlashData('message', 'Data berhasil diinput');
        return redirect()->to(base_url().'settings');
    }
    public function getBonus($id){
        $result = $this->bonus->find($id);
        return json_encode($result);
    }
    public function updateBonus(){
        $id   = $this->request->getPost('bonusId');
        $data = array(
            'name'        => $this->request->getPost('bonusName'),
            'description' => $this->request->getPost('bonusDescription')
        );

        $this->bonus->updateBonus($data, $id);
        session()->setFlashData('message', 'Data berhasil diperbarui');
        return redirect()->to(base_url().'settings');
    }
    public function deleteBonus(){
        $id   = $this->request->getPost('bonusId');

        $this->bonus->deleteBonus($id);
        session()->setFlashData('message', 'Data berhasil dihapus');
        return redirect()->to(base_url().'settings');
    }


    // Function for Deduction

    public function insertDeduction(){
        $data = array(
            'name'        => $this->request->getPost('deductionName'),
            'description' => $this->request->getPost('deductionDescription')
        );

        $this->deduction->insertDeduction($data);
        session()->setFlashData('message', 'Data berhasil diinput');
        return redirect()->to(base_url().'settings');
    }
    public function getDeduction($id){
        $result = $this->deduction->find($id);
        return json_encode($result);
    }
    public function updateDeduction(){
        $id   = $this->request->getPost('deductionId');
        $data = array(
            'name'        => $this->request->getPost('deductionName'),
            'description' => $this->request->getPost('deductionDescription')
        );

        $this->deduction->updateDeduction($data, $id);
        session()->setFlashData('message', 'Data berhasil diperbarui');
        return redirect()->to(base_url().'settings');
    }
    public function deleteDeduction(){
        $id   = $this->request->getPost('deductionId');

        $this->deduction->deleteDeduction($id);
        session()->setFlashData('message', 'Data berhasil dihapus');
        return redirect()->to(base_url().'settings');
    }

    // Function for Department

    public function insertDepartment(){
        $data = array(
            'name'        => $this->request->getPost('departmentName'),
            'contact'     => $this->request->getPost('departmentContact'),
            'vision'      => $this->request->getPost('departmentVision'),
            'mission'     => $this->request->getPost('departmentMission')
        );

        $this->departments->insertDepartment($data);
        session()->setFlashData('message', 'Data berhasil diinput');
        return redirect()->to(base_url().'settings');
    }
    public function getDepartment($id){
        $result = $this->departments->find($id);
        return json_encode($result);
    }
    public function updateDepartment(){
        $id   = $this->request->getPost('departmentId');
        $data = array(
            'name'        => $this->request->getPost('departmentName'),
            'contact'     => $this->request->getPost('departmentContact'),
            'vision'      => $this->request->getPost('departmentVision'),
            'mission'     => $this->request->getPost('departmentMission')
        );

        $this->departments->updateDepartment($data, $id);
        session()->setFlashData('message', 'Data berhasil diperbarui');
        return redirect()->to(base_url().'settings');
    }
    public function deleteDepartment(){
        $id   = $this->request->getPost('departmentId');

        $this->departments->deleteDepartment($id);
        session()->setFlashData('message', 'Data berhasil dihapus');
        return redirect()->to(base_url().'settings');
    }

    // Function for Position

    public function insertPosition(){
        $data = array(
            'name'          => $this->request->getPost('positionName'),
            'department_id' => $this->request->getPost('positionDepartment'),
            'description'   => $this->request->getPost('positionDescription'),
            'salary_start'  => $this->request->getPost('positionSalaryStart'),
            'salary_end'    => $this->request->getPost('positionSalaryEnd')
        );

        $this->position->insertPosition($data);
        session()->setFlashData('message', 'Data berhasil diinput');
        return redirect()->to(base_url().'settings');
    }
    public function getPosition($id){
        $result = $this->position->find($id);
        return json_encode($result);
    }
    public function updatePosition(){
        $id   = $this->request->getPost('positionId');
        $data = array(
            'name'          => $this->request->getPost('positionName'),
            'department_id' => $this->request->getPost('positionDepartment'),
            'description'   => $this->request->getPost('positionDescription'),
            'salary_start'  => $this->request->getPost('positionSalaryStart'),
            'salary_end'    => $this->request->getPost('positionSalaryEnd')
        );

        $this->position->updatePosition($data, $id);
        session()->setFlashData('message', 'Data berhasil diperbarui');
        return redirect()->to(base_url().'settings');
    }
    public function deletePosition(){
        $id   = $this->request->getPost('positionId');

        $this->position->deletePosition($id);
        session()->setFlashData('message', 'Data berhasil dihapus');
        return redirect()->to(base_url().'settings');
    }


    // Function for Payment Method

    public function insertPaymentMethod(){
        $data = array(
            'name'        => $this->request->getPost('paymentMethodName'),
            'number' => $this->request->getPost('paymentMethodNumber'),
            'description' => $this->request->getPost('paymentMethodDescription')
        );

        $this->paymentmethod->insertPaymentMethod($data);
        session()->setFlashData('message', 'Data berhasil diinput');
        return redirect()->to(base_url().'settings');
    }
    public function getPaymentMethod($id){
        $result = $this->paymentmethod->find($id);
        return json_encode($result);
    }
    public function updatePaymentMethod(){
        $id   = $this->request->getPost('paymentMethodId');
        $data = array(
            'name'        => $this->request->getPost('paymentMethodName'),
            'number' => $this->request->getPost('paymentMethodNumber'),
            'description' => $this->request->getPost('paymentMethodDescription')
        );

        $this->paymentmethod->updatePaymentMethod($data, $id);
        session()->setFlashData('message', 'Data berhasil diperbarui');
        return redirect()->to(base_url().'settings');
    }
    public function deletePaymentMethod(){
        $id   = $this->request->getPost('paymentMethodId');

        $this->paymentmethod->deletePaymentMethod($id);
        session()->setFlashData('message', 'Data berhasil dihapus');
        return redirect()->to(base_url().'settings');
    }


    // Function for Salary

    public function insertSalary(){
        $amount = $this->request->getPost('salaryAmount');

        $data = array(
            'position_id'   => $this->request->getPost('salaryPositionId'),
            'amount'        => $amount,
            'annual'        => $amount * 12
        );

        $this->salary->insertSalary($data);
        session()->setFlashData('message', 'Data berhasil diinput');
        return redirect()->to(base_url().'settings');
    }
    public function getSalary($id){
        $result = $this->salary->find($id);
        return json_encode($result);
    }
    public function updateSalary(){
        $id   = $this->request->getPost('salaryId');
        $amount = $this->request->getPost('salaryAmount');

        $data = array(
            'position_id'   => $this->request->getPost('salaryPositionId'),
            'amount'        => $amount,
            'annual'        => $amount * 12
        );

        $this->salary->updateSalary($data, $id);
        session()->setFlashData('message', 'Data berhasil diperbarui');
        return redirect()->to(base_url().'settings');
    }
    public function deleteSalary(){
        $id   = $this->request->getPost('salaryId');

        $this->salary->deleteSalary($id);
        session()->setFlashData('message', 'Data berhasil dihapus');
        return redirect()->to(base_url().'settings');
    }

    // Function for Web Data
    public function getWebData($id){
        $result = $this->webdata->find($id);
        return json_encode($result);
    }
    public function updateWebData(){
        $id    = $this->request->getPost('webdataId');
        $data  = $this->request->getPost('webdataValue');

        $this->webdata->updateWebData($data, $id);
        session()->setFlashData('message', 'Data berhasil diperbarui');
        return redirect()->to(base_url().'settings');
    }
}
