<Doctype html>
<html>
    <head>
        <title></title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            font-size:15px
           
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
            background-color: #ddd;
        }
    </style>
    </head>
    <body>
        
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
            <h3><b>Dear {{$leed->student_fullname}}</b></h3>
            <p style="text-align:justify">
                Techsphere Training Institute is happy to invite you to our annual ICT digital upskilling training program. 
                This program is available with partial scholarships. It has two phases. The first phase is a short program that lasts two weeks, 
                starting on November 11, 2024. The second phase is a longer program that lasts 4 to 5 months, starting on January 13, 2025. 
                The courses offered are listed below.

            </p>
            <h4><b style="border-bottom:3px solid #000033">11<sup>th</sup> November 2024 Upskilling Program</b></h4>

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
                        <td>6 Weeks</td>
                        <td>1,500</td>
                        <td>13,500</td>
                    </tr>

                    <tr>
                        <td>Android App Development (Kotlin)</td>
                        <td>6 Weeks</td>
                        <td>1,500</td>
                        <td>13,500</td>
                    </tr>

                    <tr>
                        <td>Cyber Security</td>
                        <td>6 Weeks</td>
                        <td>1,500</td>
                        <td>13,500</td>
                    </tr>

                    <tr>
                        <td>Digital Literacy</td>
                        <td>6 Weeks</td>
                        <td>1,500</td>
                        <td>13,500</td>
                    </tr>

                    
                        
                </body>
            </table>

           
            <h4><b style="border-bottom:3px solid #000033">13<sup>th</sup> January 2025 Upskilling Program</b></h4>

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
                        <td>1,500</td>
                        <td>56,000</td>
                    </tr>

                    <tr>
                        <td>Android App Development (Kotlin)</td>
                        <td>18 Weeks</td>
                        <td>1,500</td>
                        <td>56,000</td>
                    </tr>

                    <tr>
                        <td>Cyber Security</td>
                        <td>18 Weeks</td>
                        <td>1,500</td>
                        <td>56,000</td>
                    </tr>

                    <tr>
                    <td>Digital Marketing</td>
                        <td>18 Weeks</td>
                        <td>1,500</td>
                        <td>56,000</td>
                    </tr>

                    <tr>
                        <td>Graphic Design</td>
                        <td>18 Weeks</td>
                        <td>1,500</td>
                        <td>56,000</td>
                    </tr>

                    <tr>
                        <td>UI/UX Design</td>
                        <td>18 Weeks</td>
                        <td>1,500</td>
                        <td>56,000</td>
                    </tr>

                    <tr>
                        <td>Digital Literacy</td>
                        <td>18 Weeks</td>
                        <td>1,500</td>
                        <td>56,000</td>
                    </tr>
                
                        
                </body>
            </table>
          
            <p style="text-align:justify">
                Program is open to all student who are interested in expanding their knowledge and skills
                in the field of ICT. Whether you are a beginer or an advance learner,our training program will provide
                you with valuable insights and opportunities to grow and develop your abilities
            </p>
            <p style="text-align:justify">
                At the end of the program, you will received certificate of completion that recognizes your achievements
                and demonstrate your competence in the field of ICT. To join the program, please register through our online portal
                <a href="https://techsphereinstitute.co.ke">https://techsphereinstitute.co.ke</a> before  <b>8<sup style="color:black">th</sup> November 2024</b>
                for any further queries, please call +254768919307 or email <a href="info@techsphereinstitute.ac.ke.">info@techsphereinstitute.ac.ke.</a>
                We look forward to welcoming you to our training program and helping you achieve your goals.
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
            
                   
            </div>

    </body>
</html>   