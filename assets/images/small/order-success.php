<?php  
       include_once('header.php');require 'config.php';
       if(!isset($_SESSION['customer_id'])) {header('location:login.php');}
   ?>
      <!-- Left Sidebar End -->

      <?php

     $query="SELECT p.id, p.title, p.price,p.image, ci.id,ci.product_sizes_id,ci.quantity, ci.quantity * p.price AS subtotal  
            FROM cart_items ci  
                LEFT JOIN products p 
                    ON ci.product_id = p.id"; 
 
$stmt=$db_con->prepare( $query );
$stmt->execute();

// $newResult = $stmt->fetchall(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($newResult);exit;
 
// count number of rows returned
$num=$stmt->rowCount();?>


 <?php
$message = <<<EOD
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
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



<body marginwidth="0" marginheight="0" style="margin-top: 0; margin-bottom: 0; padding-top: 0; padding-bottom: 0; width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;" offset="0" topmargin="0" leftmargin="0">
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#3b485b" data-bgcolor="TemplateBGColor" style="table-layout:fixed;margin:0 auto;" data-module="TopLogoModule" data-thumb="http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-1.jpg" class="">
  <tbody>
    <tr>
      <td align="center"><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" style="table-layout:fixed;margin:0 auto;">
          <tbody>
            <tr>
              <td align="center"><table width="668" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" class="table600Min" style="table-layout:fixed;margin:0 auto;min-width:668px;">
                  <tbody>
                    <tr>
                      <td align="center" height="30" class="table600st" style="min-width:668px;"></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
          </tbody>
        </table>
        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" style="table-layout:fixed;margin:0 auto;">
          <tbody>
            <tr>
              <td align="center"><table width="668" align="center" cellpadding="0" cellspacing="0" border="0" class="table600Min" bgcolor="#384855" data-bgcolor="TemplateBGColor" style="table-layout:fixed;margin:0 auto;min-width:668px;">
                  <tbody>
                    <tr>
                      <td align="center" class="table600st" style="min-width:668px;"><table width="629" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#fdfdfd" data-bgcolor="CredentialsBGColor" class="table600" data-border-bottom-color="borderColor" style="border-bottom:1px solid #dde5f1; border-radius:6px 6px 0 0;">
                          <tbody>
                            <tr>
                              <td width="629" class="table600st" align="left" style="min-width:629px;"><table width="260" align="left" cellpadding="0" cellspacing="0" border="0" class="table600Logo">
                                  <tbody>
                                    <tr>
                                      <td><table cellpadding="0" cellspacing="0" border="0" class="centerize" data-border-bottom-color="LogoDivider-OnMobile" style="border-bottom-color:#67bffd; margin-left:0;">
                                          <tbody>
                                            <tr>
                                              <td width="30" class="esFrMb"></td>
                                              <td align="center" style="line-height:1px;padding-top:30px;"><a href="#" target="_blank" style="text-decoration: none;"><img src="images/logonew.png" style="display: block;text-decoration: none;border: none;" alt="Logo Image" border="0" align="top" hspace="0" vspace="0"></a></td>
                                              <td width="30" class="esFrMb"></td>
                                            </tr>
                                          </tbody>
                                        </table></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <table width="348" align="right" cellpadding="0" cellspacing="0" border="0" class="table600Menu">
                                  <tbody>
                                    <tr>
                                      <td colspan="2" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="318" valign="middle" align="right" height="80" class="AnnouncementTD" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="AnnouncementLink" data-color="AnnouncementTXT" style="color: #425065;font-family: sans-serif;font-size: 18px;text-align: right;line-height: 150%;font-weight: bold;letter-spacing: 2px;"><a href="#" target="_blank" style="text-decoration: none;color: #425065;" data-color="AnnouncementLink"></a>INVOICE</td>
                                      <td width="30" class="esFrMb"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
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
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" style="table-layout:fixed;margin:0 auto;" data-module="WelcomeTextModule" data-thumb="http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-2.jpg" class="">
  <tbody>
    <tr>
      <td align="center"><table width="668" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" class="table600Min" style="table-layout:fixed;margin:0 auto;min-width:668px;">
          <tbody>
            <tr>
              <td align="center" class="table600st" style="min-width:668px;"><table width="629" bgcolor="#fdfdfd" data-bgcolor="CredentialsBGColor" align="center" cellpadding="0" cellspacing="0" border="0" class="table600Min" style="min-width:629px;">
                  <tbody>
                    <tr>
                      <td class="table600st" style="min-width:629px;">
                      <table width="629" align="left" cellpadding="0" cellspacing="0" border="0" class="table600" data-border-bottom-color="borderColor" style="border-bottom:1px solid #dde5f1;">
                          <tbody>
                            <tr>
                              <td align="center"><table cellpadding="0" cellspacing="0" border="0">
                                  <tbody>
                                    <tr>
                                      <td align="center"><table width="629" cellpadding="0" cellspacing="0" border="0" class="table600">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="25" style="font-size:0;line-height:0;" class="vrtclAlgn2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz"></td>
                                              <td class="RegularTextTD" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #727e8d;font-family: sans-serif;font-size: 13px;font-weight: lighter;text-align: left;line-height: 23px;">Dear CustomerName,<br>
                                                Lorme ipsum is dummy text.Lorme ipsum is dummy text.Lorme ipsum is dummy text.Lorme ipsum is dummy text.Lorme ipsum is dummy text.Lorme ipsum is dummy text.Lorme ipsum is dummy text.Lorme ipsum is dummy text.Lorme ipsum is dummy text.Lorme ipsum is dummy text.Lorme ipsum is dummy text.Lorme ipsum is dummy text.</td>
                                              <td width="30" class="wz"></td>
                                            </tr>
                                            <tr>
                                              <td colspan="3" height="25" style="font-size:0;line-height:0;" class="vrtclAlgn">&nbsp;</td>
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
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" style="table-layout:fixed;margin:0 auto;" data-module="InvoiceCredentialsModule-2COL" data-thumb="http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-3.jpg" class="">
  <tbody>
    <tr>
      <td align="center"><table width="668" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" class="table600Min" style="table-layout:fixed;margin:0 auto;min-width:668px;">
          <tbody>
            <tr>
              <td align="center" class="table600st" style="min-width:668px;"><table width="629" align="center" cellpadding="0" cellspacing="0" border="0" class="table600Min" style="min-width:628px;">
                  <tbody>
                    <tr>
                      <td class="table600st" style="min-width:628px;"><table width="629" bgcolor="#fdfdfd" data-bgcolor="CredentialsBGColor" align="left" cellpadding="0" cellspacing="0" border="0" class="table600">
                          <tbody>
                            <tr>
                              <td><table align="center" cellpadding="0" cellspacing="0" bgcolor="#fdfdfd" data-bgcolor="CredentialsBGColor" border="0">
                                  <tbody>
                                    <tr>
                                      <th width="314" class="stack" style="margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;" data-border-bottom-color="borderColor"> <table width="314" align="center" cellpadding="0" cellspacing="0" border="0" class="table600">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="25" style="font-size:0;line-height:0;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz"></td>
                                              <td valign="top" align="center"><table width="252" align="left" cellpadding="0" cellspacing="0" border="0" class="tableTxt">
                                                  <tbody>
                                                    <tr>
                                                      <td rowspan="2" width="25" align="center" valign="top" style="line-height:1px;"><img src="http://www.emailtemplatebuilders.com/INVOICE-Generator/pictures/invoice-icon-20x20.png" style="display:block;" alt="IMG" border="0" hspace="0" vspace="0"></td>
                                                      <td rowspan="2" width="14" style="font-size:0;line-height:0;">&nbsp;</td>
                                                      <td width="211" valign="top" class="header2TD" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionCaptionLink" data-color="SectionCaptionTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;"><a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="SectionCaptionLink"></a>Invoice Sent To</td>
                                                    </tr>
                                                    <tr>
                                                      <td width="179" valign="top" class="RegularText4TD" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionInfoLink" data-color="SectionInfoTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 23px;"><a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="SectionInfoLink"></a>Mark Knopfler Scott</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="3" class="RegularTextTD" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #727e8d;font-family: sans-serif;font-size: 13px;font-weight: lighter;text-align: left;line-height: 23px;">P.O. Box 18728, Irvin Kershner Jedi Academy, DeLorean New York 12543<br>
                                                        <a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="RegularLink">knopfler@sultansofswing.com</a></td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="3" height="25" style="font-size:0;line-height:0;">&nbsp;</td>
                                                    </tr>
                                                  </tbody>
                                                </table></td>
                                              <td width="30" class="wz"></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </th>
                                      <th width="314" class="stack" valign="top" data-border-left-color="borderColor" data-border-bottom-color="borderColor" style="border-left:1px solid #dde5f1;border-bottom:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;"> <table width="314" align="center" cellpadding="0" cellspacing="0" border="0" class="table600">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="25" style="font-size:0;line-height:0;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz"></td>
                                              <td valign="top" align="center"><table width="252" align="left" cellpadding="0" cellspacing="0" border="0" class="tableTxt">
                                                  <tbody>
                                                    <tr>
                                                      <td rowspan="2" width="25" align="center" valign="top" style="line-height:1px;"><img src="http://www.emailtemplatebuilders.com/INVOICE-Generator/pictures/home-icon-20x20.png" style="display:block;" alt="IMG" border="0" hspace="0" vspace="0"></td>
                                                      <td rowspan="2" width="14" style="font-size:0;line-height:0;">&nbsp;</td>
                                                      <td width="211" valign="top" class="header2TD" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionCaptionLink" data-color="SectionCaptionTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;"><a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="SectionCaptionLink"></a>Invoice Sent From</td>
                                                    </tr>
                                                    <tr>
                                                      <td width="179" valign="top" class="RegularText4TD" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionInfoLink" data-color="SectionInfoTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 23px;"><a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="SectionInfoLink"></a>INVerator Company Inc.</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="3" height="10" style="font-size:0;line-height:0;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="3" class="RegularTextTD" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #727e8d;font-family: sans-serif;font-size: 13px;font-weight: lighter;text-align: left;line-height: 23px;">P.O. Box 25199, Gandalf The White Leadership Academy, Middle Earth 51652<br>
                                                        <a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="RegularLink">salessupport@inverator.com</a></td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="3" height="25" style="font-size:0;line-height:0;">&nbsp;</td>
                                                    </tr>
                                                  </tbody>
                                                </table></td>
                                              <td width="30" class="wz"></td>
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
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" style="table-layout:fixed;margin:0 auto;" data-module="InvoiceCredentialsModule-3COL" data-thumb="http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-4.jpg" class="">
  <tbody>
    <tr>
      <td align="center"><table width="668" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" class="table600Min" style="table-layout:fixed;margin:0 auto;min-width:668px;">
          <tbody>
            <tr>
              <td align="center" class="table600st" style="min-width:668px;"><table width="629" align="center" cellpadding="0" cellspacing="0" border="0" class="table600Min" style="min-width:629px;">
                  <tbody>
                    <tr>
                      <td class="table600st" style="min-width:629px;"><table width="629" bgcolor="#fdfdfd" data-bgcolor="CredentialsBGColor" align="left" cellpadding="0" cellspacing="0" border="0" class="table600">
                          <tbody>
                            <tr>
                              <td align="left">
                              <table align="center" bgcolor="#fdfdfd" data-bgcolor="CredentialsBGColor" cellpadding="0" cellspacing="0" border="0">
                                  <tbody>
                                    <tr>
                                      <th width="209" class="stack" style="margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;" data-border-bottom-color="borderColor"> <table width="209" align="center" cellpadding="0" cellspacing="0" border="0" class="table600">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="25" style="font-size:0;line-height:0;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz"></td>
                                              <td valign="top" align="center"><table width="145" align="left" cellpadding="0" cellspacing="0" border="0" class="tableTxt">
                                                  <tbody>
                                                    <tr>
                                                      <td rowspan="2" width="25" align="center" valign="top" style="line-height:1px;"><img src="http://www.emailtemplatebuilders.com/INVOICE-Generator/pictures/number-icon-20x20.png" style="display:block;" alt="IMG" border="0" hspace="0" vspace="0"></td>
                                                      <td rowspan="2" width="14" style="font-size:0;line-height:0;">&nbsp;</td>
                                                      <td valign="top" class="header2TD" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionCaptionLink" data-color="SectionCaptionTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;"><a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="SectionCaptionLink"></a>Invoice No</td>
                                                    </tr>
                                                    <tr>
                                                      <td valign="top" class="RegularText4TD" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionInfoLink" data-color="SectionInfoTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 23px;"><a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="SectionInfoLink"></a>#A-2821862</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="3" height="25" style="font-size:0;line-height:0;">&nbsp;</td>
                                                    </tr>
                                                  </tbody>
                                                </table></td>
                                              <td width="30" class="wz"></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </th>
                                      <th width="209" class="stack" data-border-left-color="borderColor" data-border-bottom-color="borderColor" style="border-bottom:1px solid #dde5f1;border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;"> <table width="209" align="center" cellpadding="0" cellspacing="0" border="0" class="table600">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="25" style="font-size:0;line-height:0;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz"></td>
                                              <td valign="top" align="center"><table width="145" align="left" cellpadding="0" cellspacing="0" border="0" class="tableTxt">
                                                  <tbody>
                                                    <tr>
                                                      <td rowspan="2" width="25" align="center" valign="top" style="line-height:1px;"><img src="http://www.emailtemplatebuilders.com/INVOICE-Generator/pictures/date-icon-20x20.png" style="display:block;" alt="IMG" border="0" hspace="0" vspace="0"></td>
                                                      <td rowspan="2" width="14" style="font-size:0;line-height:0;">&nbsp;</td>
                                                      <td valign="top" class="header2TD" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionCaptionLink" data-color="SectionCaptionTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;"><a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="SectionCaptionLink"></a>Invoice Date</td>
                                                    </tr>
                                                    <tr>
                                                      <td valign="top" class="RegularText4TD" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionInfoLink" data-color="SectionInfoTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 23px;"><a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="SectionInfoLink"></a>Jun 18, 2073</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="3" height="25" style="font-size:0;line-height:0;">&nbsp;</td>
                                                    </tr>
                                                  </tbody>
                                                </table></td>
                                              <td width="30" class="wz"></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </th>
                                      <th width="209" class="stack" data-border-left-color="borderColor" data-border-bottom-color="borderColor" style="border-bottom:1px solid #dde5f1;border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;"> <table width="209" align="center" cellpadding="0" cellspacing="0" border="0" class="table600">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="25" style="font-size:0;line-height:0;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz"></td>
                                              <td valign="top" align="center"><table width="145" align="left" cellpadding="0" cellspacing="0" border="0" class="tableTxt">
                                                  <tbody>
                                                    <tr>
                                                      <td rowspan="2" width="25" align="center" valign="top" style="line-height:1px;"><img src="http://www.emailtemplatebuilders.com/INVOICE-Generator/pictures/dollar-icon-20x20.png" style="display:block;" alt="IMG" border="0" hspace="0" vspace="0"></td>
                                                      <td rowspan="2" width="14" style="font-size:0;line-height:0;">&nbsp;</td>
                                                      <td valign="top" class="header2TD" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionCaptionLink" data-color="SectionCaptionTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;"><a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="SectionCaptionLink"></a>Invoice Total</td>
                                                    </tr>
                                                    <tr>
                                                      <td valign="top" class="RegularText4TD" align="left" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="SectionInfoLink" data-color="SectionInfoTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: bold;text-align: left;line-height: 23px;"><a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="SectionInfoLink"></a>$175.00</td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="3" height="25" style="font-size:0;line-height:0;">&nbsp;</td>
                                                    </tr>
                                                  </tbody>
                                                </table></td>
                                              <td width="30" class="wz"></td>
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
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" style="table-layout:fixed;margin:0 auto;" data-module="MainInvoiceCaptionsModule" data-thumb="http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-5.jpg" class="">
  <tbody>
    <tr>
      <td align="center"><table width="668" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" class="table600Min" style="table-layout:fixed;margin:0 auto;min-width:668px;">
          <tbody>
            <tr>
              <td align="center" class="table600st" style="min-width:668px;"><table width="629" align="center" cellpadding="0" cellspacing="0" border="0" class="table600Min" style="min-width:629px;">
                  <tbody>
                    <tr>
                      <td class="table600st" style="min-width:629px;"><table width="629" align="left" cellpadding="0" cellspacing="0" bgcolor="#67bffd" data-bgcolor="ThemeColorBG" border="0" class="table600">
                          <tbody>
                            <tr>
                              <td align="left">
                              
                               

                              <table align="center" cellpadding="0" cellspacing="0" border="0">
                                  <tbody>
                                    <tr>
                                      <th width="209" class="stack2" style="margin:0; padding:0;vertical-align:top;border-bottom-color:#dde5f1;" data-border-bottom-color="borderColor"> <table width="209" align="center" cellpadding="0" cellspacing="0" border="0" class="table60032">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz2"></td>
                                              <td class="header5TD" data-link-style="text-decoration:none; color:#ffffff;" data-link-color="InvoiceCaptionsLink" data-color="InvoiceCaptionsTXT" style="color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;"><a href="#" target="_blank" data-color="InvoiceCaptionsLink" style="text-decoration: none;color: #ffffff;"></a>Product Name</td>
                                              <td width="30" class="wz2"></td>
                                            </tr>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </th>
                                      <th width="139" class="stack3" data-border-left-color="borderColor" data-border-bottom-color="borderColor" style="border-left:1px solid #dde5f1;border-bottom-color:#dde5f1;margin:0; padding:0;vertical-align:top;"> <table width="139" align="center" cellpadding="0" cellspacing="0" border="0" class="table60033">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz2"></td>
                                              <td class="header5TD" data-link-style="text-decoration:none; color:#ffffff;" data-link-color="InvoiceCaptionsLink" data-color="InvoiceCaptionsTXT" style="color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;"><a href="#" target="_blank" data-color="InvoiceCaptionsLink" style="text-decoration: none;color: #ffffff;"></a>Price</td>
                                              <td width="30" class="wz2"></td>
                                            </tr>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </th>
                                      <th width="139" class="stack3" data-border-left-color="borderColor" data-border-bottom-color="borderColor" style="border-left:1px solid #dde5f1;border-bottom-color:#dde5f1;margin:0; padding:0;vertical-align:top;"> <table width="139" align="center" cellpadding="0" cellspacing="0" border="0" class="table60033">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz2"></td>
                                              <td class="header5TD" data-link-style="text-decoration:none; color:#ffffff;" data-link-color="InvoiceCaptionsLink" data-color="InvoiceCaptionsTXT" style="color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;"><a href="#" target="_blank" data-color="InvoiceCaptionsLink" style="text-decoration: none;color: #ffffff;"></a>Quantity</td>
                                              <td width="30" class="wz2"></td>
                                            </tr>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </th>
                                      <th width="139" class="stack3" data-border-left-color="borderColor" data-border-bottom-color="borderColor" style="border-left:1px solid #dde5f1;border-bottom-color:#dde5f1;margin:0; padding:0;vertical-align:top;"> <table width="139" align="center" cellpadding="0" cellspacing="0" border="0" class="table60033">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz2"></td>
                                              <td class="header5TD" data-link-style="text-decoration:none; color:#ffffff;" data-link-color="InvoiceCaptionsLink" data-color="InvoiceCaptionsTXT" style="color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;"><a href="#" target="_blank" data-color="InvoiceCaptionsLink" style="text-decoration: none;color: #ffffff;"></a>Total</td>
                                              <td width="30" class="wz2"></td>
                                            </tr>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
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
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" style="table-layout:fixed;margin:0 auto;" data-module="InvoiceItemDetailsModule" data-thumb="http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-6.jpg" class="">
  <tbody>
    <tr>
      <td align="center"><table width="668" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" class="table600Min" style="table-layout:fixed;margin:0 auto;min-width:668px;">
          <tbody>
            <tr>
              <td align="center" class="table600st" style="min-width:668px;"><table width="629" align="center" cellpadding="0" cellspacing="0" border="0" class="table600Min" style="min-width:629px;">
                  <tbody>
                    <tr>
                      <td class="table600st" style="min-width:629px;"><table width="629" align="left" cellpadding="0" cellspacing="0" bgcolor="#eff3f7" data-bgcolor="CalculationsBGColor" border="0" class="table600">
                          <tbody>
                            <tr>
                              <td align="left">

                              
                              EOD;

                              $total=0;
     
    while( $row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);?>
        <?php $message .= <<<EOD

                              <table align="center" cellpadding="0" cellspacing="0" border="0">
                                  <tbody>
                                    <tr>
                                      <th width="209" class="stack2" style="margin:0; padding:0;border-bottom:1px solid #dde5f1;" data-border-bottom-color="borderColor"> <table width="209" align="center" cellpadding="0" cellspacing="0" border="0" class="table60032">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz2"></td>
                                              <td class="header2TD" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;text-align: left;line-height: 19px;font-weight: lighter;"><a href="#" target="_blank" data-color="RegularLink" style="text-decoration: none;color: #67bffd;"></a>{$title}</td>
                                              <td width="30" class="wz2"></td>
                                            </tr>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </th>
                                      <th width="139" class="stack3" data-border-left-color="borderColor" data-border-bottom-color="borderColor" style="border-left:1px solid #dde5f1;border-bottom:1px solid #dde5f1;margin:0; padding:0;"> <table width="139" align="center" cellpadding="0" cellspacing="0" border="0" class="table60033">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz2"></td>
                                              <td class="RegularText5TD" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;"><a href="#" target="_blank" data-color="RegularLink" style="text-decoration: none;color: #67bffd;"></a>${$price}</td>
                                              <td width="30" class="wz2"></td>
                                            </tr>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </th>
                                      <th width="139" class="stack3" data-border-left-color="borderColor" data-border-bottom-color="borderColor" style="border-left:1px solid #dde5f1;border-bottom:1px solid #dde5f1;margin:0; padding:0;"> <table width="139" align="center" cellpadding="0" cellspacing="0" border="0" class="table60033">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz2"></td>
                                              <td class="RegularText5TD" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;"><a href="#" target="_blank" data-color="RegularLink" style="text-decoration: none;color: #67bffd;"></a>{$quantity}</td>
                                              <td width="30" class="wz2"></td>
                                            </tr>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </th>
                                      <th width="139" class="stack3" data-border-left-color="borderColor" data-border-bottom-color="borderColor" style="border-left:1px solid #dde5f1;border-bottom:1px solid #dde5f1;margin:0; padding:0;"> <table width="139" align="center" cellpadding="0" cellspacing="0" border="0" class="table60033">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz2"></td>
                                              <td class="RegularText5TD" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;"><a href="#" target="_blank" data-color="RegularLink" style="text-decoration: none;color: #67bffd;"></a>${$total}</td>
                                              <td width="30" class="wz2"></td>
                                            </tr>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
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
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" style="table-layout:fixed;margin:0 auto;" data-module="FinalCalculationsModule-4ROWS" data-thumb="http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-8.jpg" class="">
  <tbody>
    <tr>
      <td align="center"><table width="668" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" class="table600Min" style="table-layout:fixed;margin:0 auto;min-width:668px;">
          <tbody>
            <tr>
              <td align="center" class="table600st" style="min-width:668px;"><table width="629" align="center" cellpadding="0" cellspacing="0" border="0" class="table600Min" style="min-width:629px;">
                  <tbody>
                    <tr>
                      <td class="table600st" style="min-width:629px;"><table width="629" align="left" cellpadding="0" cellspacing="0" bgcolor="#eff3f7" data-bgcolor="CalculationsBGColor" border="0" class="table600">
                          <tbody>
                            <tr>
                              <td align="left">
                              <table align="center" cellpadding="0" cellspacing="0" border="0">
                                  <tbody>
                                    
                                    <tr>
                                      <th width="139" class="stack3" bgcolor="#67bffd" data-bgcolor="ThemeColorBG" valign="top" data-border-bottom-color="borderColor" data-border-left-color="borderColor" style="border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;"> <table width="139" align="center" cellpadding="0" cellspacing="0" border="0" class="table60033">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz2"></td>
                                              <td bgcolor="#67bffd" data-bgcolor="ThemeColorBG" class="header5TD" data-link-style="text-decoration:none; color:#ffffff;" data-link-color="InvoiceCaptionsLink" data-color="InvoiceCaptionsTXT" style="color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;"><a href="#" target="_blank" data-color="InvoiceCaptionsLink" style="text-decoration: none;color: #ffffff;"></a>Total</td>
                                              <td width="30" class="wz2"></td>
                                            </tr>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </th>
                                      <th width="139" class="stack3" bgcolor="#67bffd" data-bgcolor="ThemeColorBG" valign="top" data-border-bottom-color="borderColor" data-border-left-color="borderColor" style="border-left:1px solid #dde5f1;margin:0; padding:0;vertical-align:top;border-bottom:1px solid #dde5f1;"> <table width="139" align="center" cellpadding="0" cellspacing="0" border="0" class="table60033">
                                          <tbody>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="30" class="wz2"></td>
                                              <td bgcolor="#67bffd" data-bgcolor="ThemeColorBG" class="header5TD" data-link-style="text-decoration:none; color:#ffffff;" data-link-color="InvoiceCaptionsLink" data-color="InvoiceCaptionsTXT" style="color: #ffffff;font-family: sans-serif;font-size: 15px;text-align: center;line-height: 27px;font-weight: bold;"><a href="#" target="_blank" data-color="InvoiceCaptionsLink" style="text-decoration: none;color: #ffffff;"></a>
                                              

EOD; $total += $subtotal;
$message .= <<<EOD
                                             ${$totlal}
                                              </td>
                                              <td width="30" class="wz2"></td>
                                            </tr>
                                            <tr>
                                              <td colspan="3" height="20" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
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
<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" style="table-layout:fixed;margin:0 auto;" data-module="FinalNotesModule" data-thumb="http://www.emailtemplatebuilders.com/INVOICE-Generator/03_TBThumbnails/module-9.jpg" class="">
  <tbody>
    <tr>
      <td align="center"><table width="668" align="center" cellpadding="0" cellspacing="0" border="0" bgcolor="#384855" data-bgcolor="TemplateBGColor" class="table600Min" style="table-layout:fixed;margin:0 auto;min-width:668px;">
          <tbody>
            <tr>
              <td align="center" class="table600st" style="min-width:668px;"><table width="629" align="center" cellpadding="0" cellspacing="0" border="0" class="table600Min" style="min-width:629px;">
                  <tbody>
                    <tr>
                      <td class="table600st" style="min-width:629px;"><table width="629" bgcolor="#fdfdfd" data-bgcolor="CredentialsBGColor" align="left" cellpadding="0" cellspacing="0" border="0" class="table600" style="border-radius:0 0 6px 6px;">
                          <tbody>
                            <tr>
                              <td>
                              <table width="627" cellpadding="0" cellspacing="0" border="0" class="table600">
                                  <tbody>
                                    <tr>
                                      <td colspan="3" height="25" style="font-size:0;line-height:0;" class="va2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="30" class="wz"></td>
                                      <td class="RegularText5TD" data-link-style="text-decoration:none; color:#67bffd;" data-link-color="RegularLink" data-color="RegularTXT" style="color: #425065;font-family: sans-serif;font-size: 14px;font-weight: lighter;text-align: center;line-height: 23px;">Payments should be made within 30 days with one of the options below, or you can enter any note here if necessary, you have much space:<br>
                                        <br>
                                        <b>Payment Methods:</b> Cheque, PayPal, WesternUnion, BACS<br>
                                        <b>We accept:</b> MasterCard, Visa, AmericanExpress<br>
                                        <b>PayPal Email Address:</b> <a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="RegularLink">inveratorpaypal@inverator.com</a><br>
                                        <br>
                                        <a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="RegularLink">www.inverator.com</a><br>
                                        <a href="#" target="_blank" style="text-decoration: none;color: #67bffd;font-weight: bold;" data-color="RegularLink">sales@inverator.com</a></td>
                                      <td width="30" class="wz"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="3" height="30" class="va2" style="font-size:0;line-height:0;">&nbsp;</td>
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

<div id="edit_link" class="hidden" style="display: none;"> 
  
  <!-- Close Link -->
  <div class="close_link"></div>
  
  <!-- Edit Link Value -->
  <input type="text" id="edit_link_value" class="createlink" placeholder="Your URL">
  
  <!-- Change Image Wrapper-->
  <div id="change_image_wrapper"> 
    
    <!-- Change Image Tooltip -->
    <div id="change_image"> 
      
      <!-- Change Image Button -->
      <p id="change_image_button">Change &nbsp; <span class="pixel_result"></span></p>
    </div>
    
    <!-- Change Image Link Button -->
    <input type="button" value="" id="change_image_link">
    
    <!-- Remove Image -->
    <input type="button" value="" id="remove_image">
  </div>
  
  <!-- Tooltip Bottom Arrow-->
  <div id="tip"></div>
</div>
</body>
</html>
EOD;

    $name  = $_SESSION['name'];
    $email = $_SESSION['email'];

    $to  = 'm.maaz@rdxsports.com'; 

    // subject
    $subject = 'Whole Sale Order';

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    
    // Additional headers
    $headers .= 'To:' .$name. "\r\n";
    $headers .= 'From: RDX SPORTS <trade@rdxsports.com>' . "\r\n";
    $headers .= 'Cc: m.maaz@rdxsports.com' . "\r\n";
    $headers .= 'Bcc: trade@rdxsports.com' . "\r\n";

    // Mail it
    mail($to, $subject, $message, $headers);
?>

      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->                      

      <div class="content-page">

          <!-- Start content -->

          <div class="content">

              <div class="container">



                  <!-- Page-Title -->

                  <div class="row">

                      <div class="col-sm-12">

                          <h4 class="page-title">Order Confirmation</h4>

                          <ol class="breadcrumb">

                              <li><a href="index.php">Home</a></li>

                              <li><a href="product.php">Products</a></li>

                              <li class="active">Your Order</li>

                          </ol>

                      </div>

                  </div>

                  

        <div class="row">

        <div class="col-lg-12">

          <div class="card-box">

            <h4 class="m-t-0 header-title"><b>Order Successful</b></h4>
            <p>Your has been placed successfuly.Please check your email for the invoice.Our representative will contact you soon!</p>
            <p><b>Thanks for choosing RDX</b></p>

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

  <script src="assets/js/jquery.min.js"></script>

  <script src="assets/js/bootstrap.min.js"></script>

  <script src="assets/js/detect.js"></script>

  <script src="assets/js/fastclick.js"></script>

  <script src="assets/js/jquery.slimscroll.js"></script>

  <script src="assets/js/jquery.blockUI.js"></script>

  <script src="assets/js/waves.js"></script>

  <script src="assets/js/wow.min.js"></script>

  <script src="assets/js/jquery.nicescroll.js"></script>

  <script src="assets/js/jquery.scrollTo.min.js"></script>

  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js" type="text/javascript"></script>

  <script src="assets/js/jquery.core.js"></script>

  <script src="assets/js/jquery.app.js"></script>

  <script type="text/javascript" src="assets/plugins/parsleyjs/dist/parsley.min.js"></script>

  <script type="text/javascript">

  $(document).ready(function() {

  $('form').parsley();

  });

  </script>
  </body>
  </html>