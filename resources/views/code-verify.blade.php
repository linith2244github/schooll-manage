<!DOCTYPE html>
<html lang="kh">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ស្នើសុំប្តូរពាក្យសម្ងាត់</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Battambang:wght@100;300;400;700;900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Moul&display=swap');
    body {
      background-color: #fdf2e9;
      margin: 0;
      padding: 0;
      font-family: "Battambang", serif;
      font-weight: 400;
      font-style: normal;
    }

    .email-container {
      max-width: 600px;
      margin: 20px auto;
      background: #fff7f0;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border: 1px solid #f4b183;
    }

    .email-header {
      background-color: #d99594;
      color: white;
      padding: 20px;
      text-align: center;
      font-family: "Moul", serif;
      font-weight: 400;
      font-style: normal;
    }

    .email-body {
      padding: 20px;
      color: #5c4033;
      line-height: 1.8;
    }

    .email-body h1 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .email-body p {
      font-size: 16px;
      margin-bottom: 20px;
    }

    .code-box {
      display: inline-block;
      padding: 15px 30px;
      font-size: 20px;
      font-weight: bold;
      background-color: #ffe6e1;
      color: #c0392b;
      border: 2px dashed #e67e22;
      border-radius: 8px;
      text-align: center;
    }

    .reset-btn {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 30px;
      background-color: #d99594;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-size: 16px;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease-in-out;
    }

    .reset-btn:hover {
      background-color: #bf746a;
      transform: translateY(-2px);
    }

    .email-footer {
      background-color: #fdf2e9;
      color: #555555;
      text-align: center;
      padding: 15px 20px;
      font-size: 14px;
      border-top: 1px solid #f4b183;
    }

    .email-footer a {
      color: #d99594;
      text-decoration: none;
    }

    .email-footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="email-container">
        <!-- Email Header -->
        <div class="email-header">
        <h5>សំណើសុំប្តូរពាក្យសម្ងាត់</h5>
        </div>

        <!-- Email Body -->
        <div class="email-body">
        <h1>សួស្តី, {{ $data['name'] }}</h1>
        <p>យើងបានទទួលសំណើសុំប្តូរពាក្យសម្ងាត់របស់អ្នក។ សូមប្រើលេខកូដខាងក្រោមដើម្បីបន្តការប្តូរពាក្យសម្ងាត់។ លេខកូដនេះមានសុពលភាពរយៈពេល 15 នាទីប៉ុណ្ណោះ។</p>

        <div class="code-box">
            {{ $data['code'] }}
        </div>

        <p>អរគុណសម្រាប់ការទុកចិត្ត និង ប្រើប្រាស់ នូវប្រព័ន្ធគ្រប់គ្រងរបស់យើងខ្ញុំ</p>  
        </div>
  </div>
</body>
</html>