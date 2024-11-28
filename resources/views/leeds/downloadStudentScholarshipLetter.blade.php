<Doctype html>
<html>
    <head>
        <title></title>
        <!--Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!--Google fonts-->
        <style>
    
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            /*box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);*/
        }

        body,p,h1,h2,h3,h4,h5,h6{
            font-family: "Afacad Flux", sans-serif !important;
            font-optical-sizing: auto;
            font-weight: weight;
            font-style: normal;
            font-variation-settings:
            "slnt" 0;
        }

            body{
            font-size:18px !important
        }

        th, td {
            padding: 2px;
            text-align: left;
            border: 1px solid #ddd;
        }
        thead {
            background-color: #000033;
            color: #ffffff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
           /* background-color: #ddd;*/
        }

        body {
                font-family: 'Raleway', sans-serif !important; /* Replace with your chosen font */
            }

    </style>
    <script>
        function printPageArea(areaID){
           var printContent=document.getElementById(areaID).innerHTML;
           var originalContent=document.body.innerHTML;
           document.body.innerHTML=printContent;
           window.print();
           document.body.innerHtml=originalContent;
        }
    </script>
    </head>
    <body>
        <div class="container">
            <div class="top-nav" id="">
                <a href="javascript:void(0);" onclick="printPageArea('wrapper');" >Print Scholarship Letter</a>
            </div>

            <div id="wrapper">
            
                <center>
                
                    <center><img src="{{ $imageSrc }}" alt="Logo" width="30%"></center>
                    <p style="border-bottom:3px solid #000033">
                        <b>
                        View Park Towers 17th Floor, University way | P. O. Box 1334-00618, Nairobi<br>
                        Web: <a href="https://techsphereinstitute.co.ke/stdadm/public/" style="color:blue">https://techsphereinstitute.co.ke/stdadm/public/</a> | Email: <span style="color:blue">Info@techsphereinstitute.co.ke </span>| <br>
                        Phone: <span style="color:#3ccccc">+254768919307</span>
                        </b>
                    </p>
                </center>
            <!-- <h3><b>Dear {{$leed->student_fullname}}</b></h3>-->
                <table class="table" style="width:100%">
                    <tr style="border:1px solid white">
                        <td style="border:1px solid white"> <h4><b>Dear {{$leed->student_fullname}}</b></h4></td>
                        <td style="border:1px solid white;text-align:right;"> <h4><b>AdmNo :  TTI/NOV/2024/{{$leed->serial_number}}</b></h4></td>
                    </tr>
                </table>
                <p style="text-align:justify">
                    Techsphere Training Institute congratulates you for being shortlisted to be admitted into this year’s  Annual “Skill Pathfinding” training program having passed our assessment.

                </p>
                <p style="text-align:justify">
                    The “Skill Pathfinding” Training Program is an ICT skill nurturing platform for the youth, which is targeting to identify 
                    and mentor close to more than 100 talented youth annually, to acquire and develop specialized tech skills that are high in 
                    demand globally today. This is an effort to be part of the solution to the widening skill gap in the global ICT industry. 
                    Consequently, TTI is set out to develop a futuristic approach to reskilling the nation. 
                    Over time, we have grown to become a multi-stakeholder alliance representing both the academia and the ICT sector. 
                    Our focus is on three areas: lifelong learning and upskilling, future-readiness and youth employability as well as innovation.
                </p>

                <p style="text-align:justify">
                    Having successfully qualified for the program, you will be taken through a series of trainings, mentorship programs, 
                    and project-based learning. This will culminate in developing industry recognized skillsets in your area of specialization 
                    as well as proper mentorship into the tech industry. For the 2024 program, we have selected key courses that are in high demand, 
                    up-to-date and guaranteed to give participants a cutting edge in the ICT industry. To make this dream come true, we have reduced 
                    down our fee charges by almost 40% from the standard charges in order to impact more lives as cost can be a greater barrier to such 
                    a predominant milestone. Attached below is the payable fee structure.
                </p>
            <!-- <h4><b style="border-bottom:3px solid #000033">11<sup>th</sup> November 2024 Upskilling Program</b></h4>-->

                <table class="table table-bordered table-sm">
                    <thead>
                            <th>Training Program</th>
                            <th>Duration</th>
                            <th>Registration Fee (Ksh)</th>
                            <th>Tution Fee (Ksh)</th>
                    </thead>
                    <body>
                        <tr>
                            <td>CIT 101 Python Programming</td>
                            <td>4 Weeks</td>
                            <td>1,000</td>
                            <td>15,500</td>
                        </tr>

                        <tr>
                            <td>CIT 102 Android Application Development (Kotlin)</td>
                            <td>4 Weeks</td>
                            <td>1,000</td>
                            <td>15,500</td>
                        </tr>

                        <tr>
                            <td>CIT 103 Cyber Security</td>
                            <td>4 Weeks</td>
                            <td>1,000</td>
                            <td>15,500</td>
                        </tr>

                        <tr>
                            <td>CIT 104 Data Data Science</td>
                            <td>4 Weeks</td>
                            <td>1,000</td>
                            <td>15,500</td>
                        </tr>

                        <tr>
                            <td>CIT 105 Graphic Design</td>
                            <td>4 Weeks</td>
                            <td>1,000</td>
                            <td>15,500</td>
                        </tr>

                        <tr>
                            <td>CIT 106 Digital Marketing</td>
                            <td>4 Weeks</td>
                            <td>1,000</td>
                            <td>15,500</td>
                        </tr>

                        <tr>
                            <td>CIT 107 Web Application Development</td>
                            <td>4 Weeks</td>
                            <td>1,000</td>
                            <td>15,500</td>
                        </tr>

                        <tr>
                            <td>CIT 108 Robotics And IoT</td>
                            <td>4 Weeks</td>
                            <td>1,000</td>
                            <td>15,500</td>
                        </tr>

                        
                            
                    </body>
                </table>

            
            
            
                <p style="text-align:justify">
                    For this program, select one course from the list above. The program will run for a period of 6 weeks, 2hrs per day (MON-FRI) and a certificate will be issued upon completion. 
                    To accept this partial scholarship, you are required to visit  <a href="https://techsphereinstitute.co.ke">https://techsphereinstitute.co.ke</a> and select <b>“Enroll”</b> to register before the deadline <b> 6<sup>th</sup> December 2024 </b> . 
                    A non-refundable registration fee of <b>KES. 1000</b> is required to secure a spot on the program but students who have attended the program before will not be required to pay this fee. The starting date for the program is on <b>9 <sup>th</sup> December 2024.</b> 
                    Please note, the program will be run <b>PURELY ONLINE.</b> This will enable students to put focus to both the program and normal school assignments.
                </p>
                <p style="text-align:justify">
                    Kindly call +254768919307 or send an email to <a href="info@techsphereinstitute.co.ke">info@techsphereinstitute.co.ke</a> for any queries or clarifications regarding the program. We look forward to having you join us
                </p>

                <table>
                    <tr style="border:1px solid white">
                        <td style="border:1px solid white">
                            <p>
                                Yours faithfully ,<br>
                                <b>Ibrahim Gichemba  </b>
                                <img src="{{ $imageSrc1 }}" width="100%"><br>
                                <b style="font-size:20px">Director Techsphere Training Institute.</b>
                            </p>
                        </td>

                        <td style="border:1px solid white">
                            <p>
                                <img src="{{ $imageSrc2 }}" width="100%"><br>
                            </p>
                        </td>

                        
                    </tr>
                </table>

                <table style="width:100%">
                    <p><center><b>PAYMENT OPTIONS</b></center></p>
                    <br>
                    <br>
                    <tr style="border:1px solid white">
                        <p>BANK</p>
                        <td style="border:1px solid white">
                            <b>BANK NAME:</b> KENYA COMERCIAL BANK <br><br>
                            <b>A/C NAME:</b>  TECHSPHERE INSTITUTE <br><br>
                            <b>A/C NO:</b>	  1327338564 <br><br>

                        </td>

                        <td style="border:1px solid white">
                           <p>MPESA</p>
                           <b>Business Name:</b> Techsphere Institute<br><br>
                            <b>PAY BILL:</b> 522533 <br><br>
                            <b>A/C NO:</b>	  7855887 </br><br>

                        </td>
                    </tr>
                </table>
                
                    
                </div>
            </div>
         </div>

    </body>
</html>   