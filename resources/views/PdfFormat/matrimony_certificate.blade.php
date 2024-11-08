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
            width: 100vw;
            height: 100vh;
            background-color: #f9f9f9;
        }

        .certificate-container {
            width: 100%; /* Full width for landscape */
            max-width: 90%; /* Optional for padding on sides */
            height: 60vh; /* Reduced height for landscape */
            padding: 20px; /* Reduced padding */
            border: 10px solid #4a5568;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .certificate-title {
            font-size: 30px; /* Slightly smaller title */
            font-weight: bold;
            color: #2d3748;
            margin-bottom: 15px;
        }

        .certificate-body {
            font-size: 16px; /* Slightly smaller body text */
            color: #4a5568;
            margin-bottom: 30px;
            line-height: 1.4; /* Tighter line height */
        }

        .certificate-recipient {
            font-size: 22px; /* Slightly smaller recipient name */
            font-weight: bold;
            color: #2c5282;
            margin: 15px 0;
        }

        .certificate-description {
            font-size: 16px; /* Slightly smaller description */
            color: #2d3748;
        }

        .certificate-signature {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .signature-block {
            width: 40%;
            text-align: center;
        }

        .signature-line {
            margin-top: 50px;
            border-top: 1px solid #2d3748;
            padding-top: 8px;
            font-size: 16px;
            color: #4a5568;
        }

        .certificate-footer {
            margin-top: 15px;
            font-size: 12px; /* Smaller footer text */
            color: #a0aec0;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="certificate-title">MARRIAGE</div>

        <div class="certificate-body">
            This certifies that
        </div>

        <div class="certificate-recipient">
            {{$data->first_name}} <br>
            &
            <br>
            {{$data->second_name}}
        </div>

        <div class="certificate-description">
            were united in marriage on {{$data->date}}<br><br>
            at {{$data->church->church_name}} <br><br><br>
            Date of Sacrament: {{$data->date}}
        </div>

        <div class="certificate-signature">
            <div class="signature-block">
                {{$data->priest_name}}
                <div class="signature-line">Priest's Name</div>
            </div>
            <div class="signature-block">
                {{$data->church->church_name}}
                <div class="signature-line">Church Name</div>
            </div>
        </div>

        <div class="certificate-footer">
            {{ $data->church->church_name }} - {{ $data->church->address }}
        </div>
    </div>
</body>
</html>
