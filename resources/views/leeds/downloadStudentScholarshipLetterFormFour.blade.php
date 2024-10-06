<Doctype html>
<html>
    <head>
        <title></title>
        <style>
    
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            /*box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);*/
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
                <a href="javascript:void(0);" onclick="printPageArea('wrapper');">Print Full Content</a>
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
                <table>
                    <tr style="border:1px solid white">
                        <td style="border:1px solid white"> <h4><b>Dear {{$leed->student_fullname}}</b></h4></td>
                        <td style="border:1px solid white;text-align:right;"> <h4><b>Serial No TTI/NOV/2024/{{$leed->serial_number}}</b></h4></td>
                    </tr>
                </table>
                <p style="text-align:justify">
                    Techsphere Training Institute congratulates you for being shortlisted to be admitted into this year’s 2025 Annual “Skill Pathfinding” training program having passed our assessment.

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
                            <td>Web App Development</td>
                            <td>18 Weeks</td>
                            <td>1,000</td>
                            <td>45,500</td>
                        </tr>

                        <tr>
                            <td>Android App Development (Kotlin)</td>
                            <td>18 Weeks</td>
                            <td>1,000</td>
                            <td>45,500</td>
                        </tr>

                        <tr>
                            <td>Cyber Security</td>
                            <td>18 Weeks</td>
                            <td>1,000</td>
                            <td>45,500</td>
                        </tr>

                        <tr>
                            <td>Data Analysis</td>
                            <td>18 Weeks</td>
                            <td>1,000</td>
                            <td>45,500</td>
                        </tr>

                        <tr>
                            <td>Graphic Design</td>
                            <td>18 Weeks</td>
                            <td>1,000</td>
                            <td>45,500</td>
                        </tr>

                        <tr>
                            <td>Digital Marketing</td>
                            <td>18 Weeks</td>
                            <td>1,000</td>
                            <td>45,500</td>
                        </tr>

                        <tr>
                            <td>Python Programming</td>
                            <td>18 Weeks</td>
                            <td>1,000</td>
                            <td>45,500</td>
                        </tr>

                        
                            
                    </body>
                </table>

            
            
            
                <p style="text-align:justify">
                    For this program, select one course from the list above. The program will run for a period of 6 weeks, 2hrs per day (MON-FRI) and a certificate will be issued upon completion. 
                    To accept this partial scholarship, you are required to visit  <a href="https://techsphereinstitute.co.ke">https://techsphereinstitute.co.ke</a> and select <b>“Enroll”</b> to register before the deadline <b> 6 <sup>th</sup> January 2025 </b> which will also be the reporting date. 
                    A non-refundable registration fee of <b>KES. 1000</b> is required to secure a spot on the program but students who have attended the program before will not be required to pay this fee. The starting date for the program is on <b>13 <sup>th</sup> January 2025.</b> 
                    Please note, the program will be run <b>PURELY ONLINE.</b> This will enable students to put focus to both the program and normal school assignments.
                </p>
                <p style="text-align:justify">
                    Kindly call +254768919307 or send an email to <a href="https://techsphereinstitute.co.ke">https://techsphereinstitute.co.ke</a> for any queries or clarifications regarding the program. We look forward to having you join us
                </p>

                <table>
                    <tr style="border:1px solid white">
                        <td style="border:1px solid white">
                            <p>
                                Yours faithfully ,<br>
                                <b>Ibrahim Gichemba  </b>
                                <img src="{{ $imageSrc1 }}" width="100%"><br>
                                Director Techsphere Training Institute.
                            </p>
                        </td>

                        <td style="border:1px solid white">
                            <p>
                                <img src="{{ $imageSrc2 }}" width="100%"><br>
                            </p>
                        </td>

                        
                    </tr>
                </table>

                <table>
                    <tr style="border:1px solid white">
                        <td style="border:1px solid white">
                            <b>BANK NAME:</b> KENYA COMERCIAL BANK <br><br>
                            <b>A/C NAME:</b>  TECHSPHERE INSTITUTE <br><br>
                            <b>A/C NO:</b>	  1327338564 <br><br>

                        </td>

                        <td style="border:1px solid white">
                            <b>MPESA:</b> <br><br>
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