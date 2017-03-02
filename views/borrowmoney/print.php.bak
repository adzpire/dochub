<?php
//use Yii;
use yii\helpers\Html;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>แบบฟอร์มขออนุมัติยืมเงินรายได้มหาวิทยาลัย</title>
<link rel="stylesheet" type="text/css" href="/sites/TH_Sarabun_New/fonts/thsarabunnew.css">
<style type="text/css">
body {
	margin-top: 10px;
	margin-bottom: 10px;
	font-size: 14px;
	line-height: 22px;
	font-family: 'THSarabunNew', sans-serif;
}
.pagebreak { page-break-before: always; }
.tbhead {
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
.tbhead {
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
}
.tbcontent {
	border: thin solid #000;
	vertical-align: top;
	padding-left: 5px;
}
a {
    display: inline-block;
    color: #000;
    line-height: 18px;
    text-decoration: none;
    border-bottom: 1px dotted;
}
.style6{
  font-size: 20px;
}
.fixpos {
	position: absolute;
	right: 300px;
}
@media print {
    .noprint {
        display: none;
    }
}
</style>
</head>

<body>
<div align="center">
    <table width="660" border="0" align="center" cellpadding="0" cellspacing="0"  class="doc">
        <tr>
            <td width="100%">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td width="41%">
                            <?php
                            echo Html::img('/old/images/PSU.png', ['width' => '47px', 'height' => '78px']);
                            ?>
                        </td>
                        <td width="59%"><span class="style6">บันทึกข้อความ</span></td>
                    </tr>
                </table></td>
        </tr>
        <tr>
            <td width="100%"><span class=docsb><span class="style2">ส่วนงาน</span><span class="style7">&nbsp;</span>&nbsp;&nbsp;&nbsp;</span><span class=docs> คณะวิทยาการสื่อสาร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>โทร</strong>.  <?php echo $intmdl->number;; ?></span></td>
        </tr>
        <tr>
            <td width="100%">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="doc">
                    <tr>
                        <td width="50%" class="docs"><strong>ที่</strong>&nbsp; 861/ -</td>
                        <td width="50%" class="docs"><strong>วันที่</strong> &nbsp; &nbsp; <?php echo \Yii::$app->formatter->asDate($model->ss->updated_at, "long"); ?>
                        </td>
                    </tr>
                </table></td>
        </tr>
        <tr>
            <td width="100%" height="30"><span class=docs><strong>เรื่อง</strong> &nbsp;</span><span class=docs>ขออนุมัติยืมเงินรายได้มหาวิทยาลัย</span> </td>
        </tr>
        <tr>
            <td width="100%"><span class=docs><strong>เรียน</strong>&nbsp;&nbsp;&nbsp;รองอธิการบดี วิทยาเขตปัตตานี</span></td>
        </tr>
        <tr>
            <td width="100%" height="83"><span class=docs>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า <u>
                        <?php
                        //echo $model->brmnSt->profile->profilePrefix->name_th.' '.$fulldata->profile->firstname.' '.$fulldata->profile->lastname;
                        echo $model->brmnSt->title->name_th.' '.$model->brmnSt->getFullname('th');
                        ?>
                    </u> &nbsp;&nbsp;&nbsp;ตำแหน่ง &nbsp;<u>&nbsp;<?php echo $model->brmnSt->position->name_th; ?>&nbsp;</u> &nbsp;&nbsp;&nbsp;อัตราเงินเดือน&nbsp;<u><?php echo number_format($model->brmn_salary,2,'.',','); ?>&nbsp;</u>บาท&nbsp;&nbsp;มีความประสงค์ขอยืมเงินรายได้มหาวิทยาลัย จำนวนเงิน <u>&nbsp;<?php echo number_format($model->brmn_borrow,2,'.',','); ?>&nbsp;</u>&nbsp;บาท&nbsp;(<?php echo \Yii::$app->formatter->asSpellout($model->brmn_borrow); ?> บาท) &nbsp; เพื่อสำรองค่าใช้จ่าย&nbsp;&nbsp;<u>
                        <?php //echo $choicelist[$model->brmn_choice];
                        if ($model->brmn_choice=='1') {
                            echo " ในการเดินทางไปราชการ เรื่อง ".$model->brmn_title."  ที่ ".$model->brmn_place." ระหว่างวันที่  " .\Yii::$app->formatter->asDate($model->brmn_bdate, "long")."  ถึงวันที่  ".\Yii::$app->formatter->asDate($model->brmn_edate, "long");
                        }else if($model->brmn_choice=='2'){
                            echo "ค่าวัสดุตามหนังสืออนุมัติ";
                        }else if($model->brmn_choice=='3'){
                            echo $model->brmn_other;
                        }
                        ?>
                        &nbsp; </u> </span></td>
        </tr>
        <tr>
            <td width="100%"><span class=docs>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้าได้ค้างใบยืม จำนวน ...... รายการ ดังรายละเอียดต่อไปนี้ </span> </td>
        </tr>
        <tr>
            <td><span style="line-height:20px" class=docs>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1. ตามใบยืมเงิน ที่ ....................... ลงวันที่ ............................................................... <br>
    จำนวน ......................... บาท บัดนี้ได้ดำเนินการ .......................................................................................... </span></td>
        </tr>
        <tr>
            <td><span  style="line-height:20px" class=docs>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2. ตามใบยืมเงิน ที่ ....................... ลงวันที่ ............................................................... <br>
    จำนวน ......................... บาท บัดนี้ได้ดำเนินการ .......................................................................................... </span></td>
        </tr>
        <tr>
            <td width="100%"><span  style="line-height:20px" class=docs>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3. ตามใบยืมเงิน ที่ ....................... ลงวันที่ ............................................................... <br>
    จำนวน ......................... บาท บัดนี้ได้ดำเนินการ .......................................................................................... </span><span class=style4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
        </tr>
        <tr>
            <td width="100%" valign="middle"><span class=docs>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติเงินยืม จำนวน  &nbsp;<u>&nbsp;<u><?php echo number_format($model->brmn_borrow,2,'.',','); ?></u>&nbsp;</u>&nbsp;บาท&nbsp;(<?php echo \Yii::$app->formatter->asSpellout($model->brmn_borrow); ?> บาท) ให้ด้วย จะเป็นพระคุณยิ่ง </span></td>
        </tr>
        <!-- 1 -->
        <tr>
            <td width="100%" valign="top">
                <div align="center">
                    <center>
                        <table border="0" cellpadding="3" cellspacing="0" width="100%" class="doc">
                            <tr>
                                <td width="24%">&nbsp;</td>
                                <td width="53%" align="center">
                                    <span class=docs><strong>(ลงชื่อ)</strong>......................................................</span><br>
                                    <span class=docs>(
                                        <?php
                                        //echo $fulldata->profile->profilePrefix->name_th.' '.$fulldata->profile->firstname.' '.$fulldata->profile->lastname;
                                        echo $model->brmnSt->title->name_th.' '.$model->brmnSt->getFullname('th');
                                        ?>)</span><br>
                  <span class=docs><strong>ตำแหน่ง</strong> <?php echo $model->brmnSt->position->name_th; ?><br>
              </span></td>
                                <td width="23%" align="center">&nbsp;</td>
                            </tr>
                        </table>
                    </center>
                </div></td>
        </tr>
        <!-- end 1 -->
        <!-- 2 -->
        <tr>
            <td width="100%" valign="top" class="taform">
                <div align="center">
                    <table width="97%" cellpadding="0" cellspacing="0" style="border-top: 1px solid black;">
                        <tr >
                            <td width="49%" align='left'  valign="top" style="border-right: 1px solid black;" >
                                <center>
                                    <table width="98%"  border="0" cellpadding="0" cellspacing="0" >
                                        <tr>
                                            <td><div align="left" class="docs" >เรียน คณบดี</div></td>
                                        </tr>
                                        <tr>
                                            <td><div align="left" >
                      <span class=docs>&nbsp;&nbsp;&nbsp;เห็นควรนำเสนอรองอธิการบดีเพื่อพิจารณาอนุมัติ<br>
                      เงินยืมจำนวนเงิน<u>&nbsp;<u><?php echo number_format($model->brmn_borrow,2,'.',','); ?></u>&nbsp;</u>&nbsp;บาท&nbsp;(<?php echo \Yii::$app->formatter->asSpellout($model->brmn_borrow); ?> บาท)&nbsp;
                      <br>
                      </span>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="docs">ลงชื่อ.......................................................<br>
                                                &nbsp;(นางสาวพิมพ์ชนก พลวรรณ)<br>
                                                เจ้าหน้าที่การเงิน<br>
                                                .................................................................................<br>
                                                .................................................................................&nbsp;&nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="docs"><div align="center">ลงชื่อ...............................<br>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; (....................................)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                                                    ตำแหน่ง .........................................................</div></td>
                                        </tr>
                                    </table>
                                </center>
                            </td>
                            <center>
                                <td width="51%" valign="top" align="center"  >
                                    <table width="95%"  border="0" cellpadding="0" cellspacing="0" class="doc">
                                        <tr>
                                            <td><div align="center">
                                                    <u class="docs">ความเห็นของวิทยาเขต</u><br></div></td>
                                        </tr>
                                        <tr >
                                            <td class="docs">
                                                <div align="left">เรียน รองอธิการบดี วิทยาเขตปัตตานี</div></td>
                                        </tr>
                                        <tr >
                                            <td><div align="center" class="docs">......................................................................................<br>
                                                    ......................................................................................<br>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td align="center" class="docs">ลงชื่อ.......................................................<br>
                                                &nbsp;(..............................................)<br>
                                                เจ้าหน้าที่การเงิน<br>
                                                .................................................................................<br>
                                                .................................................................................&nbsp;&nbsp;&nbsp;</td>
                                        </tr>
                                    </table>
                                    <br>
                <span class="docs">................................................................................<br>
              รองอธิการบดี วิทยาเขตปัตตานี</span> </td>
                            </center>
                        </tr>
                    </table>
                </div></td>
        </tr>
        <!-- end2 -->
    </table>
    <p style="page-break-before:always; padding-top:15px"></p>
    <table bordercolor="#000000" width="660" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td style=" border-bottom:none" width="700" height="24" align="center" class="docs"><strong>สัญญายืมเงิน</strong></td>
            <td style=" border-bottom:none"  height="24" colspan="2" class="docs"><strong>เลขที่ ...................................................</strong></td>
        </tr>
        <tr>
            <td style="border-top:none" height="46" class="docs">ยื่นต่อ รองอธิการบดี วิทยาเขตปัตตานี</td>
            <td style=" border-top:none" height="46" colspan="2" class="docs">วันครบกำหนด .....................................</td>
        </tr>
        <tr>
            <td height="118" colspan="3" class="docs" style=" border-bottom:none; vertical-align:top"> ข้าพเจ้า <u><?php echo $model->brmnSt->title->name_th.' '.$model->brmnSt->getFullname('th'); ?>  </u>ตำแหน่ง <u><?php echo $model->brmnSt->position->name_th; ?> </u> สังกัด คณะวิทยาการสื่อสาร จังหวัด ปัตตานี<span class="docs"> มีความประสงค์ขอยืมเงินจาก มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตปัตตานี เพื่อเป็นค่าใช้จ่ายในการ  <u>
                        <?php
                        if ($model->brmn_choice=='1') {
                            echo " ในการเดินทางไปราชการ เรื่อง ".$model->brmn_title."  ที่ ".$model->brmn_place." ระหว่างวันที่  " .\Yii::$app->formatter->asDate($model->brmn_bdate, "long")."  ถึงวันที่  ".\Yii::$app->formatter->asDate($model->brmn_edate, "long");
                        }else if($model->brmn_choice=='2'){
                            echo "ค่าวัสดุตามหนังสืออนุมัติ";
                        }else if($model->brmn_choice=='3'){
                            echo $model->brmn_other;
                        }
                        ?>
                    </u></span></td>
        </tr>
        <tr>
            <td height="43">ตัวอักษร <span class="docs"><?php echo \Yii::$app->formatter->asSpellout($model->brmn_borrow); ?>บาท</span></td>
            <td width="100" height="43">รวมเงิน(บาท)</td>
            <td width="125" height="43"><span class=docs><?php echo number_format($model->brmn_borrow,2,'.',','); ?></span></td>
        </tr>
        <tr>
            <td  height="24" colspan="3" class="docs" style="padding:12px 0px; border-bottom:none; vertical-align:top"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้าสัญญาว่าจะปฏิบัติตามระเบียบของทางรายการทุกประการและจะนำใบสำคัญคู่จ่ายที่ถูกต้อง พร้อมทั้งเงินเหลือจ่าย (ถ้ามี) ส่งใช้ภายในกำหนดไว้ในระเบียบการเบิกจ่ายเงินจากคลัง คือ ภายใน ..30... วัน นับตั้งแต่วันที่ได้รับเงินยืมนี้ <strong>ถ้าข้าพเจ้าไม่ส่งตามกำหนด ข้าพเจ้ายินยอมให้หัก เงินเดือน ค่าจ้าง เบี้ยหวัด บำเหน็จ บำนาญ หรือเงินอื่นใดที่ข้าพเจ้าจะพึงได้รับจากทางราชการ การชดใช้จำนวนเงินที่ยืมไป จนครบถ้วนได้ทันที </strong></td>
        </tr>
        <tr>
            <td height="52" colspan="3" style="border-top:none"><table width="100%" border="0">
                    <tr>
                        <td  class="docs" width="50%">ลายมือชื่อ ..................................................ผู้ยืม</td>
                        <td class="docs" width="50%">วันที่ ........................................................................</td>
                    </tr>
                </table></td>
        </tr>
        <tr>
            <td style="padding:10px 0px; border-bottom:none;" colspan="3" class="docs">เสนอ ................................................<br>      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ได้ตรวจสอบแล้ว เห็นสมควรอนุมัติให้ยืมตามใบยืมฉบับนี้ได้ จำนวน <u>&nbsp;<?php echo number_format($model->brmn_borrow,2,'.',','); ?>&nbsp;</u>&nbsp;บาท&nbsp;(<?php echo \Yii::$app->formatter->asSpellout($model->brmn_borrow); ?> บาท)</span></td>
        </tr>
        <tr>
            <td style=" border-top:none" height="55" colspan="3"><table width="100%" border="0">
                    <tr>
                        <td  class="docs" width="50%">ลายมือชื่อ .......................................เจ้าหน้าที่การเงิน</td>
                        <td class="docs" width="50%">วันที่ ........................................................................</td>
                    </tr>
                </table></td>
        </tr>
        <tr>
            <td height="24" colspan="3" class="docs" align="center" style="padding:15px 0px 0px 0px; border-bottom:none"><strong>คำอนุมัติ</strong></td>
        </tr>
        <tr>
            <td colspan="3" class="docs" style="padding:5px 0px 10px 5px; border-bottom:none; border-top:none;">อนุมัติให้ยืมตามเงื่อนไขข้างต้นได้ เป็นเงิน <u>&nbsp;<?php echo number_format($model->brmn_borrow,2,'.',','); ?>&nbsp;</u>&nbsp;บาท&nbsp;(<?php echo \Yii::$app->formatter->asSpellout($model->brmn_borrow); ?> บาท)</td>
        </tr>
        <tr>
            <td height="55" colspan="3" style=" border-top:none"><table width="100%" border="0">
                    <tr>
                        <td  class="docs" width="50%">ลายมือชื่อ ............................................รองอธิการบดี</td>
                        <td class="docs" width="50%">วันที่ ........................................................................</td>
                    </tr>
                </table></td>
        </tr>
        <tr>
            <td align="center" colspan="3" class="docs" style="padding:15px 0px 0px 0px; border-bottom:none"><strong>ใบรับเงิน</strong></td>
        </tr>
        <tr>
            <td style=" border-bottom:none; border-top:none;" colspan="3" class="docs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ได้รับเงินยืมจำนวน  <u><?php echo number_format($model->brmn_borrow,2,'.',','); ?></u> บาท (<?php echo \Yii::$app->formatter->asSpellout($model->brmn_borrow); ?> บาท)</td>
        </tr>
        <tr>
            <td height="55" colspan="3" style="padding-bottom:20px; border-top:none;"><table width="100%" border="0" >
                    <tr>
                        <td  class="docs" width="50%">ลายมือชื่อ ..................................................ผู้รับเงิน</td>
                        <td class="docs" width="50%">วันที่ ........................................................................</td>
                    </tr>
                </table></td>
        </tr>
    </table>
    <p style="page-break-before:always; padding-top:15px"></p>
    <table bordercolor="#000000" width="660"  border="1" align="center" cellpadding="0" cellspacing="0"">
    <tr>
        <td class="docs" align="center" colspan="9" style="padding:10px 0px;"><strong>รายการส่งใช้เงิน</strong></td>
    </tr>
    <tr align="center">
        <td width="47" rowspan="2" class="docs">ครั้งที่</td>
        <td width="90" rowspan="2" class="docs">วัน เดือน ปี</td>
        <td colspan="3" class="docs" style="padding:5px 0px;">รายการส่งใช้</td>
        <td colspan="2" rowspan="2" class="docs">คงค้าง</td>
        <td width="97" rowspan="2" class="docs">ลายมือชื่อผู้รับ</td>
        <td width="98" rowspan="2" class="docs">ใบรับเลขที่</td>
    </tr>
    <tr align="center">
        <td width="111" class="docs" style="padding:5px 0px;">เงินสดหรือใบสำคัญ</td>
        <td colspan="2" class="docs">จำนวนเงิน</td>
    </tr>
    <tr>
        <td height="683">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="75">&nbsp;</td>
        <td width="25">&nbsp;</td>
        <td width="67">&nbsp;</td>
        <td width="25">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    </table>
</div>
</body>
</html>