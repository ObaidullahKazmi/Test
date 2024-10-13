<?php
$error = ""; // Variable to hold error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollno = $_POST['txtFormNo'];
    $courseType = $_POST['rdlistCourse'];
    $examType = $_POST['ddlExamType'];
    $year = $_POST['ddlExamYear'];

    // Server-side validation
    if (empty($courseType)) {
        $error = "Please select Intermediate or Matric.";
    } elseif (empty($year)) {
        $error = "Please select Year.";
    } elseif (empty($rollno)) {
        $error = "Please Enter The RollNo.";
    } elseif (!ctype_digit($rollno)) {
        $error = "Invalid RollNo.";
    } elseif (!in_array($examType, ['0', '1', '2'])) {
        $error = "Invalid Exam Type.";
    } else {
        // All validations passed, proceed to redirect based on the criteria
        if ($year == "2024" && $examType == "1") {
            if ($courseType == "HSSC") {
                header("Location: 11thClass.php?rollNumber=" . urlencode($rollno));
                exit();
            } elseif ($courseType == "SSC") {
                header("Location: http://localhost:7700/Bise/9thClass.html?rollNumber=" . urlencode($rollno));
                exit();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board of Intermediate & Secondary Education, Lahore</title>
    <link rel="shortcut icon" href="Images/mono.jpg" />
    <style type="text/css">
        .MaskedEditError
        {
            background-color: Red;
        }
        .textBoxes
        {
            text-transform: uppercase;
        }
        .textBoxes
        {
            font-size: 16px;
            text-transform: uppercase;
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            border-radius: 8px;
            color: Black;
        }
        .textBoxes1
        {
            text-transform: uppercase;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            color: Black;
            background-color: #DBE5F1;
        }
        .style4
        {
            height: 101px;
            width: 7%;
        }
        .td {
    border-radius: 8px;
    background-color: #89B58B;
    color: black;
    border: 2px solid darkgreen;
}​
.button3 {border-radius: 8px;}
.button {
        border-style: none;
            border-color: inherit;
            border-width: medium;
            width: 180px;
            height: 45px;
            font-family: TimesNewRoman;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            font-weight: 500;
            color: white;
   background-color: #1C4D24;
            border-radius: 5px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
}
.button:hover {
  background-color: #89B58B;
  box-shadow: 0px 15px 20px rgba(137, 181, 139, 1);
  color: #fff;
  transform: translateY(-7px);
}
 .radioButtonList input {
    opacity: 0;
    position: absolute;   
}
 
.radioButtonList input, .radioButtonList label {
    display: inline-block;
    vertical-align: middle;
    margin: 5px;
    cursor: pointer;
}
 
.radioButtonList label {
    position: relative;
    font-size: 20px;
}
/* Edit the properties below to change the colors of the un-checked radio button */
.radioButtonList input + label:before {
    content: '';
    background: #1C4D24;
    border: 2px solid #ddd;
    display: inline-block;
    vertical-align: middle;
    width: 20px;
    height: 20px;
    padding: 2px;
    line-height:15px;
    margin-right: 10px;
    text-align: center;
    
}
 
.radioButtonList input + label:before {
    border-radius: 50%;
}
/* Edit the properties below to change the colors of the checked radio button */
.radioButtonList input:checked + label:before {
    content: '✓';
    font-family: 'FontAwesome';
    color: white;
    font-weight: bold;
}
 
.radioButtonList input:focus + label {
  outline: 1px solid #ddd; /* focus style */
}

        #form1
        {
            text-align: center;
        }
        .style9
        {
            width: 352px;
            height: 101px;
        }
        .style10
        {
            left: auto;
            height: 17px;
        }
        .style13
        {
            height: 9px;
        }
        .style16
        {
            text-align: left;
            width: 90%;
            height: 17px;
        }
        .style17
        {
            width: 35%;
            text-align: left;
            height: 9px;
        }
        .style18
        {
            text-align: left;
            width: 90%;
            height: 3px;
        }
        .style19
        {
            width: 35%;
            text-align: left;
            height: 3px;
            font-weight: 700;
            background-color: #89B58B;
        }
        .style20
        {
            width: 80%;
            height: 75px;
        }
    </style>
    <script type="text/javascript">
        function Validate1() {
            var rollno = document.getElementById('txtFormNo').value;
            var courseType = document.querySelector('input[name="rdlistCourse"]:checked');
            var examType = document.getElementById('ddlExamType').value;
            var year = document.getElementById('ddlExamYear').value;
            var errorMessage = "";

            if (!courseType) {
                errorMessage = "Please select Intermediate or Matric.";
            } else if (!year || year == "0") {
                errorMessage = "Please select Year.";
            } else if (rollno === '') {
                errorMessage = "Please Enter The RollNo.";
            } else if (!isInteger(rollno)) {
                errorMessage = "Invalid RollNo.";
            } else if (["0", "1", "2"].indexOf(examType) === -1) {
                errorMessage = "Invalid Exam Type.";
            }

            if (errorMessage) {
                document.getElementById('lblError').innerText = errorMessage;
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }

        function isInteger(s) {
            for (var i = 0; i < s.length; i++) {
                var c = s.charAt(i);
                if ((c < "0") || (c > "9")) return false;
            }
            return true;
        }
    </script>
</head>
<body style="background-color: #EAF1DD">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return Validate1();">
    <table width="500" align="center">
        <tr>
            <td class="style4">
                <a href="bise.html"><img src="https://result.biselahore.com/Images/mono.png" style="height: 100px; width: 127px; text-align: center;" /></a>
            </td>
            <td style="font-size: 48px;" class="style9">
                BISE LAHORE
                <center style="font-family: 'Times New Roman', Times, serif; font-size: small">
                    Board of Intermediate and Secondary Education, Lahore
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <div class="td" style="background-color:#F2F2F2;border-color:#9EB060;border-style:Groove;height:396px;width:78%;">
                    <table style="width: 73%; height: 360px" align="center" cellspacing="5">
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <label id="lblError" style="color: #45824E; font-family: 'Times New Roman', Times, serif; font-size: x-large; font-weight: bold;">
                                    Previous Results
                                </label>
                                <hr color="darkgreen">
                            </td>
                        </tr>
                        <?php if ($error): ?>
                        <tr>
                            <td colspan="2" style="text-align: center; color: red;">
                                <?php echo $error; ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <td align="center" colspan="2">
                                <table id="rdlistCourse" class="radioButtonList">
                                    <tr>
                                        <td><input id="rdlistCourse_0" type="radio" name="rdlistCourse" value="SSC" checked /><label for="rdlistCourse_0">Matric</label></td>
                                        <td><input id="rdlistCourse_1" type="radio" name="rdlistCourse" value="HSSC" /><label for="rdlistCourse_1">Intermediate</label></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr color="darkgreen">
                            </td>
                        </tr>
                        <tr>
                            <td class="td" style="font-weight: bold">RollNo:</td>
                            <td><input id="txtFormNo" name="txtFormNo" type="text" maxlength="6" class="textBoxes" autocomplete="off" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <td class="td" style="font-weight: bold">ExamType:</td>
                            <td>
                                <select id="ddlExamType" name="ddlExamType" class="textBoxes" style="width:100%;">
                                    <option value="0">Supplementary</option>
                                    <option value="2">Part-II (ANNUAL)</option>
                                    <option value="1" selected>Part-I (ANNUAL)</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="td" style="font-weight: bold">Year:</td>
                            <td>
                                <select id="ddlExamYear" name="ddlExamYear" class="textBoxes" style="width:100%;">
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <!-- Continue for other years -->
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: right;">
                                <hr color="darkgreen">
                                <input type="submit" name="Button1" value="View Result" class="button" />
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <center style="font-family: 'Times New Roman', Times, serif; font-size: x-small">
        <label>Powered by: Board of Intermediate and Secondary Education, Lahore (COMPUTER SECTION)</label>
    </center>
</form>

</body>
</html>