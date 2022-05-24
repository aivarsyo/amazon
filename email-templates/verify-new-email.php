<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        table {
            width: 600px;
            margin-left: auto;
            margin-right: auto;
            color: #585d6a;
            font-family: arial, "sans-serif";
            font-weight: 400;
            border-collapse: collapse;
        }

        img {
            width: 150px;
            vertical-align: middle;
        }

        th {
            font-size: 26px;
            font-weight: 400;
            width: 50%;
            padding: 36px 0;
            border-bottom: 1px solid #eaeaea;
        }

        td {
            font-size: 20px;
            padding-bottom: 20px;
        }

        a {
            font-size: 24px;
            font-weight: bold;
        }

        @media screen and (max-width: 600px) {
            table {
                width: 90%;
            }
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <th style="text-align: left;">
                <img src="https://aivars-dev.com/not-amazon/images/logo.png" alt="amazon-logo">
            </th>
            <th style="text-align: right;">
                Verify your new<br> email address
            </th>
        </tr>

        <tr>
            <td colspan="2" style="padding-top: 20px;">
                To verify your email address, please use the following link:
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <a style="color: #585d6a;" href="<?= $link; ?>">Verify Email</a>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                If you didn't request this email, your address may have been entered by mistake. If you ignore or delete this email, nothing further will happen.
            </td>
        </tr>

        <tr>
            <td colspan="2">
                Thank you!
            </td>
        </tr>
    </table>

</body>

</html>