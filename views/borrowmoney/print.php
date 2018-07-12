<?php
//use Yii;
use yii\helpers\Html;

?>

<body>
<table width="660" border="0" align="center" cellpadding="0" cellspacing="0" class="style4">
    <tr>
        <td width="100%">
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td width="50%">
                        <?php
                        echo Html::img('/old/images/PSU.png', ['width' => '47px', 'height' => '78px']);
                        ?>
                    </td>
                    <td width="50%"><span class="style6">บันทึกข้อความ</span></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="100%"><span class="style4">ส่วนงาน&nbsp;&nbsp;&nbsp;&nbsp; คณะวิทยาการสื่อสาร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>โทร</strong>. <?php echo $intmdl->number; ?></span>
        </td>
    </tr>
    <tr>
        <td width="100%">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="style4">
                <tr>
                    <td width="60%" class="style4"><strong>ที่</strong>&nbsp; 861/ -</td>
                    <td width="40%" class="style4"><strong>วันที่</strong> &nbsp;
                        &nbsp; <?php echo \Yii::$app->formatter->asDate($model->ss->updated_at, "long"); ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="100%" height="30"><span class='style4'><strong>เรื่อง</strong> &nbsp;ขออนุมัติยืมเงินรายได้มหาวิทยาลัย</span>
        </td>
    </tr>
    <tr>
        <td width="100%"><span
                class='style4'><strong>เรียน</strong>&nbsp;&nbsp;&nbsp;รองอธิการบดี วิทยาเขตปัตตานี</span></td>
    </tr>
    <tr>
        <td width="100%" height="83">
            <span class='style4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า <u>
                    <?php
                    //echo $model->brmnSt->profile->profilePrefix->name_th.' '.$fulldata->profile->firstname.' '.$fulldata->profile->lastname;
                    echo $model->brmnSt->title->name_th . ' ' . $model->brmnSt->getFullname('th');
                    ?></u> &nbsp;&nbsp;&nbsp;ตำแหน่ง &nbsp;&nbsp;<u><?php echo $model->brmnSt->position->name_th; ?></u>&nbsp; &nbsp;&nbsp;&nbsp;อัตราเงินเดือน&nbsp;<u><?php echo number_format($model->brmn_salary, 2, '.', ','); ?></u>
                    &nbsp;บาท&nbsp;&nbsp;มีความประสงค์ขอยืมเงินรายได้มหาวิทยาลัย จำนวนเงิน
                    &nbsp;<u><?php echo number_format($model->brmn_borrow, 2, '.', ','); ?></u>
                    &nbsp;&nbsp;บาท&nbsp;(<?php echo $thaibathtext; ?>) &nbsp; เพื่อสำรองค่าใช้จ่าย&nbsp;&nbsp;<u>
                    <?php //echo $choicelist[$model->brmn_choice];
                    if ($model->brmn_choice == '1') {
                        echo "ในการเดินทางไปราชการ เรื่อง " . $model->brmn_title . "  ที่ " . $model->brmn_place . " ระหว่างวันที่  " . \Yii::$app->formatter->asDate($model->brmn_bdate, "long") . "  ถึงวันที่  " . \Yii::$app->formatter->asDate($model->brmn_edate, "long");
                    } else if ($model->brmn_choice == '2') {
                        echo "ค่าวัสดุตามหนังสืออนุมัติ";
                    } else if ($model->brmn_choice == '3') {
                        echo $model->brmn_other.' วันที่ '. \Yii::$app->formatter->asDate($model->brmn_bdate, "long");
                    }
                    ?>
                </u>
            </span>
        </td>
    </tr>
    <tr>
        <td width="100%"><span class='style4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้าได้ค้างใบยืม จำนวน ...... รายการ ดังรายละเอียดต่อไปนี้ </span>
        </td>
    </tr>
    <tr>
        <td><span style="line-height:20px" class='style4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1. ตามใบยืมเงิน ที่ ....................... ลงวันที่ ............................................................... <br>
    จำนวน ......................... บาท บัดนี้ได้ดำเนินการ .......................................................................................... </span>
        </td>
    </tr>
    <tr>
        <td><span style="line-height:20px" class='style4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2. ตามใบยืมเงิน ที่ ....................... ลงวันที่ ............................................................... <br>
    จำนวน ......................... บาท บัดนี้ได้ดำเนินการ .......................................................................................... </span>
        </td>
    </tr>
    <tr>
        <td width="100%"><span style="line-height:20px" class='style4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3. ตามใบยืมเงิน ที่ ....................... ลงวันที่ ............................................................... <br>
    จำนวน ......................... บาท บัดนี้ได้ดำเนินการ .......................................................................................... &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        </td>
    </tr>
    <tr>
        <td width="100%" valign="middle"><span class='style4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติเงินยืม จำนวน  &nbsp;&nbsp;<u><?php echo number_format($model->brmn_borrow, 2, '.', ','); ?></u>&nbsp;&nbsp;บาท&nbsp;
                (<?php echo $thaibathtext; ?>) ให้ด้วย จะเป็นพระคุณยิ่ง </span></td>
    </tr>
    <!-- 1 -->
    <tr>
        <td width="100%" valign="top">
            <div align="center">
                <center>
                    <table border="0" cellpadding="3" cellspacing="0" width="100%" class="style4">
                        <tr>
                            <td width="24%">&nbsp;</td>
                            <td width="53%" align="center">
                                <span class='style4'><strong>(ลงชื่อ)</strong>......................................................<br>
                                    (
                                    <?php
                                    //echo $fulldata->profile->profilePrefix->name_th.' '.$fulldata->profile->firstname.' '.$fulldata->profile->lastname;
                                    echo $model->brmnSt->title->name_th . ' ' . $model->brmnSt->getFullname('th');
                                    ?>)<br>
                    <strong>ตำแหน่ง</strong> <?php echo $model->brmnSt->position->name_th; ?><br>
                            </td>
                            <td width="23%" align="center">&nbsp;</td>
                        </tr>
                    </table>
                </center>
            </div>
        </td>
    </tr>
    <!-- end 1 -->
    <!-- 2 -->
    <tr>
        <td width="100%" valign="top" class="taform">
            <div align="center">
                <table width="97%" cellpadding="0" cellspacing="0" style="border-top: 1px solid black;">
                    <tr>
                        <td width="49%" valign="top" style="border-right: 1px solid black;">
                            <table width="95%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <div align="left" class='style4'>เรียน คณบดี</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div align="left">
                                          <span class='style4'>&nbsp;&nbsp;&nbsp;เห็นควรนำเสนอรองอธิการบดีเพื่อพิจารณาอนุมัติ<br>เงินยืมจำนวนเงิน <u><?php echo number_format($model->brmn_borrow, 2, '.', ','); ?></u>  บาท<br/>(<?php echo $thaibathtext; ?>)&nbsp;
                                          <br>
                                          </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class='style4'>
                                        ลงชื่อ.......................................................<br>
                                        &nbsp;(นางสาวพิมพ์ชนก พลวรรณ)<br>
                                        เจ้าหน้าที่การเงิน<br>
                                        .................................................................................<br>
                                        .................................................................................<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class='style4'>
                                        <div>
                                            ลงชื่อ......................................<br>
                                            (....................................)<br>
                                            ตำแหน่ง .........................................................
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                            <td width="50%" valign="top" align="center">
                                <table width="98%" border="0" cellpadding="0" cellspacing="0" class='style4'>
                                    <tr>
                                        <td>
                                            <div align="center">
                                                <u class='style4'>ความเห็นของวิทยาเขต</u><br>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='style4'>
                                            <div align="left">เรียน รองอธิการบดี วิทยาเขตปัตตานี</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div align="center" class='style4'>
                                                ......................................................................................<br>
                                                ......................................................................................<br>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" class='style4'>
                                            ลงชื่อ.......................................................<br>
                                            &nbsp;(..............................................)<br>
                                            เจ้าหน้าที่การเงิน<br>
                                            .................................................................................<br>
                                            .................................................................................&nbsp;&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                </table>
                                <br>
                                    <span class='style4'>................................................................................<br>
                                  รองอธิการบดี วิทยาเขตปัตตานี</span>
                            </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <!-- end2 -->
</table>
<pagebreak />
<table width="700" border="1" align="center" cellpadding="0" cellspacing="0" class="style4">
    <tr>
        <td style=" border-bottom:none" width="480" height="24" align="center">
            <span class='style4'>
                <strong>สัญญายืมเงิน</strong>
            </span>
        </td>
        <td style=" border-bottom:none" height="24" colspan="2">
            <span class='style4'>
                <strong>เลขที่ .................................................</strong>
            </span>
        </td>
    </tr>
    <tr>
        <td style="border-top:none" height="46">
            <span class='style4'>ยื่นต่อ รองอธิการบดี วิทยาเขตปัตตานี</span>
        </td>
        <td style=" border-top:none" height="46" colspan="2">
            <span class='style4'>วันครบกำหนด .....................................</span>
        </td>
    </tr>
    <tr>
        <td height="118" colspan="3" class="style4" style=" border-bottom:none; vertical-align:top">
            ข้าพเจ้า <u><?php echo $model->brmnSt->title->name_th . ' ' . $model->brmnSt->getFullname('th'); ?>  </u>
            ตำแหน่ง <u><?php echo $model->brmnSt->position->name_th; ?> </u>
            สังกัด คณะวิทยาการสื่อสาร จังหวัด ปัตตานี
            <span class="style4"> มีความประสงค์ขอยืมเงินจาก มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตปัตตานี เพื่อเป็นค่าใช้จ่ายในการ  <u>
                    <?php
                    if ($model->brmn_choice == '1') {
                        echo "ในการเดินทางไปราชการ เรื่อง " . $model->brmn_title . "  ที่ " . $model->brmn_place . " ระหว่างวันที่  " . \Yii::$app->formatter->asDate($model->brmn_bdate, "long") . "  ถึงวันที่  " . \Yii::$app->formatter->asDate($model->brmn_edate, "long");
                    } else if ($model->brmn_choice == '2') {
                        echo "ค่าวัสดุตามหนังสืออนุมัติ";
                    } else if ($model->brmn_choice == '3') {
                        echo $model->brmn_other;
                    }
                    ?>
                </u>
            </span>
        </td>
    </tr>
    <tr>
        <td height="43">ตัวอักษร
            <span class="style4"><?php echo $thaibathtext; ?></span>
        </td>
        <td width="100" height="43">รวมเงิน(บาท)</td>
        <td width="125" height="43">
            <span class="style4"><?php echo number_format($model->brmn_borrow, 2, '.', ','); ?></span>
        </td>
    </tr>
    <tr>
        <td height="24" colspan="3" class="style4" style="padding:12px 0px; border-bottom:none;border-left:none;border-right:none; vertical-align:top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้าสัญญาว่าจะปฏิบัติตามระเบียบของทางรายการทุกประการและจะนำใบสำคัญคู่จ่ายที่ถูกต้อง
            พร้อมทั้งเงินเหลือจ่าย (ถ้ามี) ส่งใช้ภายในกำหนดไว้ในระเบียบการเบิกจ่ายเงินจากคลัง คือ ภายใน ..30... วัน
            นับตั้งแต่วันที่ได้รับเงินยืมนี้ <strong>ถ้าข้าพเจ้าไม่ส่งตามกำหนด ข้าพเจ้ายินยอมให้หัก เงินเดือน ค่าจ้าง
                เบี้ยหวัด บำเหน็จ บำนาญ หรือเงินอื่นใดที่ข้าพเจ้าจะพึงได้รับจากทางราชการ การชดใช้จำนวนเงินที่ยืมไป
                จนครบถ้วนได้ทันที </strong></td>
    </tr>
    <tr>
        <td height="52" colspan="3" style="border-top:none;border-left:none;border-right:none;">
            <table width="100%" border="0">
                <tr>
                    <td class="style4" width="50%">ลายมือชื่อ ..................................................ผู้ยืม
                    </td>
                    <td class="style4" width="50%">วันที่
                        ........................................................................
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="padding:10px 0px; border-bottom:none;" colspan="3" class="style4">&nbsp;เสนอ
            ................................................<br> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ได้ตรวจสอบแล้ว เห็นสมควรอนุมัติให้ยืมตามใบยืมฉบับนี้ได้ จำนวน
                <u><?php echo number_format($model->brmn_borrow, 2, '.', ','); ?></u>
                &nbsp;บาท&nbsp;(<?php echo $thaibathtext; ?>)</span></td>
    </tr>
    <tr>
        <td style=" border-top:none" height="55" colspan="3">
            <table width="100%" border="0">
                <tr>
                    <td class="style4" width="50%">ลายมือชื่อ .......................................เจ้าหน้าที่การเงิน
                    </td>
                    <td class="style4" width="50%">วันที่
                        ........................................................................
                    </td>
                </tr>
            </table>
        </td>
    </tr>

</table>
<table width="678px" border="1" align="center" cellpadding="0" cellspacing="0" class="style4">
    <tr>
        <td height="24" colspan="3" class="style4" align="center" style="border:none; padding:15px 0px 0px 0px;"><strong>คำอนุมัติ</strong>
        </td>
    </tr>
    <tr>
        <td colspan="3" class="style4" style="padding:5px 0px 10px 5px; border:none;">อนุมัติให้ยืมตามเงื่อนไขข้างต้นได้
            เป็นเงิน <u><?php echo number_format($model->brmn_borrow, 2, '.', ','); ?></u>
            &nbsp;บาท&nbsp;(<?php echo $thaibathtext; ?>)
        </td>
    </tr>
    <tr>
        <td class="style4" style="border:none;" width="50%">&nbsp;ลายมือชื่อ
            ............................................รองอธิการบดี
        </td>
        <td class="style4" style="border:none;" width="50%">วันที่
            ........................................................................
        </td>
    </tr>
</table>
<table width="678px" border="1" align="center" cellpadding="0" cellspacing="0" class="style4">
    <tr>
        <td align="center" colspan="3" class="style4" style="padding:15px 0px 0px 0px;  border:none;">
            <strong>ใบรับเงิน</strong></td>
    </tr>
    <tr>
        <td style="border:none;" colspan="3" class="style4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ได้รับเงินยืมจำนวน
            <u><?php echo number_format($model->brmn_borrow, 2, '.', ','); ?></u> บาท (<?php echo $thaibathtext; ?>)
        </td>
    </tr>
    <tr>
        <td class="style4" style="border:none;" width="50%">&nbsp;ลายมือชื่อ
            ..................................................ผู้รับเงิน
        </td>
        <td height="100" class="style4" style="border:none;" width="50%">วันที่
            ........................................................................
        </td>
    </tr>
</table>
<pagebreak />
<table width="700" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td class="style4" align="center" colspan="9" style="padding:10px 0px; border:none;">
            <strong>รายการส่งใช้เงิน</strong>
        </td>
    </tr>
    <tr valign="center">
        <td align="center" width="47" rowspan="2" style=" border-left:none;border-bottom:none;" class="style4">ครั้งที่</td>
        <td align="center" width="90" rowspan="2" style=" border-left:none;border-bottom:none;border-right:none;" class="style4">วัน เดือน ปี</td>
        <td align="center" colspan="3" class="style4" style="padding:5px 0px; border-bottom:none;">รายการส่งใช้</td>
        <td align="center" colspan="2" rowspan="2" style=" border-left:none;border-bottom:none;" class="style4">คงค้าง</td>
        <td align="center" width="97" rowspan="2" style=" border-left:none;border-bottom:none;" class="style4">ลายมือชื่อผู้รับ</td>
        <td align="center" width="98" rowspan="2" style=" border-left:none;border-bottom:none;border-right:none;" class="style4">ใบรับเลขที่</td>
    </tr>
    <tr valign="center">
        <td align="center" width="111" class="style4" style="padding:5px 0px;">เงินสดหรือใบสำคัญ</td>
        <td align="center" colspan="2" style=" border-left:none;" class="style4">จำนวนเงิน</td>
    </tr>
    <tr>
        <td style=" border-left:none;border-bottom:none;" height="683">&nbsp;</td>
        <td style=" border-left:none;border-bottom:none;">&nbsp;</td>
        <td style=" border-left:none;border-bottom:none;">&nbsp;</td>
        <td style=" border-left:none;border-bottom:none;" width="75">&nbsp;</td>
        <td style=" border-left:none;border-bottom:none;" width="25">&nbsp;</td>
        <td style=" border-left:none;border-bottom:none;" width="67">&nbsp;</td>
        <td style=" border-left:none;border-bottom:none;" width="25">&nbsp;</td>
        <td style=" border-left:none;border-bottom:none;">&nbsp;</td>
        <td style=" border-right:none;border-left:none;border-bottom:none;">&nbsp;</td>
    </tr>
</table>
</body>