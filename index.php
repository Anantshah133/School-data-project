<?php
session_start();
include "./db_connect.php";
$obj = new DB_Connect();
error_reporting(E_ALL);

if (isset($_REQUEST['save'])) {
    $name = $_REQUEST['studentName'];
    $school = $_REQUEST['studentSchool'];
    $studentContact = $_REQUEST['studentContact'];
    $stdFatherContact = $_REQUEST['stdFatherContact'];
    $gender = $_REQUEST['studentGender'];
    $std = $_REQUEST['studentStd'];
    $stream = isset($_REQUEST['stream']) ? $_REQUEST['stream'] : '';
    $studentImg = uploadImage('studentImg', 'student_images');
    move_uploaded_file($_FILES['studentImg']['tmp_name'], "./student_images/" . $studentImg);

    try {
        $stmt = $obj->con1->prepare("INSERT INTO `student_data` (`name`, `school_name`, `std_contact`, `father_contact`, `student_img`, `gender`, `standard`, `stream`) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssss", $name, $school, $studentContact, $stdFatherContact, $studentImg, $gender, $std, $stream);
        $Resp = $stmt->execute();
        if (!$Resp) {
            throw new Exception("Problem in adding! " . strtok($obj->con1->error, '('));
        }
        $_SESSION['student_id'] = $obj->con1->insert_id;
        $stmt->close();
    } catch (\Throwable $e) {
        setcookie("sql_error", urlencode($e->getMessage()), time() + 3600, "/");
    }

    if($Resp){
        header("location:marks_info.php");
        exit();
    }
    header("location:index.php");
}

function uploadImage($inputName, $uploadDirectory){
    $fileName = $_FILES[$inputName]['name'];
    $tmpFilePath = $_FILES[$inputName]['tmp_name'];
    if ($fileName != "") {
        $targetDirectory = $uploadDirectory . '/';
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0755, true);
        }
        $i = 0;
        $newFileName = $fileName;
        while (file_exists($targetDirectory . $newFileName)) {
            $i++;
            $newFileName = $i . '_' . $fileName;
        }
        $targetFilePath = $targetDirectory . $newFileName;
        return $newFileName;
    }
    return null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta property="og:image" content="assets/images/common/og-image.jpg">
    <link rel="stylesheet" href="assets/css/theme.min.css">
    <link rel="stylesheet" href="assets/css/utility.min.css">
    <link rel="stylesheet" href="assets/css/demo/base.css">
    <link rel="stylesheet" href="assets/css/media.css">
    <link rel="stylesheet" href="assets/css/demo/start-hub-1-contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700&amp;family=Nunito:wght@400;600;700&amp;family=Roboto&amp;display=swap"
        rel="stylesheet">
    <title>Student Goal - Form</title>
</head>

<body data-lqd-cc="true" data-mobile-nav-breakpoint="1199" data-mobile-nav-style="minimal" data-mobile-nav-scheme="gray"
    data-mobile-nav-trigger-alignment="right" data-mobile-header-scheme="custom" data-mobile-logo-alignment="default"
    data-overlay-onmobile="true">
    <div id="wrap">
        <div class="titlebar bg-transparent" id="titlebar"
            style="background-image: linear-gradient(180deg, #FF00C414 0%, #FFFFFF 100%);">
            <div class="lqd-sticky-placeholder hidden"></div>
            <div class="titlebar-inner">
                <div class="container titlebar-container">
                    <div class="row titlebar-container justify-center">
                        <div class="col titlebar-col col-xl-6 col-lg-8 col-12 text-center text-gray-400">
                            <h1>Student Info</h1>
                            <p class="leading-20">We are here to set your future goal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main class="content" id="lqd-site-content">
            <div id="lqd-contents-wrap">
                <section class="lqd-section form pb-100" id="form">
                    <div class="container module-container">
                        <div class="row">
                            <div class="col col-12 p-0 module-col">
                                <div
                                    class="w-full relative bg-white rounded-10 transition-all shadow-md pt-60 px-70 pb-80 module-form">
                                    <div class="w-full relative flex flex-wrap items-center justify-between">
                                        <div class="w-50percent relative sm:w-full">
                                            <h2 class="ld-fh-element relative text-28 font-bold">Student Information
                                            </h2>
                                        </div>
                                        <div class="w-50percent relative text-end pr-40 sm:w-full sm:text-start"><img
                                                class="w-60 plane-img" width="100" height="100"
                                                src="assets/images/shape-plane.svg"
                                                alt="plane"></div>
                                    </div>
                                    <div
                                        class="lqd-contact-form lqd-contact-form-inputs-round lqd-contact-form-button-block lqd-contact-form-button-lg lqd-contact-form-button-round lqd-contact-form-button-border-none lqd-contact-form-inputs-md">
                                        <div role="form" class="lqd-cf mt-25" id="lqd-cf-form-contact" lang="en-US"
                                            dir="ltr">
                                            <div class="screen-reader-response">
                                                <p role="status" aria-live="polite" aria-atomic="true"></p>
                                            </div>
                                            <form action="" method="post" id="studentForm" class="lqd-cf-form init" enctype="multipart/form-data">
                                                <div class="row -mx-15">
                                                    <div class="col col-md-6 col-12 py-0 px-15"><span
                                                            class="lqd-form-control-wrap text">
                                                            <label class="label-responsive" for="name">Student Name <span
                                                                    class="optional">(વિદ્યાર્થીનું પૂરું
                                                                    નામ)</span></label>
                                                            <input type="text" name="studentName" size="30" id="stdName"
                                                                class="lqd-cf-form-control border-1 border-black-10 rounded-4 px-2em text-16 text-slate-700"
                                                                placeholder="Neel Sombhai Patel" required></span>
                                                    </div>
                                                    <div class="col col-md-6 col-12 py-0 px-15"><span
                                                            class="lqd-form-control-wrap text">
                                                            <label class="label-responsive" for="name">School Name <span
                                                                    class="optional">(શાળાનું નામ)</span></label>
                                                            <input type="text" name="studentSchool" size="30"
                                                                id="school" class="lqd-cf-form-control border-1 border-black-10 rounded-4 px-2em text-16 text-slate-700"
                                                                aria-required="true" aria-invalid="false"
                                                                placeholder="Sanskar Bharti Vidhyalaya" required></span>
                                                    </div>
                                                    <div class="col col-md-6 col-12 py-0 px-15"><span
                                                            class="lqd-form-control-wrap tel-969">
                                                            <label class="label-responsive" for="ContactNumber">Student Contact Number <span
                                                                    class="optional">(વિદ્યાર્થી સંપર્ક
                                                                    નંબર)</span></label>
                                                            <input type="tel" name="studentContact" size="30"
                                                                maxlength="10" id="phone"
                                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                                class="lqd-cf-form-control border-1 border-black-10 rounded-4 px-2em text-16 text-slate-700"
                                                                aria-required="true" aria-invalid="false"
                                                                placeholder="8899776688" required></span></div>
                                                    <div class="col col-md-6 col-12 py-0 px-15"><span
                                                            class="lqd-form-control-wrap tel-969">
                                                            <label class="label-responsive" for="ContactNumber">Father Contact Number <span
                                                                    class="optional">(પિતાનો સંપર્ક નંબર)</span></label>
                                                            <input type="tel" name="stdFatherContact" size="30"
                                                                maxlength="10" id="fatherNum"
                                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                                class="lqd-cf-form-control border-1 border-black-10 rounded-4 px-2em text-16 text-slate-700"
                                                                aria-required="true" aria-invalid="false"
                                                                placeholder="8899776688" required></span></div>
                                                    <div class="col col-md-6 col-12 py-0 px-15"><span
                                                            class="lqd-form-control-wrap tel-969">
                                                            <label class="label-responsive" for="ContactNumber">Upload Photo / Selfie</label>
                                                            <div class="qd-cf-form-control border-1 border-black-10 rounded-4 py-2em">
                                                                <input type="file" id="stImg" accept="image/*" name="studentImg" class="file-upload  lqd-cf-form-control border-1 border-black-10 rounded-4 px-2em text-16 text-slate-700" aria-required="true" aria-invalid="false" required>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="col col-md-6 col-12 py-0 px-15">
                                                        <span class="lqd-form-control-wrap text">
                                                            <label class="label-responsive" for="">Student Gender</label>
                                                            <div class="flex items-center mt-10">
                                                                <div class="mr-15">
                                                                    <input type="radio" value="male" id="male"
                                                                        class="mr-5" name="studentGender">
                                                                    <label for="male" class="cursor-pointer gender-input">Male</label>
                                                                </div>
                                                                <div>
                                                                    <input type="radio" value="female" id="female"
                                                                        class="mr-5" name="studentGender">
                                                                    <label for="female" class="cursor-pointer gender-input">Female</label>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="col col-md-6 col-12 py-0 px-15">
                                                        <span class="lqd-form-control-wrap text">
                                                            <label class="label-responsive" for="name">Student Standard <span
                                                                    class="optional">(વિદ્યાર્થિ નુ ધોરણ)</span></label>
                                                            <select name="studentStd" id="studentStd"
                                                                onchange="getStream(this.value, 'stream')"
                                                                class=" lqd-cf-form-control border-1 border-black-10 rounded-4 px-1em text-16 text-slate-700"
                                                                aria-required="true" aria-invalid="false" required >
                                                                <option value="">Select Standard</option>
                                                                <option value="10">Std 10th</option>
                                                                <option value="12">Std 12th</option>
                                                            </select>
                                                        </span>
                                                    </div>
                                                    <div class="col col-md-6 col-12 py-0 px-15 hidden" id="stream">
                                                        <span class="lqd-form-control-wrap text">
                                                            <label class="label-responsive" for="">Student Stream <span class="optional">(શિક્ષણ
                                                                    પ્રવાહ)</span></label>
                                                            <div class="flex items-center mt-10">
                                                                <div class="mr-15">
                                                                    <input type="radio" value="Science" id="sci"
                                                                        class="mr-5" name="stream">
                                                                    <label for="sci"
                                                                        class="cursor-pointer">Science</label>
                                                                </div>
                                                                <div>
                                                                    <input type="radio" value="Commerce" id="com"
                                                                        class="mr-5" name="stream">
                                                                    <label for="com"
                                                                        class="cursor-pointer">Commerce</label>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div class="col col-12 py-0 px-15 mt-25">
                                                        <input name="save" type="submit" value="Go Next" class="lqd-cf-form-control has-spinner lqd-cf-submit bg-sky-800 text-white">
                                                    </div>
                                                </div>
                                                <div class="lqd-cf-response-output" aria-hidden="true"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script src="assets/vendors/jquery.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const studentForm = document.getElementById("studentForm");
            const name = document.getElementById("stdName");
            const male = document.getElementById("male");
            const female = document.getElementById("female");
            const sciRadio = document.getElementById('sci');
            const comRadio = document.getElementById('com');
            const studentStd = document.getElementById("studentStd");
            const school = document.getElementById("school");
            
            studentForm.addEventListener("submit", function (event) {
                const isValid = studentForm.checkValidity();
                if (isValid) {
                    let stream = null;
                    const streamDiv = document.getElementById("stream");
                    if (!streamDiv.classList.contains("hidden")) {
                        stream = sciRadio.checked ? sciRadio.value : comRadio.value;
                    }
                    const stuGender = male.checked ? male.value : female.value;
                    console.log(name.value, stuGender, studentStd.value, stream);

                    const studentObj = {
                        name: name.value,
                        gender: stuGender,
                        std: studentStd.value,
                        stream: stream,
                        school: school.value
                    }
                    localStorage.setItem("nextPageFlag", 'true');
                    localStorage.setItem("studentData", JSON.stringify(studentObj));
                } else {
                    event.preventDefault();
                }
            })
        })

        function getStream(std, hiddenRadio) {
            const radioDiv = document.getElementById(hiddenRadio);
            const sciRadio = document.getElementById('sci');
            const comRadio = document.getElementById('com');
            if (std == 12) {
                radioDiv.classList.remove("hidden");
                sciRadio.required = true;
                comRadio.required = true;
            } else if (std == 10) {
                radioDiv.classList.add("hidden");
                sciRadio.required = false;
                comRadio.required = false;
                sciRadio.checked = false;
                comRadio.checked = false;
            }
        }
    </script>
</body>

</html>