<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta property="og:image" content="assets/images/common/og-image.jpg">
    <link rel="stylesheet" href="assets/css/theme.min.css">
    <link rel="stylesheet" href="assets/css/utility.min.css">
    <link rel="stylesheet" href="assets/css/demo/start-hub-1/base.css">
    <link rel="stylesheet" href="assets/css/demo/start-hub-1/start-hub-1-contact.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700&amp;family=Nunito:wght@400;600;700&amp;family=Roboto&amp;display=swap"
        rel="stylesheet">
    <title>Student Goal-Form</title>
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
                            <h1>Student Goal</h1>
                            <p class="leading-20">We are here to set your future goal​</p>
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
                                    class="w-full relative  bg-white rounded-10 transition-all shadow-md pt-60 px-70 pb-60 module-form">
                                    <div
                                        class="w-full relative justify-center flex flex-wrap items-center justify-between">
                                        <div class="w-50percent relative pt-5 px-10 pb-10 sm:w-full">
                                            <h2 class="ld-fh-element relative text-28 font-bold text-center" id="title">Set your
                                                board exam goal </h2>
                                        </div>
                                    </div>
                                    <div
                                        class="lqd-contact-form lqd-contact-form-inputs-round lqd-contact-form-button-block lqd-contact-form-button-lg lqd-contact-form-button-round lqd-contact-form-button-border-none lqd-contact-form-inputs-lg p-10">
                                        <div role="form" class="lqd-cf mt-25" id="lqd-cf-form-contact" lang="en-US"
                                            dir="ltr">
                                            <div class="screen-reader-response">
                                                <p role="status" aria-live="polite" aria-atomic="true"></p>
                                            </div>
                                            <form action="student_card.php" method="post" class="lqd-cf-form init">
                                                <div class="row -mx-15 justify-center items-center" id="mainFormDiv"></div>
                                                <div class="col col-12 py-0 px-0 mt-25">
                                                    <input type="submit" value="Submit Form" id="submit"
                                                        class="lqd-cf-form-control has-spinner lqd-cf-submit bg-sky-800 text-white">
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
    <script>
        let subjectFor10 = [
            {subject: "science", name: "science"},
            {subject: "maths", name: "maths"},
            {subject: "social science", name: "social science"},
            {subject: "english", name: "english"},
            {subject: "gujarati", name: "gujarati"},
            {subject: "sanskrit/hindi", name: "shindi"},
        ];

        let subjectFor12 = {
            com: [
                {subject: "gujarati", name: "gujarati" },
                {subject: "english", name: "english" },
                {subject: "economics", name: "economics" },
                {subject: "statistics", name: "statistics" },
                {subject: "business administration", name: "ba" },
                {subject: "elements of account", name: "accounts" },
                {subject: "computer", name: "computer" }
            ],
            sci: [
                {subject: "english", name: "english"},
                {subject: "gujarati", name: "gujarati"},
                {subject: "physics", name: "physics"},
                {subject: "chemistry", name: "chemistry"},
                {subject: "biology/maths", name: "biomath"},
                {subject: "computer", name: "computer"},
            ]
        }

        document.addEventListener("DOMContentLoaded", function () {
            const studentData = JSON.parse(localStorage.getItem("studentData")) || null;
            const form = document.querySelector("form");
            let submit = document.getElementById("submit");
            let title = document.getElementById("title");
            let mainFormDiv = document.getElementById("mainFormDiv");
            let data = null;

            if (studentData) {
                submit.classList.remove("hidden");
                title.classList.remove("hidden");

                if (studentData.std == '12' && studentData.stream.toLowerCase() == "science") {
                    data = subjectFor12.sci;
                } else if (studentData.std == '12' && studentData.stream.toLowerCase() == "commerce") {
                    data = subjectFor12.com;
                } else {
                    data = subjectFor10;
                }

                let content = "";
                data.forEach((item) => {
                    content += `
                        <div class="col col-md-6 col-12 py-0 px-15">
                            <span class="lqd-form-control-wrap text">
                                <label for="name">
                                    <span class='subject-name'>${item.subject.toUpperCase()}</span>
                                    MARKS
                                </label>
                            </span>
                        </div>
                        <div class="col col-md-6 col-12 py-0 px-15">
                            <span class="lqd-form-control-wrap text">
                                <input type="number" name="${item.name}" value="" maxlength="2" min="0" max="100" class="lqd-cf-form-control border-1 border-black-10 rounded-4 px-2em text-16 text-slate-700" placeholder="Goal marks" required>
                            </span>
                        </div>
                    `
                })
                mainFormDiv.innerHTML = content;
            } else {
                mainFormDiv.innerHTML = `
                    <h3 class='text-center text-primary' style='color: "#444762";'>Please fill the form details first !!</h3>
                `
                submit.classList.add("hidden");
                title.classList.add("hidden");
            }

            form.addEventListener("submit", (e)=>{
                const subjectWiseMarks = [];
                const numbers = form.querySelectorAll('input[type="number"]');
                const subjects = form.querySelectorAll('.subject-name');

                numbers.forEach((input, idx)=>{
                    const subject = subjects[idx].textContent;
                    const marks = parseInt(input.value);
                    const subjectObj = {subject, marks};
                    subjectWiseMarks.push(subjectObj);
                })
                
                localStorage.setItem("studentMarks", JSON.stringify(subjectWiseMarks));
            })
        })
    </script>
</body>

</html>