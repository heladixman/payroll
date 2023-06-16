<!DOCTYPE html>
<html>
<head>
  <title>Payslip</title>
  <style>
    /* CSS styles for the payslip */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    .payslip {
      max-width: 700px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f5f5f5;
    }
    .payslip h1 {
      text-align: center;
    }
    .payslip .info {
      margin-bottom: 20px;
    }
    .payslip .info p {
      margin: 5px 0;
    }
    .payslip .table {
      width: 100%;
      border-collapse: collapse;
    }
    .payslip .table th,
    .payslip .table td {
      padding: 8px;
      border-bottom: 1px solid #ddd;
    }
    .payslip .table th {
      text-align: left;
      font-weight: bold;
    }
    .payslip .table td {
      text-align: right;
    }
    .payslip .total {
      text-align: right;
      margin-top: 10px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="payslip">
    <h1>Payslip</h1>
    
    <div class="info d-flex justify-content-between">
      <div class="w-50">
        <p>Reference No: <?= $data['reff_no'] ?></p>
        <p>Date: <?= date("M d, Y", strtotime($data['create_at'])) ?></p>
      </div>
      <div class="w-50">
        <p>Employee Name: <?= $data['user_name'] ?></p>
        <p>Employee Number: <?= $data['user_number'] ?></p>
      </div>
    </div>
    
    <table class="table">
      <tr>
        <th>Description</th>
        <th>Amount</th>
      </tr>
      <tr>
        <td>Basic Salary</td>
        <td>Rp<?= number_format($data['gross_salary'], 0, '', '.') ?></td>
      </tr>
      <tr>
        <td>Allowance</td>
        <td>Rp<?= number_format($data['allowance_total'], 0, '', '.') ?></td>
      </tr>
      <tr>
        <td>Deduction</td>
        <td>Rp<?= number_format($data['deduction_total'], 0, '', '.') ?></td>
      </tr>
      <tr>
        <td>Bonus</td>
        <td>Rp<?= number_format($data['bonus_total'], 0, '', '.') ?></td>
      </tr>
      <tr>
        <td><strong>Earnings</strong></td>
        <td><strong>Rp<?= number_format($gross_salary , 0, '', '.') ?></strong></td>
      </tr>
      <tr>
        <td>PPH</td>
        <td>Rp<?= number_format($data['pph'], 0, '', '.') ?></td>
      </tr>
      <tr>
        <td><strong>Total Earnings</strong></td>
        <td><strong>Rp<?= number_format($data['net_salary'], 0, '', '.') ?></strong></td>
      </tr>
    </table>
    
    <div class="total">
      <p><strong>Net Salary: Rp<?= number_format($data['net_salary'], 0, '', '.') ?></strong></p>
    </div>
  </div>
</body>
</html>