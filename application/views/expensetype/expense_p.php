<html>
    <head>
        <title><?php //echo $title; ?></title>
        <style>
            @media print
            {
                * {-webkit-print-color-adjust:exact;}
                @page {margin:0in 0.10in 0in 0in; }
                .super_container
                {
                    page-break-after: always;
                    margin-top:0.25in;
                    position:relative;
                    width:100vw;
                    height:710px;
                }
            }
            body {margin: 0.25in 0.25in 0.63in 0.25in; box-sizing:border-box;width:100vw; height:100vh;padding-bottom:0.63in;}
            *{margin:0;padding:0;font-family:calibri;}
            .clear:after{content:"";clear:both;display:block;}
            .left{float:left;}
            .right{float:right;}
            .wd-10{width:10%;}
            .wd-20{width:20%;}
            .wd-30{width:30%;}
            .wd-40{width:40%;}
            .wd-50{width:50%;}
            .wd-60{width:60%;}
            .wd-70{width:70%;}
            .wd-80{width:80%;}
            .wd-90{width:90%;}
            .wd-100{width:100%;}
            .wd-15{width:15%;}
            .wd-25{width:25%;}
            .wd-35{width:35%;}
            .wd-45{width:45%;}
            .wd-55{width:55%;}
            .wd-65{width:65%;}
            .wd-75{width:75%;}
            .wd-85{width:85%;}
            .wd-95{width:95%;}
            .wd-100{width:100%;}
            .title{font-size:35px;}
            .super_container
            {
                margin-bottom:200px;
                position:relative;
                width:100vw;
                height:710px;
            }
            .wrapper{
                outline: 4px solid #4c4c4c;
                outline-offset: 5px;
                box-sizing: border-box;
                padding:5px;
            }
            .super_wrapper
            {
                position:absolute;
                top:0;
                left:0;
                width:100%;
                z-index:120;
                margin:0;
                padding:0;
            }
            .watermark
            {
                height:200px;
                width:300px;
                margin:auto;
                padding-top:50px;
                padding-left:100px;
                opacity:0.1;
                background:url("<?php //echo base_url().$b_header['logo1']; ?>");
                background-size:100% 100%;
            }
            .watermark_wrapper
            {
                height:470px;
                width:100%;
                margin-top:50px;
                display:inline-flex;
                display:-webkit-inline-flex;
             }
            .wrapper.left2{
                width: calc(90vw);
                margin-right: 20px;
                margin-left: 20px;
            }
            h1,h2,h3{
                color:#4c4c4c;
                font-family:calibri;
                text-align:center;
            }
            .boxed{background:#222d32;color:#fff;width:100%;margin:0 auto;}
            .header{
                width:100%;
                /*border-bottom:4px double #4c4c4c;  */           
            }
            .body{
                padding:10px 0px;
            }
            .row{
                width:100%;
                margin: 0px auto;  
            }
            .text-center{text-align:center;}
            .bold{font-weight:bold;}
            .b-u-l{
                border-bottom: 1px solid #000;
                height:inherit;
            }
            .x-small{
                font-size: 12px;
            }
            .x-x-small{
                font-size: 9px;
            }
            .page_break{
                width: 100vw;
                height: 100vh;
                padding: 10px 0px;
                box-sizing: border-box;
            }
            .tbl1
            {
                border: 2px solid #000;
                text-align:center;
                width:100%;
                min-height:20px;
            }
            th{
                border: 2px solid #000;
                background-color:#b3d4fc; 
                padding: 3px !important;
            }
            td{
                border: 2px solid #000;
                padding: 2px !important;
            }
            .normal{
                font-weight: normal !important;
            }
            .text-right{
                text-align: right !important;
            }
            .text-left{
                text-align: left !important;
            }
            .margin-a{margin: 30px auto 0px auto;}


           .float-left {
                float:left;
                width:300px; // or 33% for equal width independent of parent width
                }

            .first{

                width: 200px;
            }

            .second{

                width: 350px
            }

</style>
    </head>

    <body class="clear">
        <?php date_default_timezone_set("Asia/Karachi"); ?>
        <div class="super_container">
            <!-- <div class="page_break clear"> -->
                <div class="watermark_wrapper">
                    <div class="watermark"></div>
                </div>
                <div class="super_wrapper">
                    <div class="wrapper left2 left">
                        <div class="header">
                            <div class="wd-100 clear">
                            <!--     <div class=" text-left left ">  
                                <img src="<?php //echo base_url()."Uploads/".$logo['picture']; ?>" style="width:50px;height:50px;">
                                </div>
                                <div class=" text-left right ">
                                    <img src="<?php //echo base_url()."Uploads/".$logo['picture']; ?>" style="width:50px;height:50px;">
                                </div> -->
                                <div>
                                    <!-- <center><h1></h1></center>
                                    <center><h3 style="color:#000 !important;"><i>Softvilla Solutions</i></h3></center>
                                    <center><i><h3 style="color:#000 !important;font-weight:normal;">Smart Workforce Mangement Application</h3></i></center> -->
                                    <center><h3 class="boxed" style="margin-top:0px !important;font-size:23px;">Expense Type Information</h3></center>
                                </div>
<!--                                 
                                <div style="padding: 10px 0px 10px 60px" class="container">
                                    <div align="center" class="float-left"><b>Name:</b>
                                    <?php //if (!empty($query)): ?>
                                    <?php //echo $query[0]['first_name'] . " " .$query[0]['last_name']  ?>
                                    <?php //endif ?>
                                    </div>
                                    <div align="center" class="float-left"><b>Cnic:</b>
                                    <?php //if (!empty($query)): ?>
                                    <?php //echo $query[0]['cnic']   ?>
                                    <?php //endif ?>
                                    </div>
                                    <div align="center" class="float-left"> <b>Mobile:</b>
                                    <?php //if (!empty($query)): ?>
                                    <?php //echo $query[0]['mobile']   ?>
                                    <?php //endif ?>
                                    </div> -->

                                </div>
                            </div>



        <div class="wd-100 clear">
              
             <div class="wd-70 clear" style="float: left">
                <div class="body">
                <table>
                    <tbody>
                     
                     <tr>
                         <td class="first"><strong>Name:</strong></td>
                         <td class="second"><?php if(isset($view)){echo ucfirst($view->name);}  ?>
                         </td>
                      </tr>
                        
                     <tr>
                       <td class="first"><strong>Remarks:</strong></td>
                       <td class="second"><?php if(isset($view)){echo ucfirst($view->remarks);}  ?></td>
                      </tr>
                      
                     
                                         
                      
                     
                    </tbody>
                  </table>

                  </div>
                </div>

               
             </div>
            </div>
         </div>
     <!--  </div> -->
   </div>

    <script>
        window.print();
    </script>
    </body>
</html>