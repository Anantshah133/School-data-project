<?php
include "./db_connect.php";
$obj = new DB_Connect();
session_start();
if (isset($_SESSION['student_id'])) {
    $student_id = $_SESSION['student_id'];
    $stmt = $obj->con1->prepare("SELECT * FROM `student_data` WHERE id=?");
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $Res = $stmt->get_result();
    $data = $Res->fetch_assoc();
} else {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result</title>
    <link rel="stylesheet" href="./assets/css/utility.min.css" class="rel">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" class="rel">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <main  class="poster-main">
        <div class="poster position-relative ">
            <div class="poster-section ">
                <div class="poster-heading   ">
                    <h2 class="poppins">MY ACHIVEMENT</h2>
                </div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid meet" version="1.0" viewBox="-2.9 -2.9 507.8 507.8" zoomAndPan="magnify" style="fill: rgb(0, 0, 0);" original_string_length="5115"><g id="__id215_svhz9meefw"><path d="M260.6,66.5L289,7.1c4.8-10,19.7-7,20.3,4l3.4,65.8c0.5,9,11.1,13.4,17.8,7.4l48.9-44.1 c8.2-7.4,20.9,1.1,17.2,11.5l-22,62.1c-3,8.5,5.2,16.6,13.6,13.6l62.1-22c10.4-3.7,18.9,9,11.5,17.2l-44.1,48.9 c-6,6.7-1.6,17.3,7.4,17.8l65.8,3.4c11.1,0.6,14,15.5,4,20.3l-59.5,28.3c-8.1,3.9-8.1,15.4,0,19.3l59.5,28.3c10,4.8,7,19.7-4,20.3 l-65.8,3.4c-9,0.5-13.4,11.1-7.4,17.8l44.1,48.9c7.4,8.2-1.1,20.9-11.5,17.2l-62.1-22c-8.5-3-16.6,5.2-13.6,13.6l22,62.1 c3.7,10.4-9,18.9-17.2,11.5l-48.9-44.1c-6.7-6-17.3-1.6-17.8,7.4l-3.4,65.8c-0.6,11.1-15.5,14-20.3,4l-28.3-59.5 c-3.9-8.1-15.4-8.1-19.3,0L213,494.9c-4.8,10-19.7,7-20.3-4l-3.4-65.8c-0.5-9-11.1-13.4-17.8-7.4l-48.9,44.1 c-8.2,7.4-20.9-1.1-17.2-11.5l22-62.1c3-8.5-5.2-16.6-13.6-13.6l-62.1,22c-10.4,3.7-18.9-9-11.5-17.2l44.1-48.9 c6-6.7,1.6-17.3-7.4-17.8l-65.8-3.4c-11.1-0.6-14-15.5-4-20.3l59.5-28.3c8.1-3.9,8.1-15.4,0-19.3L7.1,213c-10-4.8-7-19.7,4-20.3 l65.8-3.4c9-0.5,13.4-11.1,7.4-17.8l-44.1-48.9c-7.4-8.2,1.1-20.9,11.5-17.2l62.1,22c8.5,3,16.6-5.2,13.6-13.6l-22-62.1 c-3.7-10.4,9-18.9,17.2-11.5l48.9,44.1c6.7,6,17.3,1.6,17.8-7.4l3.4-65.8c0.6-11.1,15.5-14,20.3-4l28.3,59.5 C245.2,74.7,256.8,74.7,260.6,66.5z" style="fill: rgb(242, 129, 11);"/></g><g id="__id216_svhz9meefw"><path d="M203.6,502c-0.8,0-1.6-0.1-2.5-0.2c-5.4-1.1-9.1-5.3-9.4-10.8l-3.4-65.8c-0.2-3.8-2.5-7-6-8.4 s-7.4-0.8-10.2,1.8l-48.9,44.1c-4.1,3.7-9.7,4.1-14.3,1c-4.6-3.1-6.4-8.4-4.5-13.6l22-62.1c1.3-3.5,0.4-7.4-2.3-10.1 c-2.7-2.7-6.5-3.5-10.1-2.3l-62.1,22c-5.2,1.8-10.5,0.1-13.6-4.5s-2.7-10.2,1-14.3l44.1-48.9c2.5-2.8,3.2-6.7,1.8-10.2 c-1.4-3.5-4.7-5.8-8.4-6L11,310.3c-5.5-0.3-9.8-4-10.8-9.4c-1.1-5.4,1.4-10.4,6.4-12.8l59.5-28.3c3.4-1.6,5.5-5,5.5-8.7 s-2.1-7.1-5.5-8.7L6.7,213.9c-5-2.4-7.5-7.4-6.4-12.8c1.1-5.4,5.3-9.1,10.8-9.4l65.8-3.4c3.8-0.2,7-2.5,8.4-6s0.8-7.4-1.8-10.2 l-44.1-48.9c-3.7-4.1-4.1-9.7-1-14.3s8.4-6.4,13.6-4.5l62.1,22c3.5,1.3,7.4,0.4,10.1-2.3c2.7-2.7,3.5-6.5,2.3-10.1l-22-62.1 c-1.8-5.2-0.1-10.5,4.5-13.6s10.2-2.7,14.3,1l48.9,44.1c2.8,2.5,6.7,3.2,10.2,1.8c3.5-1.4,5.8-4.7,6-8.4l3.4-65.8 c0.3-5.5,4-9.8,9.4-10.8c5.4-1.1,10.4,1.4,12.8,6.4l28.3,59.5c1.6,3.4,5,5.5,8.7,5.5c3.8,0,7.1-2.1,8.7-5.5L288,6.6 c2.4-5,7.4-7.5,12.8-6.4s9.1,5.3,9.4,10.8l3.4,65.8c0.2,3.8,2.5,7,6,8.4s7.4,0.8,10.2-1.8l48.9-44.1c4.1-3.7,9.7-4.1,14.3-1 c4.6,3.1,6.4,8.4,4.5,13.6l-22,62.1c-1.3,3.5-0.4,7.4,2.3,10.1c2.7,2.7,6.5,3.5,10.1,2.3l62.1-22c5.2-1.8,10.5-0.1,13.6,4.5 s2.7,10.2-1,14.3l-44.1,48.9c-2.5,2.8-3.2,6.7-1.7,10.2c1.4,3.5,4.7,5.8,8.4,6l65.8,3.4c5.5,0.3,9.8,4,10.8,9.4 c1.1,5.4-1.4,10.4-6.4,12.8l-59.5,28.3c-3.4,1.6-5.5,5-5.5,8.7s2.1,7.1,5.5,8.7l59.5,28.3c5,2.4,7.5,7.4,6.4,12.8s-5.3,9.1-10.8,9.4 l-65.8,3.4c-3.8,0.2-7,2.5-8.4,6s-0.8,7.4,1.7,10.2l44.1,48.9c3.7,4.1,4.1,9.7,1,14.3c-3.1,4.6-8.4,6.4-13.6,4.5l-62.1-22 c-3.5-1.3-7.4-0.4-10.1,2.3c-2.7,2.7-3.5,6.5-2.3,10.1l22,62.1c1.8,5.2,0.1,10.5-4.5,13.6s-10.2,2.7-14.3-1l-48.9-44.1 c-2.8-2.5-6.7-3.2-10.2-1.7c-3.5,1.4-5.8,4.7-6,8.4l-3.4,65.8c-0.3,5.5-4,9.8-9.4,10.8c-5.4,1.1-10.4-1.4-12.8-6.4l-28.3-59.5 c-1.6-3.4-5-5.5-8.7-5.5c-3.8,0-7.1,2.1-8.7,5.5L214,495.3C211.9,499.6,208,502,203.6,502z M251,428.4c4.5,0,8.6,2.5,10.5,6.7 l28.3,59.5c2.4,5,7.2,6,10.6,5.3s7.5-3.4,7.8-9l3.4-65.8c0.2-4.5,3-8.4,7.2-10.2c4.2-1.7,8.9-0.9,12.3,2.1l48.9,44.1 c4.1,3.7,9,2.8,11.8,0.9c2.9-1.9,5.6-6,3.7-11.3l-22-62.1c-1.5-4.3-0.5-8.9,2.7-12.2c3.2-3.2,7.9-4.3,12.2-2.7l62.1,22 c5.2,1.9,9.3-0.9,11.3-3.7c1.9-2.9,2.9-7.7-0.9-11.8l-43.9-49c-3-3.4-3.9-8.1-2.1-12.3c1.7-4.2,5.6-7,10.2-7.2l65.8-3.4 c5.5-0.3,8.3-4.4,9-7.8s-0.3-8.2-5.3-10.6L435,261.5c-4.1-2-6.7-6-6.7-10.5s2.5-8.6,6.7-10.5l59.5-28.3c5-2.4,6-7.2,5.3-10.6 c-0.7-3.4-3.4-7.5-9-7.8l-65.8-3.4c-4.5-0.2-8.4-3-10.2-7.2c-1.7-4.2-0.9-8.9,2.1-12.3L461,122c3.7-4.1,2.8-9,0.9-11.8 s-6-5.6-11.3-3.7l-62.1,22c-4.3,1.5-8.9,0.5-12.2-2.7c-3.2-3.2-4.3-7.9-2.7-12.2l22-62.1c1.9-5.2-0.9-9.3-3.7-11.3 c-2.9-1.9-7.7-2.9-11.8,0.9L331.2,85c-3.4,3-8.1,3.9-12.3,2.1c-4.2-1.7-7-5.6-7.2-10.2l-3.4-65.8c-0.3-5.5-4.4-8.3-7.8-9 s-8.2,0.3-10.6,5.3L261.5,67l-0.9-0.4l0.9,0.4c-2,4.1-6,6.7-10.5,6.7s-8.6-2.5-10.5-6.7L212.1,7.5c-2.4-5-7.2-6-10.6-5.3 c-3.4,0.7-7.5,3.4-7.8,9L190.3,77c-0.2,4.5-3,8.4-7.2,10.2c-4.2,1.7-8.9,0.9-12.3-2.1L121.9,41c-4.1-3.7-9-2.8-11.8-0.9 c-2.9,1.9-5.6,6-3.7,11.3l22,62.1c1.5,4.3,0.5,8.9-2.7,12.2c-3.2,3.2-7.9,4.3-12.2,2.7l-62.1-22c-5.2-1.9-9.3,0.9-11.3,3.7 c-1.9,2.9-2.9,7.7,0.9,11.8l44,48.9c3,3.4,3.9,8.1,2.1,12.3s-5.6,7-10.2,7.2l-65.8,3.4c-5.5,0.3-8.3,4.4-9,7.8 c-0.7,3.4,0.3,8.2,5.3,10.6L67,240.5c4.1,2,6.7,6,6.7,10.5s-2.5,8.6-6.7,10.5L7.5,289.9c-5,2.4-6,7.2-5.3,10.6s3.4,7.5,9,7.8 l65.8,3.4c4.5,0.2,8.4,3,10.2,7.2s0.9,8.9-2.1,12.3L41,380.1c-3.7,4.1-2.8,9-0.9,11.8c1.9,2.9,6,5.6,11.3,3.7l62.1-22 c4.3-1.5,8.9-0.5,12.2,2.7c3.2,3.2,4.3,7.9,2.7,12.2l-22,62.1c-1.9,5.2,0.9,9.3,3.7,11.3c2.9,1.9,7.7,2.9,11.8-0.9l48.9-44.1 c3.4-3,8.1-3.9,12.3-2.1c4.2,1.7,7,5.6,7.2,10.2l3.4,65.8c0.3,5.5,4.4,8.3,7.8,9c3.4,0.7,8.2-0.3,10.6-5.3l28.3-59.5 C242.4,430.9,246.5,428.4,251,428.4z" style="fill: rgb(0, 0, 0);"/></g></svg>
                    <h2 class="actual-marks" id="student-percentage">100%</h2>
                <div class="confetti">
                    <img src="./assets/images/confetti.png" alt="">
                </div>
                <div class="star">
                    <img src="./assets/images/star.png" alt="">
                </div>


                <div class="poster-middle d-flex justify-content-between ">
                    <div class="col-6">
                        <div class="d-flex flex-wrap">
                            <div class="col-12">
                                <div class="profile-photo ">
                                    <img src="./student_images/<?php echo $data['student_img'] ?>" alt="" width="100%" height="400px">
                                </div>
                            </div>
                            
                            <div class="col-11">
                                <div class="standard4 ">
                                    <span class=" poppins position-absolute translate-middle badge rounded-pill bg-danger">MY GOAL(RESULT)
                                        <span class="visually-hidden">unread messages</span>
                                      </span>
                                      <table class="w-100 marks-table"  id="myTable">
                                        <tr id="after-table">
                                            <td  class="w-75 bl-2"><h3 class="poppins marks  text-start ">Subject</h3></td>
                                            <td class="w-25"><h3 class="poppins marks  text-end ">Marks</h3></td>
                                        </tr>
                                      </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-name">
                        <h1 id="student-name">BHAVIN MADHANI</h1>
                        <div class="student-info"><h4 >I CAN DO IT...</h4></div>
                        <div class="standard position-relative ">
                            <h2 class="poppins position-relative" id="student-education">10 TH STD</h2>
                            <span class=" poppins position-absolute translate-middle badge rounded-pill bg-danger">Education
                                <span class="visually-hidden">unread messages</span>
                              </span>
                        </div>
                        <div class="standard3 position-relative">
                            <h2 class="poppins position-relative" id="school-name">Jivan Jyot</h2>
                            <span class=" poppins position-absolute translate-middle badge rounded-pill bg-danger">School</span>
                        </div>
                        <div class="standard2 position-relative ">
                            <h4 class="poppins position-relative ">I am the Best</h2>
                            <h4 class="poppins position-relative ">I can do it</h2>
                            <h4 class="poppins position-relative ">God is always with me.</h2>
                            <h4 class="poppins position-relative ">I am Winner</h2>
                            <h4 class="poppins position-relative ">Today is my Day.</h2>
                            <span class=" poppins position-absolute translate-middle badge rounded-pill bg-danger">
                                I will speak this 5 <br/> lines every morning<span class="visually-hidden">unread messages</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="d-flex items-center justify-center mt-40 mb-40" onclick="downloadImage('downloadImgDiv')">
        <button type="button" class="down-btn border-0">
            <p class="p-0 m-0">Download</p>
        </button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", ()=>{
            const name = document.getElementById("student-name");
            const education = document.getElementById("student-education");
            const school = document.getElementById("school-name");
            const percentage = document.getElementById("student-percentage");
            const myTable = document.getElementById("myTable");
            const studentData = JSON.parse(localStorage.getItem("studentData")) || null;
            const studentMarks = JSON.parse(localStorage.getItem("studentMarks")) || null;

            if(studentData){
                name.innerHTML = studentData.name;
                school.innerHTML = studentData.school;
                education.innerHTML = `${studentData.std}th ${studentData.stream || null}`
                let content = "";
                let sum = 0;
                studentMarks.forEach((data, idx)=>{
                    sum += data.marks;
                    const tr = document.createElement("tr");
                    tr.innerHTML += `
                        <td class="w-75 bl-2"><h3 class="poppins marks text-start capitalize">${capitalizeEachWord(data.subject.toLowerCase())}</h3></td>
                        <td class="w-25"><h3 class="poppins marks text-center">${data.marks}</h3></td>
                    `
                    myTable.querySelector("tbody").append(tr);
                })
                const totalTr = document.createElement("tr");
                totalTr.innerHTML += `
                    <td class="w-75 bl-2"><h3 class="poppins marks text-start capitalize">Total</h3></td>
                    <td class="w-25"><h3 class="poppins marks text-center">${sum}</h3></td>
                `
                myTable.querySelector("tbody").append(totalTr);
                percentage.innerHTML = `${parseInt(sum/studentMarks.length)} %`;
            }
        })   
    function capitalizeEachWord(str) {
        str.toLowerCase();
        return str.charAt(0).toUpperCase() + str.slice(1);
    }
    </script>
</body>
</html>