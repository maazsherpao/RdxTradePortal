    <?php  
    include_once('header.php');require 'config.php';
    if(!isset($_SESSION['customer_id'])) {header('location:login.php');}
    ?>
    <!-- Left Sidebar End -->

    <?php

    $query='SELECT p.id, p.title, p.price,p.trade_price,p.image,p.sku,ci.product_sizes_id,ci.quantity, ci.quantity * p.trade_price AS subtotal  
    FROM cart_items ci  
    LEFT JOIN products p 
    ON ci.product_id = p.id'; 

    $stmt=$db_con->prepare( $query );
    $stmt->execute();


    //$newResult = $stmt->fetchall(PDO::FETCH_ASSOC);
    //echo '<pre>';
    // print_r($newResult);exit;
    //$name = $_SESSION['name'];
    // count number of rows returned
    $num=$stmt->rowCount();

   // $compcode = "RDX";
    //$invoiceNo = $compcode.date('y').str_pad($runningnumber, 2, "0", STR_PAD_LEFT);

    $itext = "RDX";
    $inum  = rand(1000,10000);
    $invoiceNo = $itext.$inum;
    $todayDate = date('Y-m-d');

    //$name  = $_SESSION['name'];
    //$email = $_SESSION['email'];
    $idCustomer = $_SESSION['customer_id'];
    //$currID = $_SESSION['currID'];

    $cusDetails = $db_con->prepare("SELECT * FROM customers WHERE id = :id");
     $cusDetails->execute(array(":id"=>$idCustomer));
     $resultsCust = $cusDetails->fetch(PDO::FETCH_ASSOC);
     $name  = $resultsCust['first_name'];
     $email = $resultsCust['email'];
   // echo $cuEmailAddress['email'];exit;



    $cusCurrency = $db_con->prepare("SELECT * FROM customer_currency WHERE id = :id");
    $cusCurrency->execute(array(":id"=>$resultsCust['currency_id']));
    $cusResult = $cusCurrency->fetch(PDO::FETCH_ASSOC);

   

    ?>


    <?php
    $message = "
    <html xmlns='http://www.w3.org/1999/xhtml'>
    <head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='format-detection' content='telephone=no'>
    <title>Full Screen</title>
    <style>
    table {
    mso-table-lspace: 0pt;
    mso-table-rspace: 0pt;
    }
    td, th {
    border-collapse: collapse;
    }
    a {
    text-decoration: none;
    }
    .AnnouncementTD {
    color: #425065;
    font-family: sans-serif;
    font-size: 18px;
    text-align: right;
    line-height: 150%;
    font-weight: bold;
    letter-spacing: 2px;
    }
    .AnnouncementTD a {
    color: #425065;
    }
    .header2TD, .header5TD {
    color: #425065;
    font-family: sans-serif;
    font-size: 18px;
    text-align: center;
    line-height: 27px;
    font-weight: bold;
    }
    .header2TD {
    font-size: 14px;
    font-weight: lighter;
    text-align: left;
    line-height: 19px;
    }
    .header5TD {
    color: #ffffff;
    font-size: 15px;
    font-weight: bold;
    text-align: center;
    }
    .header2TD a {
    color: #425065;
    font-weight: bold;
    }
    .header5TD a {
    color: #ffffff;
    }
    .RegularTextTD, .RegularText4TD, .RegularText5TD {
    color: #727e8d;
    font-family: sans-serif;
    font-size: 13px;
    font-weight: lighter;
    text-align: left;
    line-height: 23px;
    }
    .RegularTextTD a {
    color: #67bffd;
    font-weight: bold;
    }
    .RegularText4TD {
    color: #425065;
    font-size: 14px;
    font-weight: bold;
    text-align: left;
    }
    .RegularText4TD a {
    color: #425065;
    }
    .RegularText5TD {
    color: #425065;
    font-size: 14px;
    text-align: center;
    }
    .RegularText5TD a {
    color: #67bffd;
    font-weight: bold;
    }
    td a img {
    text-decoration: none;
    border: none;
    }
    .companyAddressTD {
    color: #67bffd;
    font-family: sans-serif;
    font-size: 13px;
    text-align: center;
    font-weight: bold;
    line-height: 190%;
    }
    .companyAddressTD a {
    color: #67bffd;
    font-weight: bold;
    }
    .mailingOptionsTD {
    color: #aab1bd;
    font-family: sans-serif;
    font-size: 12px;
    text-align: center;
    line-height: 170%;
    }
    .mailingOptionsTD a {
    color: #ffffff;
    font-weight: bold;
    }
    .ReadMsgBody {
    width: 100%;
    }
    .ExternalClass {
    width: 100%;
    }
    body {
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
    -webkit-font-smoothing: antialiased;
    margin: 0 !important;
    padding: 0 !important;
    min-width: 100% !important;
    }
    @media only screen and (max-width: 479px) {
    body {
    min-width: 100% !important;
    }
    th[class=stack] {
    display: block !important;
    width: 300px !important;
    border-left: 0 !important;
    height: auto !important;
    }
    table[class=table600Logo] {
    width: 300px !important;
    }
    table[class=centerize] {
    margin: 0 auto 0 auto !important;
    border-bottom-width: 2px !important;
    border-bottom-style: solid !important;
    }
    table[class=table600Menu] {
    width: 300px !important;
    }
    table[class=table600Menu] td {
    height: 20px !important;
    }
    td[class=AnnouncementTD] {
    width: 300px !important;
    text-align: center !important;
    font-size: 17px !important;
    }
    td[class=table600st] {
    width: 300px !important;
    min-width: 300px !important;
    height: 20px !important;
    }
    td[class=header2TD] {
    height: 0 !important;
    font-size: 12px !important;
    }
    td[class=header5TD] {
    font-size: 12px !important;
    font-weight: lighter !important;
    }
    table[class=table600] {
    width: 300px !important;
    }
    table[class=table6003] {
    width: 300px !important;
    border-bottom-style: solid !important;
    border-bottom-width: 1px !important;
    }
    table[class=table600Min] {
    width: 300px !important;
    min-width: 300px !important;
    }
    td[class=wz] {
    height: 10px !important;
    }
    td[class=wz2] {
    width: 10px !important;
    height: 10px !important;
    }
    td[class=RegularTextTD] {
    width: 240px !important;
    height: 0 !important;
    }
    td[class=RegularText5TD] {
    font-size: 13px !important;
    }
    td[class=esFrMb] {
    width: 0 !important;
    height: 0 !important;
    display: none !important;
    }
    table[class=tableTxt] {
    width: 240px !important;
    }
    td[class=vrtclAlgn] {
    height: 30px !important;
    }
    td[class=va2] {
    height: 20px !important;
    }
    th[class=stack2] {
    width: 100px !important;
    }
    table[class=table60032] {
    width: 98px !important;
    }
    th[class=stack3] {
    width: 66px !important;
    }
    table[class=table60033] {
    width: 64px !important;
    }
    th[class=stack4] {
    width: 166px !important;
    }
    table[class=table60034] {
    width: 164px !important;
    }
    td[class=TDtable60034] {
    width: 162px !important;
    }
    td[class=RegularText4TD] {
    font-size: 13px !important;
    font-weight: lighter !important;
    }
    }
    </style>
    </head>



    <body marginwidth='0' marginheight='0' style='margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;' offset='0' topmargin='0' leftmargin='0'>
    <table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#3b485b' data-bgcolor='TemplateBGColor' style='table-layout:fixed;margin:0 auto;' data-module='TopLogoModule' data-thumb='http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-1.jpg' class=''>
    <tbody>
    <tr>
    <td align='center'><table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' style='table-layout:fixed;margin:0 auto;'>
    <tbody>
    <tr>
    <td align='center'><table width='668' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' class='table600Min' style='table-layout:fixed;margin:0 auto;min-width:668px;'>
    <tbody>
    <tr>
    <td align='center' height='30' class='table600st' style='min-width:668px;'></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table>
    <table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' style='table-layout:fixed;margin:0 auto;'>
    <tbody>
    <tr>
    <td align='center'><table width='668' align='center' cellpadding='0' cellspacing='0' border='0' class='table600Min' bgcolor='#384855' data-bgcolor='TemplateBGColor' style='table-layout:fixed;margin:0 auto;min-width:668px;'>
    <tbody>
    <tr>
    <td align='center' class='table600st' style='min-width:668px;'><table width='629' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#fdfdfd' data-bgcolor='CredentialsBGColor' class='table600' data-border-bottom-color='borderColor' style='border-bottom:1px solid #dde5f1; border-radius:6px 6px 0 0;'>
    <tbody>
    <tr>
    <td width='629' class='table600st' align='left' style='min-width:629px;'><table width='260' align='left' cellpadding='0' cellspacing='0' border='0' class='table600Logo'>
    <tbody>
    <tr>
    <td><table cellpadding='0' cellspacing='0' border='0' class='centerize' data-border-bottom-color='LogoDivider-OnMobile' style='border-bottom-color:#67bffd; margin-left:0;'>
    <tbody>
    <tr>
    <td width='30' class='esFrMb'></td>
    <td align='center' style='line-height:1px;padding-top:30px;'><a href='#' target='_blank' style='text-decoration: none;'><img src='http://trade.thefitness.co.uk/assets/images/logonew.png' style='display: block;text-decoration: none;border: none;' alt='Logo Image' border='0' align='top' hspace='0' vspace='0'></a></td>
    <td width='30' class='esFrMb'></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table>
    <table width='348' align='right' cellpadding='0' cellspacing='0' border='0' class='table600Menu'>
    <tbody>
    <tr>
    <td colspan='2' height='10' style='font-size:0;line-height:0;'>&nbsp;</td>
    </tr>
    <tr>
    <td width='318' valign='middle' align='right' height='80' class='AnnouncementTD' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='AnnouncementLink' data-color='AnnouncementTXT' style='color: #425065;font-family: sans-serif;font-size: 18px;text-align: right;line-height: 150%;font-weight: bold;letter-spacing: 2px;'><a href='#' target='_blank' style='text-decoration: none;color: #425065;' data-color='AnnouncementLink'></a>INVOICE</td>
    <td width='30' class='esFrMb'></td>
    </tr>
    <tr>
    <td colspan='2' height='10' style='font-size:0;line-height:0;'>&nbsp;</td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table>
    <table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' style='table-layout:fixed;margin:0 auto;' data-module='WelcomeTextModule' data-thumb='http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-2.jpg' class=''>
    <tbody>
    <tr>
    <td align='center'><table width='668' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' class='table600Min' style='table-layout:fixed;margin:0 auto;min-width:668px;'>
    <tbody>
    <tr>
    <td align='center' class='table600st' style='min-width:668px;'><table width='629' bgcolor='#fdfdfd' data-bgcolor='CredentialsBGColor' align='center' cellpadding='0' cellspacing='0' border='0' class='table600Min' style='min-width:629px;'>
    <tbody>
    <tr>
    <td class='table600st' style='min-width:629px;'>
    <table width='629' align='left' cellpadding='0' cellspacing='0' border='0' class='table600' data-border-bottom-color='borderColor' style='border-bottom:1px solid #dde5f1;'>
    <tbody>
    <tr>
    <td align='center'><table cellpadding='0' cellspacing='0' border='0'>
    <tbody>
    <tr>
    <td align='center'><table width='629' cellpadding='0' cellspacing='0' border='0' class='table600'>
    <tbody>
    <tr>
    <td colspan='3' height='25' style='font-size:0;line-height:0;' class='vrtclAlgn2'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz'></td>
    <td class='RegularTextTD' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='RegularLink' data-color='RegularTXT' style='color: #727e8d;font-family: sans-serif;font-size: 13px;font-weight: lighter;text-align: left;line-height: 23px;'>Dear {$name},<br>
    Thanks for your order earlier.
    <p>
    Please bear with us and our representative will get back to you with a final invoice with payment details shortly.
    </p>
    <p>
    Please be noted that our trade hours are Monday to Friday, 9:00AM - 5:00PM UTC.
    </p>
    </td>
    <td width='30' class='wz'></td>
    </tr>
    <tr>
    <td colspan='3' height='25' style='font-size:0;line-height:0;' class='vrtclAlgn'>&nbsp;</td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table>
    <table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' style='table-layout:fixed;margin:0 auto;' data-module='InvoiceCredentialsModule-2COL' data-thumb='http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-3.jpg' class=''>
    <tbody>
    <tr>
    <td align='center'><table width='668' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' class='table600Min' style='table-layout:fixed;margin:0 auto;min-width:668px;'>
    <tbody>
    <tr>
    <td align='center' class='table600st' style='min-width:668px;'><table width='629' align='center' cellpadding='0' cellspacing='0' border='0' class='table600Min' style='min-width:628px;'>
    <tbody>
    <tr>
    <td class='table600st' style='min-width:628px;'><table width='629' bgcolor='#fdfdfd' data-bgcolor='CredentialsBGColor' align='left' cellpadding='0' cellspacing='0' border='0' class='table600'>
    <tbody>
    <tr>
    <td><table align='center' cellpadding='0' cellspacing='0' bgcolor='#fdfdfd' data-bgcolor='CredentialsBGColor' border='0'>
    <tbody>
    <tr>
    <th width='314' class='stack' style='margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;' data-border-bottom-color='borderColor'> <table width='314' align='center' cellpadding='0' cellspacing='0' border='0' class='table600'>
    <tbody>
    <tr>
    <td colspan='3' height='25' style='font-size:0;line-height:0;'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz'></td>
    <td valign='top' align='center'><table width='252' align='left' cellpadding='0' cellspacing='0' border='0' class='tableTxt'>
    <tbody>
    <tr>
    <td rowspan='2' width='25' align='center' valign='top' style='line-height:1px;'><img src='http://www.emailtemplatebuilders.com/INVOICE-Generator/pictures/invoice-icon-20x20.png' style='display:block;' alt='IMG' border='0' hspace='0' vspace='0'></td>
    <td rowspan='2' width='14' style='font-size:0;line-height:0;'>&nbsp;</td>
    <td width='211' valign='top' class='header2TD' align='left' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='SectionCaptionLink' data-color='SectionCaptionTXT' style='color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;'><a href='#' target='_blank' style='text-decoration: none;color: #67bffd;font-weight: bold;' data-color='SectionCaptionLink'></a>Invoice Sent To</td>
    </tr>
    <tr>
    <td width='179' valign='top' class='RegularText4TD' align='left' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='SectionInfoLink' data-color='SectionInfoTXT' style='color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 23px;'><a href='#' target='_blank' style='text-decoration: none;color: #67bffd;font-weight: bold;' data-color='SectionInfoLink'></a>{$name}</td>
    </tr>
    <tr>
    <td colspan='3' height='10' style='font-size:0;line-height:0;'>&nbsp;</td>
    </tr>
    <tr>
    <td colspan='3' class='RegularTextTD' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='RegularLink' data-color='RegularTXT' style='color: #727e8d;font-family: sans-serif;font-size: 13px;font-weight: lighter;text-align: left;line-height: 23px;'>
    <a href='#' target='_blank' style='text-decoration: none;color: #67bffd;font-weight: bold;' data-color='RegularLink'>{$email}</a></td>
    </tr>
    <tr>
    <td colspan='3' height='25' style='font-size:0;line-height:0;'>&nbsp;</td>
    </tr>
    </tbody>
    </table></td>
    <td width='30' class='wz'></td>
    </tr>
    </tbody>
    </table>
    </th>
    <th width='314' class='stack' valign='top' data-border-left-color='borderColor' data-border-bottom-color='borderColor' style='border-left:1px solid #dde5f1;border-bottom:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;'> <table width='314' align='center' cellpadding='0' cellspacing='0' border='0' class='table600'>
    <tbody>
    <tr>
    <td colspan='3' height='25' style='font-size:0;line-height:0;'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz'></td>
    <td valign='top' align='center'><table width='252' align='left' cellpadding='0' cellspacing='0' border='0' class='tableTxt'>
    <tbody>
    <tr>
    <td rowspan='2' width='25' align='center' valign='top' style='line-height:1px;'><img src='http://www.emailtemplatebuilders.com/INVOICE-Generator/pictures/home-icon-20x20.png' style='display:block;' alt='IMG' border='0' hspace='0' vspace='0'></td>
    <td rowspan='2' width='14' style='font-size:0;line-height:0;'>&nbsp;</td>
    <td width='211' valign='top' class='header2TD' align='left' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='SectionCaptionLink' data-color='SectionCaptionTXT' style='color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;'><a href='#' target='_blank' style='text-decoration: none;color: #67bffd;font-weight: bold;' data-color='SectionCaptionLink'></a>Invoice Sent From</td>
    </tr>
    <tr>
    <td width='179' valign='top' class='RegularText4TD' align='left' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='SectionInfoLink' data-color='SectionInfoTXT' style='color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 23px;'><a href='#' target='_blank' style='text-decoration: none;color: #67bffd;font-weight: bold;' data-color='SectionInfoLink'></a>RDX SPORTS</td>
    </tr>
    <tr>
    <td colspan='3' height='10' style='font-size:0;line-height:0;'>&nbsp;</td>
    </tr>
    <tr>
    <td colspan='3' class='RegularTextTD' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='RegularLink' data-color='RegularTXT' style='color: #727e8d;font-family: sans-serif;font-size: 13px;font-weight: lighter;text-align: left;line-height: 23px;'>Unit B3, Fernhill Mill Hornby St, <br> Bury BL9 5BL United Kingdom<br> 
    <a href='#' target='_blank' style='text-decoration: none;color: #67bffd;font-weight: bold;' data-color='RegularLink'>trade@rdxsports.com</a></td>
    </tr>
    <tr>
    <td colspan='3' height='25' style='font-size:0;line-height:0;'>&nbsp;</td>
    </tr>
    </tbody>
    </table></td>
    <td width='30' class='wz'></td>
    </tr>
    </tbody>
    </table>
    </th>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table>
        <table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' style='table-layout:fixed;margin:0 auto;' data-module='MainInvoiceCaptionsModule' data-thumb='http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-5.jpg' class=''>
    <tbody>
    <tr>
    <td align='center'><table width='668' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' class='table600Min' style='table-layout:fixed;margin:0 auto;min-width:668px;'>
    <tbody>
    <tr>
    <td align='center' class='table600st' style='min-width:668px;'><table width='629' align='center' cellpadding='0' cellspacing='0' border='0' class='table600Min' style='min-width:629px;'>
    <tbody>
    <tr>
    <td class='table600st' style='min-width:629px;'><table width='629' align='left' cellpadding='0' cellspacing='0' bgcolor='#67bffd' data-bgcolor='ThemeColorBG' border='0' class='table600'>
    <tbody>
    <tr>
    <td align='left'>



    <table align='center' cellpadding='0' cellspacing='0' border='0'>
    <tbody>
    <tr>
    <th width='209' class='stack2' style='margin:0; padding:0;vertical-align:top;border-bottom-color:#dde5f1;' data-border-bottom-color='borderColor'> <table width='209' align='center' cellpadding='0' cellspacing='0' border='0' class='table60032'>
    <tbody>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz2'></td>
    <td class='header5TD' data-link-style='text-decoration:none; color:#ffffff;' data-link-color='InvoiceCaptionsLink' data-color='InvoiceCaptionsTXT' style='color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;'><a href='#' target='_blank' data-color='InvoiceCaptionsLink' style='text-decoration: none;color: #ffffff;'></a>Product Name</td>
    <td width='30' class='wz2'></td>
    </tr>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </th>
    <th width='139' class='stack3' data-border-left-color='borderColor' data-border-bottom-color='borderColor' style='border-left:1px solid #dde5f1;border-bottom-color:#dde5f1;margin:0; padding:0;vertical-align:top;'> <table width='139' align='center' cellpadding='0' cellspacing='0' border='0' class='table60033'>
    <tbody>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz2'></td>
    <td class='header5TD' data-link-style='text-decoration:none; color:#ffffff;' data-link-color='InvoiceCaptionsLink' data-color='InvoiceCaptionsTXT' style='color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;'><a href='#' target='_blank' data-color='InvoiceCaptionsLink' style='text-decoration: none;color: #ffffff;'></a>Price</td>
    <td width='30' class='wz2'></td>
    </tr>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </th>
    <th width='139' class='stack3' data-border-left-color='borderColor' data-border-bottom-color='borderColor' style='border-left:1px solid #dde5f1;border-bottom-color:#dde5f1;margin:0; padding:0;vertical-align:top;'> <table width='139' align='center' cellpadding='0' cellspacing='0' border='0' class='table60033'>
    <tbody>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz2'></td>
    <td class='header5TD' data-link-style='text-decoration:none; color:#ffffff;' data-link-color='InvoiceCaptionsLink' data-color='InvoiceCaptionsTXT' style='color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;'><a href='#' target='_blank' data-color='InvoiceCaptionsLink' style='text-decoration: none;color: #ffffff;'></a>Quantity</td>
    <td width='30' class='wz2'></td>
    </tr>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </th>
    <th width='139' class='stack3' data-border-left-color='borderColor' data-border-bottom-color='borderColor' style='border-left:1px solid #dde5f1;border-bottom-color:#dde5f1;margin:0; padding:0;vertical-align:top;'> <table width='139' align='center' cellpadding='0' cellspacing='0' border='0' class='table60033'>
    <tbody>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz2'></td>
    <td class='header5TD' data-link-style='text-decoration:none; color:#ffffff;' data-link-color='InvoiceCaptionsLink' data-color='InvoiceCaptionsTXT' style='color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;'><a href='#' target='_blank' data-color='InvoiceCaptionsLink' style='text-decoration: none;color: #ffffff;'></a>Total</td>
    <td width='30' class='wz2'></td>
    </tr>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </th>
    </tr>
    </tbody>
    </table>



    </td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table>
    <table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' style='table-layout:fixed;margin:0 auto;' data-module='InvoiceItemDetailsModule' data-thumb='http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-6.jpg' class=''>
    <tbody>
    <tr>
    <td align='center'><table width='668' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' class='table600Min' style='table-layout:fixed;margin:0 auto;min-width:668px;'>
    <tbody>
    <tr>
    <td align='center' class='table600st' style='min-width:668px;'><table width='629' align='center' cellpadding='0' cellspacing='0' border='0' class='table600Min' style='min-width:629px;'>
    <tbody>
    <tr>
    <td class='table600st' style='min-width:629px;'><table width='629' align='left' cellpadding='0' cellspacing='0' bgcolor='#eff3f7' data-bgcolor='CalculationsBGColor' border='0' class='table600'>
    <tbody>
    <tr>
    <td align='left'>


    ";
    $total=0;
    $productID;
    $totalQuantity=0;
    $product_sizes_id;

    while( $row = $stmt->fetch(PDO::FETCH_ASSOC)){

    extract($row);

    $product_sizes_id = $product_sizes_id;

    $cuCurrencyTitle =  $cusResult['currency'];
    $cuCurrencyd  =  $cusResult['id'];
    $cuCurrencyValue =  $cusResult['value'];

    // $cuCurrencyTitle = strtoupper($cusResult['currency']);
    // $cuCurrencyValue = $cusResult['value'];

    if(!empty($cuCurrencyValue) && !empty($cuCurrencyTitle))
    {

    $newPrice = round($trade_price*$cuCurrencyValue,2);
    $newSubtotal = round($subtotal*$cuCurrencyValue,2);

}

    else{

        $newPrice = round($trade_price,2);
        $newSubtotal = round($subtotal,2);
        $cuCurrencyTitle = "$";


    }

     
    $message .= "



    <table align='center' cellpadding='0' cellspacing='0' border='0'>
    <tbody>
    <tr>
    <th width='209' class='stack2' style='margin:0; padding:0;border-bottom:1px solid #dde5f1;' data-border-bottom-color='borderColor'> <table width='209' align='center' cellpadding='0' cellspacing='0' border='0' class='table60032'>
    <tbody>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz2'></td>
    <td class='header2TD' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='RegularLink' data-color='RegularTXT' style='color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;'><a href='#' target='_blank' data-color='RegularLink' style='text-decoration: none;color: #67bffd;'></a>{$title}</td>
    <td width='30' class='wz2'></td>
    </tr>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </th>
    <th width='139' class='stack3' data-border-left-color='borderColor' data-border-bottom-color='borderColor' style='border-left:1px solid #dde5f1;border-bottom:1px solid #dde5f1;margin:0; padding:0;'> <table width='139' align='center' cellpadding='0' cellspacing='0' border='0' class='table60033'>
    <tbody>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz2'></td>
    <td class='RegularText5TD' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='RegularLink' data-color='RegularTXT' style='color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;'><a href='#' target='_blank' data-color='RegularLink' style='text-decoration: none;color: #67bffd;'></a>{$cuCurrencyTitle} {$newPrice}</td>
    <td width='30' class='wz2'></td>
    </tr>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </th>
    <th width='139' class='stack3' data-border-left-color='borderColor' data-border-bottom-color='borderColor' style='border-left:1px solid #dde5f1;border-bottom:1px solid #dde5f1;margin:0; padding:0;'> <table width='139' align='center' cellpadding='0' cellspacing='0' border='0' class='table60033'>
    <tbody>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz2'></td>
    <td class='RegularText5TD' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='RegularLink' data-color='RegularTXT' style='color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;'><a href='#' target='_blank' data-color='RegularLink' style='text-decoration: none;color: #67bffd;'></a>{$quantity}</td>
    <td width='30' class='wz2'></td>
    </tr>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </th>
    <th width='139' class='stack3' data-border-left-color='borderColor' data-border-bottom-color='borderColor' style='border-left:1px solid #dde5f1;border-bottom:1px solid #dde5f1;margin:0; padding:0;'> <table width='139' align='center' cellpadding='0' cellspacing='0' border='0' class='table60033'>
    <tbody>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz2'></td>
    <td class='RegularText5TD' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='RegularLink' data-color='RegularTXT' style='color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;'><a href='#' target='_blank' data-color='RegularLink' style='text-decoration: none;color: #67bffd;'></a>{$cuCurrencyTitle} {$newSubtotal}</td>
    <td width='30' class='wz2'></td>
    </tr>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </th>
    </tr>
    </tbody>
    </table>
    ";   
    $total += $newSubtotal; 
    $totalQuantity += $quantity;
    $productID = $id;
    
    // $insertInvoices = $db_con->prepare("INSERT INTO invoices (product_id,customer_id,amount,quantity,status,created_date,modified_date) VALUES (:product_id,:customer_id,:amount,:quantity,:status,:created_date,:modified_date)")
    // $insertInvoices->execute(array(":product_id"=>$id,":customer_id"=>$_SESSION['customer_id'],":amount"=>$subtotal,":quantity"=>$quantity,":status"=>'pending',":created_date"=>$created_date,":modified_date"=>$modified_date)); 

    // $orderStmt = $db_con->prepare("INSERT INTO orders (product_id,customer_id,quantity,sku,amount,tax,status,created_date,modified_date) VALUES (:product_id,:customer_id,:quantity,:sku,:amount,:tax,:status,:created_date,:modified_date) ")
    // $orderStmt->execute(array(":product_id"=>$id,":customer_id"=>$_SESSION['customer_id'],":quantity"=>$quantity,":sku"=>$sku,":amount"=>$subtotal,":tax"=>'',":status"=>'Pending',":created_date"=>$created_date,":modified_date"=>$modified_date)); 


    

    $created_date  = date("Y-m-d H:i:s");
    $modified_date = date("Y-m-d H:i:s");

    //$stmtnew = $db_con->prepare("INSERT INTO invoices (product_id,customer_id,amount,quantity,status,created_date,modified_date) VALUES(:product_id,:customer_id,:amount,:quantity,:status,:created_date,:modified_date)");
    //$stmtnew->execute(array(":product_id"=>$id,":customer_id"=>$_SESSION['customer_id'],":amount"=>$subtotal,":quantity"=>$quantity,":status"=>'pending',":created_date"=>$created_date,":modified_date"=>$modified_date));
     
    
    $stmtnew1 = $db_con->prepare("INSERT INTO orders (product_id,customer_id,product_sizes_id,currency_id,quantity,sku,amount,tax,status,invoice_no,created_date,modified_date) VALUES(:product_id,:customer_id,:product_sizes_id,:currency_id,:quantity,:sku,:amount,:tax,:status,:invoice_no,:created_date,:modified_date)");
    $stmtnew1->execute(array(":product_id"=>$id,":customer_id"=>$_SESSION['customer_id'],":product_sizes_id"=>$product_sizes_id,":currency_id"=>$cusResult['id'],":quantity"=>$quantity,":sku"=>$sku,":amount"=>$subtotal,":tax"=>'',":status"=>'Pending',":invoice_no"=>$invoiceNo,":created_date"=>$created_date,":modified_date"=>$modified_date));
 
}
    
    $created_date  = date("Y-m-d H:i:s");
    $modified_date = date("Y-m-d H:i:s");

    $orderDetail = $db_con->prepare("INSERT INTO order_detail (product_id,customer_id,product_sizes_id,currency_id,total_quantity,total_price,invoice_no,created_date,modified_date) VALUES(:product_id,:customer_id,:product_sizes_id,:currency_id,:total_quantity,:total_price,:invoice_no,:created_date,:modified_date)");
    $orderDetail->execute(array(":product_id"=>$productID,":customer_id"=>$_SESSION['customer_id'],":product_sizes_id"=>$product_sizes_id,":currency_id"=>$cusResult['id'],":total_quantity"=>$totalQuantity,":total_price"=>$total,":invoice_no"=>$invoiceNo,":created_date"=>$created_date,":modified_date"=>$modified_date));

    $message .= "

    </td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table>
    <table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' style='table-layout:fixed;margin:0 auto;' data-module='FinalCalculationsModule-4ROWS' data-thumb='http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-8.jpg' class=''>
    <tbody>
    <tr>
    <td align='center'><table width='668' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' class='table600Min' style='table-layout:fixed;margin:0 auto;min-width:668px;'>
    <tbody>
    <tr>
    <td align='center' class='table600st' style='min-width:668px;'><table width='629' align='center' cellpadding='0' cellspacing='0' border='0' class='table600Min' style='min-width:629px;'>
    <tbody>
    <tr>
    <td class='table600st' style='min-width:629px;'><table width='629' align='left' cellpadding='0' cellspacing='0' bgcolor='#eff3f7' data-bgcolor='CalculationsBGColor' border='0' class='table600'>
    <tbody>
    <tr>
    <td align='left'>
    <table align='center' cellpadding='0' cellspacing='0' border='0'>
    <tbody>

    <tr>
    <th width='139' class='stack3' bgcolor='#67bffd' data-bgcolor='ThemeColorBG' valign='top' data-border-bottom-color='borderColor' data-border-left-color='borderColor' style='border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;'> <table width='139' align='center' cellpadding='0' cellspacing='0' border='0' class='table60033'>
    <tbody>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz2'></td>
    <td bgcolor='#67bffd' data-bgcolor='ThemeColorBG' class='header5TD' data-link-style='text-decoration:none; color:#ffffff;' data-link-color='InvoiceCaptionsLink' data-color='InvoiceCaptionsTXT' style='color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;'><a href='#' target='_blank' data-color='InvoiceCaptionsLink' style='text-decoration: none;color: #ffffff;'></a>Total</td>
    <td width='30' class='wz2'></td>
    </tr>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </th>
    <th width='139' class='stack3' bgcolor='#67bffd' data-bgcolor='ThemeColorBG' valign='top' data-border-bottom-color='borderColor' data-border-left-color='borderColor' style='border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;'> <table width='139' align='center' cellpadding='0' cellspacing='0' border='0' class='table60033'>
    <tbody>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz2'></td>
    <td bgcolor='#67bffd' data-bgcolor='ThemeColorBG' class='header5TD' data-link-style='text-decoration:none; color:#ffffff;' data-link-color='InvoiceCaptionsLink' data-color='InvoiceCaptionsTXT' style='color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;'><a href='#' target='_blank' data-color='InvoiceCaptionsLink' style='text-decoration: none;color: #ffffff;'></a>

    ";

    //$total += $subtotal;
    $message .= "

    {$cuCurrencyTitle} {$total}
    </td>
    <td width='30' class='wz2'></td>
    </tr>
    <tr>
    <td colspan='3' height='20' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    </tbody>
    </table>
    </th>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table>
  <table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' style='table-layout:fixed;margin:0 auto;' data-module='InvoiceCredentialsModule-3COL' data-thumb='http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-4.jpg' class=''>
    <tbody>
    <tr>
    <td align='center'><table width='668' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' class='table600Min' style='table-layout:fixed;margin:0 auto;min-width:668px;'>
    <tbody>
    <tr>
    <td align='center' class='table600st' style='min-width:668px;'><table width='629' align='center' cellpadding='0' cellspacing='0' border='0' class='table600Min' style='min-width:629px;'>
    <tbody>
    <tr>
    <td class='table600st' style='min-width:629px;'><table width='629' bgcolor='#fdfdfd' data-bgcolor='CredentialsBGColor' align='left' cellpadding='0' cellspacing='0' border='0' class='table600'>
    <tbody>
    <tr>
    <td align='left'>
    <table align='center' bgcolor='#fdfdfd' data-bgcolor='CredentialsBGColor' cellpadding='0' cellspacing='0' border='0'>
    <tbody>
    <tr>
    <th width='209' class='stack' style='margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;' data-border-bottom-color='borderColor'> <table width='209' align='center' cellpadding='0' cellspacing='0' border='0' class='table600'>
    <tbody>
    <tr>
    <td colspan='3' height='25' style='font-size:0;line-height:0;'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz'></td>
    <td valign='top' align='center'><table width='145' align='left' cellpadding='0' cellspacing='0' border='0' class='tableTxt'>
    <tbody>
    <tr>
    <td rowspan='2' width='25' align='center' valign='top' style='line-height:1px;'><img src='http://www.emailtemplatebuilders.com/INVOICE-Generator/pictures/number-icon-20x20.png' style='display:block;' alt='IMG' border='0' hspace='0' vspace='0'></td>
    <td rowspan='2' width='14' style='font-size:0;line-height:0;'>&nbsp;</td>
    <td valign='top' class='header2TD' align='left' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='SectionCaptionLink' data-color='SectionCaptionTXT' style='color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;'><a href='#' target='_blank' style='text-decoration: none;color: #67bffd;font-weight: bold;' data-color='SectionCaptionLink'></a>Invoice No</td>
    </tr>
    <tr>
    <td valign='top' class='RegularText4TD' align='left' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='SectionInfoLink' data-color='SectionInfoTXT' style='color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 23px;'><a href='#' target='_blank' style='text-decoration: none;color: #67bffd;font-weight: bold;' data-color='SectionInfoLink'></a>#{$invoiceNo}</td>
    </tr>
    <tr>
    <td colspan='3' height='25' style='font-size:0;line-height:0;'>&nbsp;</td>
    </tr>
    </tbody>
    </table></td>
    <td width='30' class='wz'></td>
    </tr>
    </tbody>
    </table>
    </th>
    <th width='209' class='stack' data-border-left-color='borderColor' data-border-bottom-color='borderColor' style='border-bottom:1px solid #dde5f1;border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;'> <table width='209' align='center' cellpadding='0' cellspacing='0' border='0' class='table600'>
    <tbody>
    <tr>
    <td colspan='3' height='25' style='font-size:0;line-height:0;'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz'></td>
    <td valign='top' align='center'><table width='145' align='left' cellpadding='0' cellspacing='0' border='0' class='tableTxt'>
    <tbody>
    <tr>
    <td rowspan='2' width='25' align='center' valign='top' style='line-height:1px;'><img src='http://www.emailtemplatebuilders.com/INVOICE-Generator/pictures/date-icon-20x20.png' style='display:block;' alt='IMG' border='0' hspace='0' vspace='0'></td>
    <td rowspan='2' width='14' style='font-size:0;line-height:0;'>&nbsp;</td>
    <td valign='top' class='header2TD' align='left' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='SectionCaptionLink' data-color='SectionCaptionTXT' style='color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;'><a href='#' target='_blank' style='text-decoration: none;color: #67bffd;font-weight: bold;' data-color='SectionCaptionLink'></a>Invoice Date</td>
    </tr>
    <tr>
    <td valign='top' class='RegularText4TD' align='left' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='SectionInfoLink' data-color='SectionInfoTXT' style='color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 23px;'><a href='#' target='_blank' style='text-decoration: none;color: #67bffd;font-weight: bold;' data-color='SectionInfoLink'></a>{$todayDate}</td>
    </tr>
    <tr>
    <td colspan='3' height='25' style='font-size:0;line-height:0;'>&nbsp;</td>
    </tr>
    </tbody>
    </table></td>
    <td width='30' class='wz'></td>
    </tr>
    </tbody>
    </table>
    </th>
    <th width='209' class='stack' data-border-left-color='borderColor' data-border-bottom-color='borderColor' style='border-bottom:1px solid #dde5f1;border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;'> <table width='209' align='center' cellpadding='0' cellspacing='0' border='0' class='table600'>
    <tbody>
    <tr>
    <td colspan='3' height='25' style='font-size:0;line-height:0;'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz'></td>
    <td valign='top' align='center'><table width='145' align='left' cellpadding='0' cellspacing='0' border='0' class='tableTxt'>
    <tbody>
    <tr>
    <td rowspan='2' width='25' align='center' valign='top' style='line-height:1px;'><img src='http://www.emailtemplatebuilders.com/INVOICE-Generator/pictures/dollar-icon-20x20.png' style='display:block;' alt='IMG' border='0' hspace='0' vspace='0'></td>
    <td rowspan='2' width='14' style='font-size:0;line-height:0;'>&nbsp;</td>
    <td valign='top' class='header2TD' align='left' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='SectionCaptionLink' data-color='SectionCaptionTXT' style='color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;'><a href='#' target='_blank' style='text-decoration: none;color: #67bffd;font-weight: bold;' data-color='SectionCaptionLink'></a>Invoice Total</td>
    </tr>
    <tr>
    <td valign='top' class='RegularText4TD' id='totalPrice' align='left' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='SectionInfoLink' data-color='SectionInfoTXT' style='color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 23px;'>
        {$cuCurrencyTitle} {$total}
    </td>
    </tr>
    <tr>
    <td colspan='3' height='25' style='font-size:0;line-height:0;'>&nbsp;</td>
    </tr>
    </tbody>
    </table></td>
    <td width='30' class='wz'></td>
    </tr>
    </tbody>
    </table>
    </th>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table>

    <table width='100%' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' style='table-layout:fixed;margin:0 auto;' data-module='FinalNotesModule' data-thumb='http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-9.jpg' class=''>
    <tbody>
    <tr>
    <td align='center'><table width='668' align='center' cellpadding='0' cellspacing='0' border='0' bgcolor='#384855' data-bgcolor='TemplateBGColor' class='table600Min' style='table-layout:fixed;margin:0 auto;min-width:668px;'>
    <tbody>
    <tr>
    <td align='center' class='table600st' style='min-width:668px;'><table width='629' align='center' cellpadding='0' cellspacing='0' border='0' class='table600Min' style='min-width:629px;'>
    <tbody>
    <tr>
    <td class='table600st' style='min-width:629px;'><table width='629' bgcolor='#fdfdfd' data-bgcolor='CredentialsBGColor' align='left' cellpadding='0' cellspacing='0' border='0' class='table600' style='border-radius:0 0 6px 6px;'>
    <tbody>
    <tr>
    <td>
    <table width='627' cellpadding='0' cellspacing='0' border='0' class='table600'>
    <tbody>
    <tr>
    <td colspan='3' height='25' style='font-size:0;line-height:0;' class='va2'>&nbsp;</td>
    </tr>
    <tr>
    <td width='30' class='wz'></td>
    <td class='RegularText5TD' data-link-style='text-decoration:none; color:#67bffd;' data-link-color='RegularLink' data-color='RegularTXT' style='color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;'>Payments should be made within 3 days with one of the options below, or you can enter any note here if necessary, you have much space:<br>
    <br>
    <b>Payment Methods:</b> Bank Transfer, PayPal<br>
    <b>We accept:</b> MasterCard, Visa, Debit and Credit Card<br>
    
    <br>
    <a href='#' target='_blank' style='text-decoration: none;color: #67bffd;font-weight: bold;' data-color='RegularLink'></a>E: trade@rdxsports.com<br>
    <a href='#' target='_blank' style='text-decoration: none;color: #67bffd;font-weight: bold;' data-color='RegularLink'></a>P: +44 (0) 161 660 8876</td>
    <td width='30' class='wz'></td>
    </tr>
    <tr>
    <td colspan='3' height='30' class='va2' style='font-size:0;line-height:0;'>&nbsp;</td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table></td>
    </tr>
    </tbody>
    </table>

    <div id='edit_link' class='hidden' style='display: none;'> 

    <!-- Close Link -->
    <div class='close_link'></div>

    <!-- Edit Link Value -->
    <input type='text' id='edit_link_value' class='createlink' placeholder='Your URL'>

    <!-- Change Image Wrapper-->
    <div id='change_image_wrapper'> 

    <!-- Change Image Tooltip -->
    <div id='change_image'> 

    <!-- Change Image Button -->
    <p id='change_image_button'>Change &nbsp; <span class='pixel_result'></span></p>
    </div>

    <!-- Change Image Link Button -->
    <input type='button' value='' id='change_image_link'>

    <!-- Remove Image -->
    <input type='button' value='' id='remove_image'>
    </div>

    <!-- Tooltip Bottom Arrow-->
    <div id='tip'></div>
    </div>
    </body>
    </html>
    ";


   

        $to = $email;
        $subject = 'Whole Sale Order';

       
         $to = "{$email}";
         $subject = 'Whole Sale Order';
         
         //$message = "<b>This is HTML message.</b>";
         //$message .= "<h1>This is headline.</h1>";
         $headers = 'To:'.$name  ."\r\n";
         $header .= 'From:RDX SPORT <trade@rdxsports.com>' ."\r\n";
         $header .= 'Cc:invoices@rdxsports.com' ."\r\n";
         $header .= 'MIME-Version: 1.0' ."\r\n";
         $header .= 'Content-type: text/html' ."\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            $removeData = $db_con->prepare("DELETE FROM cart_items WHERE customer_id = :id");
            $removeData->execute(array(":id"=>$idCustomer));
         }else {
            echo "Message could not be sent...";
         }

    // Mail it
   
    ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->                      

    <div class='content-page'>

    <!-- Start content -->

    <div class='content'>

    <div class='container'>



    <!-- Page-Title -->

    <div class='row'>

    <div class='col-sm-12'>

    <h4 class='page-title'>Order Confirmation</h4>

    <ol class='breadcrumb'>

    <li><a href='index.php'>Home</a></li>

    <li><a href='product.php'>Products</a></li>

    <li class='active'>Your Order</li>

    </ol>

    </div>

    </div>



    <div class='row'>

    <div class='col-lg-12'>

    <div class='card-box'>

    <h4 class='m-t-0 header-title'><b>Order Successful</b></h4>
    <p>Your order has been placed successfuly.Please check your email for the invoice.Our representative will contact you soon!</p>
    <p><b>Thanks for choosing RDX</b></p>
    <p><button type="submit" class="btn btn-primary" onclick="location.href='customer.php'">Back to products</button></p>

    </div>

    </div>
    </div>

    </div> <!-- container -->

    </div> <!-- content -->

    <!-- ========== Footer ========== -->

    <?php include_once('footer.php');?>

    <!-- Footer End -->

    </div>

    <!-- ============================================================== -->

    <!-- End Right content here -->

    <!-- ============================================================== -->
    </div>

    <!-- END wrapper -->

    <script>

    var resizefunc = [];


    </script>


    <!-- jQuery  -->

    <script src='assets/js/jquery.min.js'></script>

    <script src='assets/js/bootstrap.min.js'></script>

    <script src='assets/js/detect.js'></script>

    <script src='assets/js/fastclick.js'></script>

    <script src='assets/js/jquery.slimscroll.js'></script>

    <script src='assets/js/jquery.blockUI.js'></script>

    <script src='assets/js/waves.js'></script>

    <script src='assets/js/wow.min.js'></script>

    <script src='assets/js/jquery.nicescroll.js'></script>

    <script src='assets/js/jquery.scrollTo.min.js'></script>

    <script src='http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js' type='text/javascript'></script>

    <script src='assets/js/jquery.core.js'></script>

    <script src='assets/js/jquery.app.js'></script>

    <script type='text/javascript' src='assets/plugins/parsleyjs/dist/parsley.min.js'></script>

    <script type='text/javascript'>

    $(document).ready(function() {

    $('form').parsley();

    var totalAmount = "<?php echo $total;?>";
    var str         = "{$cuCurrencyTitle}" + totalAmount;

    $('#totalPrice').html(str);

    });

    </script>
    </body>
    </html>