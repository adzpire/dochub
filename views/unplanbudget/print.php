<?php
//use Yii;
use yii\helpers\Html;
use backend\components\ThaibudgetyearWidget;
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
        <td width="100%"><span class="style4">ส่วนงาน&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $model->unpbdgt_job; ?>
                คณะวิทยาการสื่อสาร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>โทร</strong>. <?php echo $intmdl->number; ?></span>
        </td>
    </tr>
    <tr>
        <td width="100%">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="style4">
                <tr>
                    <td width="60%" class="style4"><strong>ที่</strong>&nbsp; 861/ -</td>
                    <td width="40%" class="style4"><strong>วันที่</strong> &nbsp;
                        &nbsp; <?php echo \Yii::$app->formatter->asDate($model->unpbdgt_date, "long"); ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="100%" height="30">
            <span class='style4'><strong>เรื่อง</strong> &nbsp;
                ขออนุมัติจัดซื้อครุภัณฑ์นอกแผนการจัดซื้อประจําปี <?= ThaibudgetyearWidget::widget([
                    'date' => $model->unpbdgt_date,
                ]) ?>
            </span>
        </td>
    </tr>
    <tr>
        <td width="100%"><span
                    class='style4'><strong>เรียน</strong>&nbsp;&nbsp;&nbsp;คณบดี </span></td>
    </tr>
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td width="100%" height="83">
            <span class='style4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วย <u>
                    <?php echo $model->unpbdgt_job;
                    ?></u> &nbsp;&nbsp;&nbsp; มีความประสงค์ขออนุมัติจัดซื้อ ครุภัณฑ์นอกแผนการจัดซื้อประจําปี <?= ThaibudgetyearWidget::widget([
                    'date' => $model->unpbdgt_date,
                ]) ?>&nbsp;&nbsp;&nbsp;จำนวน&nbsp;<u><?php echo count($details); ?></u>
                    รายการ&nbsp;&nbsp;เพื่อใช้สำหรับ
                    &nbsp;<u><?php echo $model->unpbdgt_reason; ?></u>
                    &nbsp;&nbsp;ดังรายการต่อไปนี้&nbsp;
                </u>
            </span>
        </td>
    </tr>
    <tr>
        <td width="100%">
            <table width="100%" border="1" cellpadding="0" cellspacing="0">
                <tr>
                    <th width="45px">ลำดับที่</th>
                    <th width="300px" align="center">รายการ</th>
                    <th width="45px">จำนวน</th>
                    <th width="50px">หน่วยนับ</th>
                    <th width="50px">ราคาที่สืบทราบต่อหน่วย</th>
                    <th width="100px" align="center">รวมเงิน(บาท)</th>
                </tr>
                <?php
                $t_amount = 0;
                $count = 1;
                foreach ($details as $row) {
                    echo '<tr>';
                    //echo '<td width="31" scope="col">&nbsp;</td>';
                    //echo '<td><div align="left" ><span > &nbsp;'.$row->exminfo_type.'</span></div></td>';
                    echo '<td scope="col" align="center">' . $count . '</td>';
                    echo '<td scope="col">&nbsp; &nbsp;' . $row->unpbdgtdet_title . '</td>';
                    echo '<td scope="col" align="center">' . $row->unpbdgtdet_amount . '</td>';
                    echo '<td scope="col" align="center">' . $row->unpbdgtdet_unit . '</td>';
                    echo '<td scope="col" align="right">';
                    echo number_format($row->unpbdgtdet_xpecprice, 2, '.', ',') . '';
                    echo '</td>';
                    echo '<td scope="col" align="right">';
                    echo number_format($row->unpbdgtdet_price, 2, '.', ',') . '';
                    echo '</td>';

                    echo '</tr>';
                    $count++;
                    $t_amount += $row->unpbdgtdet_price;
                }
                ?>
                <tr>
                    <td colspan="5" scope="col" align="right">
                        <?php if ($model->unpbdgt_tax == 1) {
                            $t_amount *= 1.07;
                            echo '<strong><u>เพิ่มการคิดภาษี 7%</u></strong>';
                        }
                        ?>
                        &nbsp;รวมเป็นเงินทั้งสิ้น&nbsp;&nbsp;(<?php echo $thaibathtext; ?>)
                    </td>
                    <td scope="col" align="right">
                        <?php echo number_format($t_amount, 2, '.', ','); ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อโปรดพิจาณาอนุมัติจัดซื้อพัสดุดังกล่าว จะเป็นพระคุณยิ่ง
        </td>
    </tr>
    <tr>
        <td width="100%">
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="56%">&nbsp;</td>
                    <td width="44%" align="center">
                            <strong>(ลงชื่อ)</strong>...................................................... ผู้ขอจัดหา<br>
                            (<?php echo $model->unpbdgtSt->title->name_th . ' ' . $model->unpbdgtSt->getFullname('th'); ?>)<br>
                            <strong>ตำแหน่ง</strong> <?php echo $model->unpbdgtSt->position->name_th; ?><br>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="100%">
            <table border="1" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="50%" valign="top">
                        <strong>1.  ความเห็นหัวหน้าเจ้าหน้าที่พัสดุ</strong><br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เรียน คณบดี<br />
                        &nbsp;&nbsp;&nbsp;................................................................<br />
                        &nbsp;&nbsp;&nbsp;.................................................................<br />
                        <p>&nbsp;</p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        .......................................... <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        (นางแก่นจันทร์  มูสิกธรรม)<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ………/……………………./…………….</td>
                    <td width="50%" valign="top">
                        <strong>2.  ความเห็นเจ้าหน้าที่งานนโยบายและวางแผน</strong><br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เรียน  คณบดี<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1)     เห็นสมควรอนุมัติตามรายการลำดับที่ ............. <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2)     โดยใช้เงิน ........................................................<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.............................................<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3)  อื่น ๆ    ...............................................<br />
                        <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        .......................................... <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        (นางสาวพิมพ์ชนก  พลวรรณ)<br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ………/……………………./…………….</td>
                </tr>
                <tr>
                    <td width="100%" colspan="2" valign="top">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <p>
                                        <strong>3.  ความเห็นของคณบดี</strong><br />
                                        &nbsp;&nbsp;&nbsp;&nbsp;&#9744; อนุมัติ ………………………………………………………..<br />
                                        &nbsp;&nbsp;&nbsp;&nbsp;&#9744; ไม่อนุมัติ เนื่องจาก ...................................................
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="660px" align="center">
                                    ............................................... <br />
                                    (ดร.มูอัสซัล บิลแสละ)<br />
                                    คณบดีคณะวิทยาการสื่อสาร<br />
                                    ………/……………………./…………….
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>