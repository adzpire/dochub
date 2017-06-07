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
        <td width="100%"><span class="style4">ส่วนงาน&nbsp;&nbsp;&nbsp;&nbsp;
                คณะวิทยาการสื่อสาร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>โทร</strong>. <?php echo $intmdl->number; ?></span>
        </td>
    </tr>
    <tr>
        <td width="100%">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="style4">
                <tr>
                    <td width="60%" class="style4"><strong>ที่</strong>&nbsp; 861/ -</td>
                    <td width="40%" class="style4"><strong>วันที่</strong> &nbsp;
                        &nbsp; <?php echo \Yii::$app->formatter->asDate($model->usebdgt_date, "long"); ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="100%" height="30">
            <span class='style4'><strong>เรื่อง</strong> &nbsp;
                ขออนุมัติใช้เงินประจําปีงบประมาณ <?= \Yii::$app->formatter->asDate('1/1/'.$model->usebdgt_year, 'yyyy'); ?>
                <?php // \Yii::$app->formatter->asDate($model->usebdgt_year); ?>
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
                    <?php echo $model->usebdgtSt->title->name_th . ' ' . $model->usebdgtSt->getFullname('th'); ?></u> &nbsp;&nbsp;&nbsp;  มีความประสงค์ขออนุมัติใช้เงิน เพื่อเป็นค่าใช้จ่ายในการ&nbsp;<u><?php echo $model->usebdgt_reason; ?></u>
                ตามหนังสือที่&nbsp;<u><?php echo $model->usebdgt_bookno; ?></u> ลงวันที่  <u><?php echo \Yii::$app->formatter->asDate($model->usebdgt_bookdate); ?></u> ดังรายละเอียดต่อไปนี้
                </u>
            </span>
        </td>
    </tr>
    <tr>
        <td width="100%">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <?php
                $t_amount = 0;
                $count = 1;
                foreach ($details as $row) {
                    echo '<tr>';
                    //echo '<td width="31" scope="col">&nbsp;</td>';
                    //echo '<td><div align="left" ><span > &nbsp;'.$row->exminfo_type.'</span></div></td>';
                    echo '<td width="45px" scope="col" align="center">' . $count . '</td>';
                    echo '<td scope="col">&nbsp; &nbsp;' . $row->usebdgtdet_title . '</td>';
                    echo '<td width="100px" scope="col" align="center">จำนวนเงิน</td>';
                    echo '<td width="80px" scope="col" align="right">';
                    echo number_format($row->usebdgtdet_amount, 2, '.', ',') . '';
                    echo '</td>';
                    echo '<td width="45px" scope="col" align="right">บาท</td>';
                    echo '</tr>';
                    $count++;
                    $t_amount += $row->usebdgtdet_amount;
                }
                ?>
                <tr>
                    <td colspan="2" scope="col" align="right"></td>
                    <td align="right">
                        &nbsp;รวมเป็นเงินทั้งสิ้น
                    </td>
                    <td align="right">
                    <?php echo number_format($t_amount, 2, '.', ','); ?>
                    </td>
                    <td align="right">บาท
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
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อโปรดพิจาณาอนุมัติใช้เงินจํานวน  <u><?php echo number_format($t_amount, 2, '.', ','); ?></u>  บาท (<?php echo $thaibathtext . 'บาทถ้วน'; ?>)
        </td>
    </tr>
    <tr>
        <td>
            และขอแต่งตั้งกรรมการตรวจรับดังนี้
        </td>
    </tr>
    <tr>
        <td width="80%">
            <table width="250px"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="80px" scope="col" align="right"> </td>
                    <td width="30px">1</td>
                    <td width="180px"><?php echo $model->usebdgtHeadcmitt->getFullname('th'); ?></td>
                    <td width="70px">ประธานกรรมการ</td>
                </tr>
                <tr>
                    <td width="80px" scope="col" align="right"> </td>
                    <td width="30px">2</td>
                    <td width="180px"><?php echo ($model->usebdgtFrstcmitt) ? $model->usebdgtFrstcmitt->getFullname('th') : false; ?></td>
                    <td width="70px">กรรมการ</td>
                </tr>
                <tr>
                    <td width="80px" scope="col" align="right"> </td>
                    <td width="30px">3</td>
                    <td width="180px"><?php echo ($model->usebdgtScndcmitt) ? $model->usebdgtScndcmitt->getFullname('th') : false; ?></td>
                    <td width="70px">กรรมการ</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="100%">
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td width="56%">&nbsp;</td>
                    <td width="44%" align="center">
                            <strong>(ลงชื่อ)</strong>...................................................... ผู้ขอจัดหา<br>
                            (<?php echo $model->usebdgtSt->title->name_th . ' ' . $model->usebdgtSt->getFullname('th'); ?>)<br>
                            <strong>ตำแหน่ง</strong> <?php echo $model->usebdgtSt->position->name_th; ?><br>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

</table>
</body>