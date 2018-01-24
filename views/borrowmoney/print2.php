<?php
//use Yii;
use yii\helpers\Html;

$checkedbox = '<img width="16" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDMyIDMyIiBoZWlnaHQ9IjMycHgiIGlkPSLQodC70L7QuV8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAzMiAzMiIgd2lkdGg9IjMycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnIGlkPSJDaGVja19TcXVhcmUiPjxwYXRoIGQ9Ik0zMCwwSDJDMC44OTUsMCwwLDAuODk1LDAsMnYyOGMwLDEuMTA1LDAuODk1LDIsMiwyaDI4YzEuMTA0LDAsMi0wLjg5NSwyLTJWMkMzMiwwLjg5NSwzMS4xMDQsMCwzMCwweiAgICBNMzAsMzBIMlYyaDI4VjMweiIgZmlsbD0iIzEyMTMxMyIvPjxwYXRoIGQ9Ik0xMi4zMDEsMjIuNjA3YzAuMzgyLDAuMzc5LDEuMDQ0LDAuMzg0LDEuNDI5LDBsMTAuOTk5LTEwLjg5OWMwLjM5NC0wLjM5LDAuMzk0LTEuMDI0LDAtMS40MTQgICBjLTAuMzk0LTAuMzkxLTEuMDM0LTAuMzkxLTEuNDI4LDBMMTMuMDExLDIwLjQ4OGwtNC4yODEtNC4xOTZjLTAuMzk0LTAuMzkxLTEuMDM0LTAuMzkxLTEuNDI4LDBjLTAuMzk1LDAuMzkxLTAuMzk1LDEuMDI0LDAsMS40MTQgICBMMTIuMzAxLDIyLjYwN3oiIGZpbGw9IiMxMjEzMTMiLz48L2c+PGcvPjxnLz48Zy8+PGcvPjxnLz48Zy8+PC9zdmc+" >';
$uncheckbox = '<img width="16" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAHUlEQVQ4jWNgYGD4TyGGEGSCUQNGDRg1gNoGkI0BF6E7xdLOry8AAAAASUVORK5CYII=" >';
?>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" class="style4">
    <tr>
        <td width="100%">
            <table border="0" cellpadding="0" cellspacing="0" style="100%">
                <tr>
                    <td width="240px">
                        <?php echo Html::img('/old/images/PSU.png', ['width' => '47px', 'height' => '78px']); ?>
                    </td>
                    <td align="center" width="220px">
                        <span class="style6">บันทึกข้อความ</span>
                    </td>
                    <td rowspan="2" style="vertical-align: top;">
                        <table  width="250px" border="1" cellpadding="0" cellspacing="0" style="100%">
                            <tr>
                                <td class="style4" style="padding: 10px 10px 0px 10px; vertical-align: top;">
                                    <p>1. เลขที่ใบยืมเงิน ......................................</p>
                                    <p>2. รายการส่งใช้</p>
                                    <p>&nbsp;&nbsp;<?= $uncheckbox; ?> เอกสารเบิกเลขที่ ........... ลว ........... </p>
                                    <p>&nbsp;&nbsp;<?= $uncheckbox; ?> เงินสด ................... บาท ลว ........... </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p class="style4">ส่วนงาน&nbsp;&nbsp;&nbsp;&nbsp; คณะวิทยาการสื่อสาร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>โทร</strong>. <?php echo $intmdl->number; ?></p>
                        <p><strong>ที่</strong>&nbsp; 861/ - &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>วันที่</strong> &nbsp;
                            &nbsp; <?php echo \Yii::$app->formatter->asDate($model->ss->updated_at, "long"); ?></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="100%" height="30">
            <span class='style4'><strong>เรื่อง</strong> &nbsp;ขออนุมัติยืมเงินหมุนเวียนคณะวิทยาการสื่อสาร</span>
        </td>
    </tr>
    <tr>
        <td width="100%">
            <span class='style4'><strong>เรียน</strong>&nbsp;&nbsp;&nbsp;คณบดี</span>
        </td>
    </tr>
    <tr>
        <td width="100%" height="83">
            <span class='style4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า <u>
                    <?php
                    //echo $model->brmnSt->profile->profilePrefix->name_th.' '.$fulldata->profile->firstname.' '.$fulldata->profile->lastname;
                    echo $model->brmnSt->title->name_th . ' ' . $model->brmnSt->getFullname('th');
                    ?></u> &nbsp;&nbsp;&nbsp;ตำแหน่ง &nbsp;&nbsp;<u><?php echo $model->brmnSt->position->name_th; ?></u>&nbsp; &nbsp;&nbsp;&nbsp;มีความประสงค์ขอยืมเงินหมุนเวียน จำนวนเงิน
                    &nbsp;<u><?php echo number_format($model->brmn_borrow, 2, '.', ','); ?></u>
                    &nbsp;&nbsp;บาท&nbsp;(<?php echo $thaibathtext; ?> ) &nbsp; เพื่อสำรองค่าใช้จ่าย
            </span>
        </td>
    </tr>
    <tr>
        <td width="100%" valign="middle">
            <span class='style4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติเงินยืม จำนวน  &nbsp;&nbsp;<u><?php echo number_format($model->brmn_borrow, 2, '.', ','); ?></u>&nbsp;&nbsp;บาท&nbsp;(<?php echo $thaibathtext; ?> ) ให้ด้วย จะเป็นพระคุณยิ่ง </span>
        </td>
    </tr>
    <!-- 1 -->
    <tr>
        <td width="100%" valign="top">
            <div align="center">
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
            </div>
        </td>
    </tr>
    <!-- end 1 -->
    <!-- 2 -->
    <tr>
        <td width="100%" valign="top" class="taform">
            <div>
                <table width="100%" cellpadding="0" cellspacing="0" style="border-top: 1px solid black;">
                    <tr>
                        <td width="48%" valign="top" style="border-right: 1px solid black; padding: 10px; border-left: 1px solid black;">
                            <p>เรียน คณบดี</p>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>

                                        <div align="left">
                                          <span class='style4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เพื่อโปรดพิจารณาอนุมัติเงินยืมจำนวนเงิน <u><?php echo number_format($model->brmn_borrow, 2, '.', ','); ?></u>  บาท (<?php echo $thaibathtext; ?> )&nbsp;ซึ่ง ณ ขณะนี้มีเงิน<br/>คงเหลือในบัญชีทั้งสิ้น ...................... บาท
                                          <br>
                                          </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" class='style4'>
                                        ลงชื่อ.......................................................<br>
                                        &nbsp;(นางสาวพิมพ์ชนก พลวรรณ)<br>
                                        นักวิชาการเงินและบัญชี
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="48%" valign="top" style="border-right: 1px solid black; padding: 10px;">
                            <p>ความเห็นคณบดี</p>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" class='style4'>

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
                                        <p>&nbsp;</p>
                                        ลงชื่อ.......................................................<br>
                                        &nbsp;(..............................................)<br>
                                        คณบดี<br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td width="100%" height="24" align="center" style="border: 1px solid black;">
            <p><span class='style4'><strong>สัญญายืมเงิน</strong></span></p>
            <p>คณะวิทยาการสื่อสาร</p>
        </td>
    </tr>
    <tr>
        <td width="100%" valign="middle" style="border: 1px solid black; padding: 10px;">
            <span class='style4'>
                &nbsp;ข้าพเจ้า <u>
                    <?php
                    echo $model->brmnSt->title->name_th . ' ' . $model->brmnSt->getFullname('th');
                    ?></u> &nbsp;&nbsp;&nbsp;ตำแหน่ง &nbsp;&nbsp;<u><?php echo $model->brmnSt->position->name_th; ?></u>&nbsp; &nbsp;&nbsp;&nbsp;มีความประสงค์ขอยืมเงิน จากบัญชีเงินคณะวิทยาการสื่อสาร &nbsp; เพื่อเป็นค่าใช้จ่าย&nbsp;&nbsp;ดังรายละเอียดต่อไปนี้
            </span>
        </td>
    </tr>
    <tr>
        <td style="border: 1px solid black;">
        <table border="" cellpadding="1" cellspacing="1" style="width:100%">
            <tr>
                <td width="100%" valign="bottom" style=" padding-left: 10px;">
                    <p>
                        <u>
                            <?php //echo $choicelist[$model->brmn_choice];
                            if ($model->brmn_choice == '1') {
                                echo "ในการเดินทางไปราชการ เรื่อง " . $model->brmn_title . "  ที่ " . $model->brmn_place . " ระหว่างวันที่  " . \Yii::$app->formatter->asDate($model->brmn_bdate, "long") . "  ถึงวันที่  " . \Yii::$app->formatter->asDate($model->brmn_edate, "long");
                            } else if ($model->brmn_choice == '2') {
                                echo "ค่าวัสดุตามหนังสืออนุมัติ";
                            } else if ($model->brmn_choice == '3') {
                                echo $model->brmn_other;
                            }
                            ?>
                        </u>
                    </p>
                    <p>ตัวอักษร (..<u><?php echo $thaibathtext; ?></u>..) รวมเงิน (บาท)</p>
                </td>
                <td width="80px" valign="bottom" style="text-align:center; border-left: 1px solid black;border-bottom: 1px solid black;"><?php echo floor($model->brmn_borrow); ?></td>
                <td width="40px" valign="bottom" style="text-align:center; border-left: 1px solid black;border-bottom: 1px solid black;"><?php echo number_format($model->brmn_borrow - floor($model->brmn_borrow), 2) * 100 ?></td>
            </tr>
        </table>
        <td>
    </tr>
    <tr>
        <td height="24" colspan="3" class="style4" style="padding:10px; border: 1px solid black; vertical-align:top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้าสัญญาว่าจะปฏิบัติตามระเบียบของทางราชการทุกประการ และจะนำใบสำคัญคู่จ่ายที่ถูกต้อง
            พร้อมทั้งเงินเหลือจ่าย (ถ้ามี) ส่งใช้ภายในกำหนดไว้ในระเบียบการเบิกจ่ายเงินจากคลัง คือ <strong>ภายใน ..7.. วัน</strong>
            นับตั้งแต่วันที่ได้รับเงินยืมนี้ <strong>ถ้าข้าพเจ้าไม่ส่งตามกำหนด ข้าพเจ้ายินยอมให้หัก เงินเดือน ค่าจ้าง
                เบี้ยหวัด บำเหน็จ บำนาญ หรือเงินอื่นใดที่ข้าพเจ้าจะพึงได้รับจากทางราชการ การชดใช้จำนวนเงินที่ยืมไป
                จนครบถ้วนได้ทันที </strong>
            <table width="100%">
                <tr>
                    <td width="330px">ลายมือชื่อ……………………………………...…………….ผู้ยืม</td>
                    <td width="370px">วันที่……………………………………….……….</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="border: 1px solid black;">
            <table width="100%">
                <tr align="center">
                    <td colspan="2" align="center">
                        <p><u>ใบรับเงิน</u></p>
                        <p>ได้รับเงินยืมจำนวนเงิน ..<u><?php echo number_format($model->brmn_borrow, 2, '.', ','); ?></u>.. บาท      (..<u><?php echo $thaibathtext; ?></u>..)     ไปเป็นการถูกต้องแล้ว</p>
                    </td>
                </tr>
                <tr>
                    <td width="330px">ลายมือชื่อ……………………………………...…………….ผู้รับเงิน</td>
                    <td width="370px">วันที่……………………………………….……….</td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- end2 -->
</table>
</body>