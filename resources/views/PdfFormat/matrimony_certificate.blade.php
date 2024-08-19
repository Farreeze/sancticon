<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f9f9;
        }

        .certificate-container {
            width: 80%;
            padding: 40px;
            border: 10px solid #4a5568; /* Darker gray border */
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .certificate-title {
            font-size: 36px;
            font-weight: bold;
            color: #2d3748; /* Dark gray text */
            margin-bottom: 20px;
        }

        .certificate-body {
            font-size: 18px;
            color: #4a5568;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .certificate-recipient {
            font-size: 24px;
            font-weight: bold;
            color: #2c5282; /* Dark blue text */
            margin: 20px 0;
        }

        .certificate-description {
            font-size: 18px;
            color: #2d3748;
        }

        .certificate-signature {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .signature-block {
            width: 40%;
            text-align: center;
        }

        .signature-line {
            margin-top: 60px;
            border-top: 1px solid #2d3748;
            padding-top: 10px;
            font-size: 18px;
            color: #4a5568;
        }

        .certificate-footer {
            margin-top: 20px;
            font-size: 14px;
            color: #a0aec0; /* Light gray text */
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="certificate-title">Certificate of Sacrament</div>

        <div class="certificate-body">
            This is to certify that
        </div>

        <div class="certificate-recipient">
            {{$data->first_name}} <br>
            &
            <br>
            {{$data->second_name}}
        </div>

        <div class="certificate-description">
            have successfully received the sacrament of {{$data->sacrament->desc}}.<br>
            Date of Sacrament: {{$data->date}}
        </div>

        <div class="certificate-signature">
            <div class="signature-block">
                <div class="signature-line">Priest's Name</div>
            </div>
            <div class="signature-block">
                <div class="signature-line">Church Name</div>
            </div>
        </div>

        <div class="certificate-footer">
            {{ $data->church->church_name }} - {{ $data->church->address }}
        </div>
    </div>
</body>
</html>
