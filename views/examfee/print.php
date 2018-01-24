<?php
//use Yii;
use yii\helpers\Html;

?>

<body>
<div align="center">
    <p align="center">ใบเบิกค่าตรวจสอบข้อสอบ</p>
    <p align="center">คณะวิทยาการสื่อสาร มหาวิทยาลัยสงขลานครินคร์ วิทยาเขตปัตตานี</p>
    <p align="center">การสอบประจําภาคเรียนที่ <u><?php echo $model->exmmain_semester; ?></u>
        ปีการศึกษา <u><?= \Yii::$app->formatter->asDate('1/1/'.$model->exmmain_year, 'yyyy'); ?></u></p>
    <p align="center">ชื่อ <u><?php echo $model->exmmainSt->getFullname('th');; ?></u> คณะวิทยาการสื่อสาร</p>
    <table align="center" width="650" border="0" style="background-color:#fff;">
        <tr>
            <td width="100%">
                <table width="100%" border="1" cellpadding="0" cellspacing="0">
                    <tr>
                        <th width="45px">ลำดับที่</th>
                        <th width="200px" align="center">วิชาที่สอน</th>
                        <th width="60px">ชนิดข้อสอบ</th>
                        <th width="60px">ระดับ</th>
                        <th width="50px">เวลา(ชั่วโมง)</th>
                        <th width="50px">จํานวนนักศึกษาเข้าสอบ</th>
                        <th width="50px">ค่าตรวจข้อสอบ</th>
                        <th width="100px" align="center">หมายเหตุ</th>
                    </tr>
                    <?php
                    $t_amount = 0;$t_hour = 0;$t_std = 0;
                    $count = 1;
                    foreach ($details as $row) {
                        echo '<tr>';
                        //echo '<td width="31" scope="col">&nbsp;</td>';
                        //echo '<td><div align="left" ><span > &nbsp;'.$row->exminfo_type.'</span></div></td>';
                        echo '<td scope="col" align="center">' . $count . '</td>';
                        echo '<td scope="col"> ' . $row->exminfoCourse->c_nameTh . '</td>';
                        echo '<td scope="col"> ' . $row->etype . '</td>';
                        echo '<td scope="col"> ' . $row->degree . '</td>';
                        echo '<td scope="col" align="center">' . $row->exminfo_hour . '</td>';
                        echo '<td scope="col" align="center">' . $row->exminfo_stdamount . '</td>';
                        echo '<td scope="col" align="center">' . number_format($row->exminfo_fee, 2, '.', ','). '</td>';
                        echo '<td scope="col"> ' . $row->exminfo_note . '</td>';

                        echo '</tr>';
                        $count++;
                        $t_amount += $row->exminfo_fee;
                        $t_hour += $row->exminfo_hour;
                        $t_std += $row->exminfo_stdamount;
                    }
                    ?>
                    <tr>
                        <td colspan="4" scope="col" align="right"> รวม </td>
                        <td scope="col" align="center"><?php echo $t_hour; ?></td>
                        <td scope="col" align="center"><?php echo $t_std; ?></td>
                        <td scope="col" align="center">
                            <?php echo number_format($t_amount, 2, '.', ','); ?>
                        </td>
                        <td scope="col"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td width="100%">
                <table style="border-bottom: 1px solid;" width="100%" border="0" cellpadding="0" cellspacing="0" class="style4">
                    <tr>
                        <td width="60%" class="style4"></td>
                        <td width="40%" class="style4"><strong>เงินค่าออกข้อสอบและตรวจข้อสอบ</strong> &nbsp;
                             <u><?php echo number_format($t_amount, 2, '.', ','); ?></u> บาท
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td width="60%" class="style4"></td>
                        <td width="40%" class="style4"><strong>ลายเซ็น</strong> &nbsp;
                            .................................................................
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td width="100%">
                <table style="border-bottom: 1px solid;" width="100%" border="0" cellpadding="0" cellspacing="0" class="style4">
                    <tr>
                        <td width="50%" class="style4" align="center">
                            <p>ได้ตรวจสอบแล้วว่าถูกต้องและอนุมัติให้จ่ายได้</p>
                            <p>&nbsp;</p>
                            <p>.................................................................</p>
                            <p>คณบดี</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </td>
                        <td width="50%" class="style4">
                            <p>ได้รับเงิน <u><?php echo number_format($t_amount, 2, '.', ','); ?></u> บาท (ตัวอักษร) <u><?php echo $thaibathtext; ?></u> แล้ว</p>
                            <p>&nbsp;</p>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="style4">
                                <tr>
                                    <td align="center">
                                        <p>ลงชื่อ .............................................................</p>
                                        <p>ผู้รับเงิน</p>
                                        <p>&nbsp;</p>
                                        <p>ลงชื่อ .............................................................</p>
                                        <p>ผู้จ่ายเงิน</p>
                                    </td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <u>หมายเหตุ</u><br>
                    1.&nbsp;&nbsp;<u>ระดับปริญญาตรีหรือตํ่ากว่า</u><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.1 &nbsp;คําตอบแบบอัตนัยล้วนชั่วโมงละ 2 บาทไม่เกินวิชาละ 5 บาทต่อผู้เข้าสอบ 1 คน<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2 &nbsp;คําตอบแบบปรนัยล้วนชั่วโมงละ0.50บาทไม่เกินวิชาละ 1.25 บาทต่อผู้เข้าสอบ1คน<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3 &nbsp;คําตอบแบบอัตนัยและปรนัยชั่วโมงละ1บาทไม่เกินวิชา2.50 บาทต่อผู้เข้าสอบ1คน<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.4 &nbsp;สัมภาษณ์หรือภาคปฏิบัติ1บาทต่อผู้เข้าสอบ1คน<br>
                    2.&nbsp;&nbsp;<u>ระดับประกาศนียบัตรชั้นสูงวิชาเฉพาะ(หลังปริญญาตรี)ปริญญาโทปริญญาเอก</u><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.1 &nbsp;คําตอบแบบอัตนัยล้วนชั่วโมงละ 3 บาทต่อผู้เข้าสอบ 1คน<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.2 &nbsp;คําตอบแบบอัตนัยและปรนัยชั่วโมงละ1.50บาทต่อผู้เข้าสอบ1คน <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.3 &nbsp;คําตอบแบบปรนัยล้วนชั่วโมงละ0.75 บาทต่อผู้เข้าสอบ 1คน<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4 &nbsp;สัมภาษณ์หรือภาคปฏิบัติ1บาทต่อผู้เข้าสอบ1คน<br>
                    3.&nbsp;&nbsp;<u>ค่าตรวจกระดาษคําตอบให้เบิกจากเงินงบประมาณรายจ่ายหมวดค่าตอบแทนหรือเงินนอกงบปประมาณ</u>
            </td>
        </tr>
    </table>
</div>
</body>