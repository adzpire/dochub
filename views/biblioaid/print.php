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
                        &nbsp; <?php echo \Yii::$app->formatter->asDate($model->libaid_date, "long"); ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="100%" height="30"><span class='style4'><strong>เรื่อง</strong> &nbsp;ขออนุมัติเบิกเงินค่าบรรณสารสงเคราะห์ จากเงินรายได้ ปี  <?php echo \Yii::$app->formatter->asDate('1-1-'.$model->libaid_year, 'yyyy'); ?>  หมวดเงินอุดหนุน </span>
        </td>
    </tr>
    <tr>
        <td width="100%"><span
                class='style4'><strong>เรียน</strong>&nbsp;&nbsp;&nbsp;คณบดี</span></td>
    </tr>
    <tr>
        <td width="100%" height="83">
            <span class='style4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า <u>
                    <?php echo $model->libaidSt->title->name_th . ' ' . $model->libaidSt->getFullname('th'); ?></u>
                    &nbsp;ขออนุมัติเบิกเงินค่าบรรณสารสงเคราะห์ จากเงินรายได้คณะวิทยาการสื่อสาร หมวดเงินอุดหนุน ทั้งนี้ไม่เกิน 1,200 บาท ต่อคนต่อปี   ดังรายละเอียดต่อไปนี้
            </span>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 18px">
            <table width="100%">
                <?php
                $t_amount = 0;
                $count = 1;
                foreach ($details as $row) {
                    echo '<tr>';
                    //echo '<td width="31" scope="col">&nbsp;</td>';
                    //echo '<td><div align="left" ><span > &nbsp;'.$row->exminfo_type.'</span></div></td>';
                    echo '<td width="31" scope="col" align="center">' . $count . '</td>';
                    echo '<td scope="col">จากบริษัท/ห้าง/ร้าน <u>' . $row->libraidet_org . '</u></td>';
                    echo '<td scope="col" align="center">ใบเสร็จเล่มที่ <u>' . $row->libraidet_recptno . '</u></td>';
                    echo '<td scope="col" align="center">จํานวนเงิน <u>' . $row->libraidet_amount . '</u></td>';
                    echo '<td width="31">บาท</td>';

                    echo '</tr>';
                    $count++;
                    $t_amount += $row->libraidet_amount;
                }
                ?>
                <tr>
                    <td colspan="5">
                        รวมจํานวนเงินตามใบเสร็จรับเงินทั้งสิ้น  <u><?php echo number_format($t_amount, 2, '.', ','); ?></u>  บาท  (<u><?php echo $thaibathtext1; ?>บาทถ้วน</u>)
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="100%" valign="middle">
            <p>&nbsp;</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติเงินยืม จำนวน  &nbsp;&nbsp;<u><?php echo number_format($model->libaid_reqamount, 2, '.', ','); ?></u>&nbsp;&nbsp;บาท&nbsp;
                (<?php echo $thaibathtext2; ?>บาทถ้วน) ให้ด้วย จะเป็นพระคุณยิ่ง </p>
        </td>
    </tr>
    <!-- 1 -->
    <tr>
        <td width="100%" valign="top">
            <div align="center">
                <center>
                    <table border="0" cellpadding="3" cellspacing="0" width="100%" class="style4">
                        <tr>
                            <td width="44%">&nbsp;</td>
                            <td width="33%" align="center">
                                <p>&nbsp;</p>
                                <span class='style4'><strong>(ลงชื่อ)</strong>......................................................<br>
                                    (
                                    <?php
                                    //echo $fulldata->profile->profilePrefix->name_th.' '.$fulldata->profile->firstname.' '.$fulldata->profile->lastname;
                                    echo $model->libaidSt->title->name_th . ' ' . $model->libaidSt->getFullname('th');
                                    ?>)<br>
                    <strong>ตำแหน่ง</strong> <?php echo $model->libaidSt->position->name_th; ?><br>
                            </td>
                        </tr>
                    </table>
                </center>
            </div>
        </td>
    </tr>
    <!-- end 1 -->
</table>
</body>