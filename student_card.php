<?php
    include "./db_connect.php";
    $obj = new DB_Connect();
    session_start();

    $student_id = $_SESSION['student_id'];
    $stmt = $obj->con1->prepare("SELECT * FROM `student_data` WHERE id=?");
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $Res = $stmt->get_result();
    $data = $Res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="assets/css/theme.min.css">
    <link rel="stylesheet" href="assets/css/utility.min.css">
    <link rel="stylesheet" href="assets/css/demo/start-hub-1/base.css">
    <link rel="stylesheet" href="assets/css/demo/start-hub-1/start-hub-1-contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700&amp;family=Nunito:wght@400;600;700&amp;family=Roboto&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Lora:ital,wght@0,400..700;1,400..700&family=Marcellus&family=Protest+Revolution&display=swap" rel="stylesheet">
    <title>Student Goal-Form</title>
</head>

<body data-lqd-cc="true" data-mobile-nav-breakpoint="1199" data-mobile-nav-style="minimal" data-mobile-nav-scheme="gray"
    data-mobile-nav-trigger-alignment="right" data-mobile-header-scheme="custom" data-mobile-logo-alignment="default"
    data-overlay-onmobile="true">
    <div id="wrap">
        <div class="container border border-2 mt-80 relative bg-white rounded-10 transition-all shadow-lg">
            <div class="row ptb-50" id="downloadImgDiv">
                <div class=" col-12 mt-25">
                    <div class="profile-heading">
                        <h1 class=" relative">Success is earned through
                            <span class="title-shape ">
                                <svg width="168" height="65" viewBox="0 0 168 65" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M73.3761 8.49147C78.4841 6.01353 82.5722 4.25154 88.8933 3.3035C94.2064 2.50664 99.6305 2.0701 104.981 1.94026C120.426 1.56549 135.132 4.90121 146.506 9.70405C158.628 14.8228 166.725 22.5638 166.074 31.6501C165.291 42.5779 151.346 51.7039 133.508 56.8189C110.253 63.4874 81.7065 63.8025 58.5605 60.8285C37.5033 58.123 11.6304 51.7165 3.58132 40.0216C-3.43085 29.8337 12.0728 18.1578 27.544 11.645C40.3656 6.24763 55.7082 2.98328 70.8043 4.08403C81.9391 4.89596 93.2164 6.87822 102.462 9.99561C112.874 13.5066 120.141 18.5932 127.862 23.6332"
                                        stroke="#428bca" stroke-width="3" stroke-linecap="round"></path>
                                </svg>
                            </span> determination and perseverance.
                        </h1>
                    </div>
                </div>
                <div class="w-full d-flex relative flex-wrap profile-head  pt-30  pb-30 module-form">
                    <div class="col-12 col-md-6 ">
                        <table class="profile-table ">
                            <tbody>
                                <tr>
                                    <td class="font-secondary">Name </td>
                                    <td><span class="divide">:</span> <span id="nameSpan"></span></td>
                                </tr>
                                <tr>
                                    <td class="font-secondary">School Name </td>
                                    <td><span class="divide">:</span> <span id="schoolSpan"></span></td>
                                </tr>
                                <tr>
                                    <td class="font-secondary">Standard</td>
                                    <td><span class="divide">:</span> <span id="stdSpan"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="profile">
                            <img src="./student_images/<?php echo $data['student_img']; ?>" alt="Image not found" id="stuImg">
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex flex-wrap justify-center flex-column">
                    <div class="heading col-12">
                        <h2 class="goal">My Goal</h2>
                    </div>
                    <table class="goal-table" id="goal-table">
                        <thead>
                            <tr>
                                <th class="border-0"><span class="epi-family marks-heading">Subject</span></th>
                                <th class="border-0"><span class="epi-family marks-heading">Marks</span></th>
                            </tr>
                        </thead>
                        <tbody class="border border-1">
                            
                        </tbody>
                        <tfoot>
                            
                        </tfoot>
                    </table>
                </div>
                <div class="col-12 d-flex flex-wrap flex-column ">
                    <div class="heading col-12">
                        <h2 class="goal">My Slogan to Success</h2>
                    </div>
                    <div class="slogans">
                        <ul>
                            <li>
                                <p class="lora slogan">“Believe you can and you're halfway there.”</p>
                            </li>
                            <li>
                                <p class="lora slogan">The future belongs to those who believe in the beauty of their
                                    dreams.”</p>
                            </li>
                            <li>
                                <p class="lora slogan">“Everything in the universe is within you. Ask all from
                                    yourself.”</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex items-center justify-center mt-40 mb-40" onclick="downloadImage('downloadImgDiv')">
            <button type="button" class="down-btn border-0">
                <p class="p-0 m-0">Download</p>
            </button>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
    <script src="assets/vendors/jquery.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script>
        function downloadImage(divId){
            const element = document.getElementById(divId);
            html2canvas(element).then(canvas => {
                canvas.toBlob(blob => {
                    saveAs(blob, 'my-goal.jpg');
                })
            })
        }
        document.addEventListener("DOMContentLoaded", () => {
            const table = document.getElementById("goal-table");
            const tbody = table.querySelector("tbody");
            const tfoot = table.querySelector("tfoot");
            const studentData = JSON.parse(localStorage.getItem("studentData")) || null;
            const studentMarks = JSON.parse(localStorage.getItem("studentMarks")) || null;

            if (studentData && studentMarks) {
                let nameSpan = document.getElementById("nameSpan");
                let stdSpan = document.getElementById("stdSpan");
                let schoolSpan = document.getElementById("schoolSpan");

                nameSpan.innerHTML = studentData.name;
                stdSpan.innerHTML = `${studentData.std}th ${studentData.stream || ''}`;
                schoolSpan.innerHTML = studentData.school;

                let content = "";
                let sum = 0;

                studentMarks.forEach((item, idx) => {
                    sum += item.marks;
                    content += 
                    `<tr class="border border-1">
                        <td class="myborder">
                            <span class="epi-family marks-heading2">${item.subject}</span>
                        </td>
                        <td class="myborder">
                            <span class="epi-family marks-heading2">${item.marks}</span>
                        </td>
                    </tr>`
                })
                tbody.innerHTML = content;
                tfoot.innerHTML = `
                <tr class="border border-1">
                    <td class="myborder">
                        <span class="epi-family marks-heading font-bold">Total Marks</span>
                    </td>
                    <td class="myborder">
                        <span class="epi-family marks-heading font-bold">${sum}</span>
                    </td>
                </tr>
                <tr class="border border-1">
                    <td class="myborder">
                        <span class="epi-family marks-heading font-bold">Total Percentage</span>
                    </td>
                    <td class="myborder">
                        <span class="epi-family marks-heading font-bold">${(sum/studentMarks.length).toFixed(2)}</span>
                    </td>
                </tr>`
            }
        })
    </script>
</body>

</html>