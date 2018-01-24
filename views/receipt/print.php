<?php
//use Yii;
use yii\helpers\Html;

?>

<body>
<h2 align="center">ใบสำคัญรับเงิน</h2>
<p>&nbsp;</p>
<table width="660" border="0" align="center" cellpadding="0" cellspacing="0" class="style4">
    <tr>
        <td width="60%">
            &nbsp;
        </td>
        <td width="40%">
            <p>วันที่ <u><?php echo \Yii::$app->formatter->asDate($model->rc_date, "long"); ?></u></p>
        </td>
    </tr>
</table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <?php if($model->rc_paid == NULL): ?>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า&nbsp;
            ........................................................................
            อยู่บ้านเลขที่
            ............................
            หมู่ที่
            ............................
        </p>
        <p>
            ตำบล ......................................................
            อำเภอ ......................................................
            จังหวัด ......................................................
        </p>
    <?php else: ?>
        <p style="line-height: 30px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า&nbsp; <u>
                <?php echo $model->rcSt->title->name_th . ' ' . $model->rcSt->getFullname('th'); ?></u>
            &nbsp;<u><?php echo $model->rcPa->getFullAddress(); ?></u>
        </p>
    <?php endif; ?>

    <p>ได้รับเงินจาก&nbsp;&nbsp;<u><?php echo $model->rc_getfrom; ?></u> ดังรายการต่อไปนี้</p>

<table width="660" border="1" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th align="center" scope="col">รายการ</th>
        <th align="center" colspan="2" rowspan="1" scope="col">จำนวนเงิน</th>
    </tr>
    </thead>
    <tbody>
    <?php $t_amount = 0;
    foreach ($details as $row) {
        echo '<tr>';
        //echo '<td width="31" scope="col">&nbsp;</td>';
        //echo '<td><div align="left" ><span > &nbsp;'.$row->exminfo_type.'</span></div></td>';
        echo '<td>&nbsp; &nbsp;' . $row->rcd_detail . '</td>';
        echo '<td align="center" width="70">' . $row->rcd_amount . '</td>';
        echo '<td align="center" width="40">00</td>';
        echo '</tr>';
        $t_amount += $row->rcd_amount;
    }
    ?>
    <tr>
        <td align="right">จำนวนเงินรวมทั้งสิ้น(บาท)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td align="center"><?php echo $t_amount; ?></td>
        <td align="center">00</td>
    </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<table width="660" border="0" align="center" cellpadding="0" cellspacing="0" class="style4">
    <tr>
        <td width="40%">
            &nbsp;
        </td>
        <td width="60%">
            <p>จำนวนเงิน <u><?php echo $thaibathtext; ?></u></p>
        </td>
    </tr>
</table>
<table width="660" border="0" align="center" cellpadding="0" cellspacing="0" class="style4">
    <tr>
        <td width="50%">
            &nbsp;
        </td>
        <td width="50%">
            <p>&nbsp;</p>
            <p>(ลงชื่อ) ...................................................... ผู้รับเงิน</p>
            <p>&nbsp;</p>
            <p>(ลงชื่อ) ...................................................... ผู้จ่ายเงิน</p>
        </td>
    </tr>
</table>
</body>