<?php
//use Yii;
use yii\helpers\Html;

?>

<body>
<div align="center">
    <table align="center" width="650" border="0" style="background-color:#fff;">
        <tr>
            <td class="tbhead">
                <p align="center">แบบฟอร์มขอใช้งานบัญชี PSU Passport ชั่วคราวของคณะวิทยาการสื่อสาร
                    มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตปัตตานี</p></td>
        </tr>
        <tr>
            <td class="tbcontent">
                1. ข้าพเจ้า .....<a><?php echo $model->ppSt->getFullname('th'); ?></a>
                ..... งาน .....<a><?php echo $model->ppJ->stc_name; ?></a>.....<br/>
                &nbsp;&nbsp;&nbsp; สังกัด .....<a>คณะวิทยาการสื่อสาร</a>..... &nbsp;&nbsp;&nbsp; โทรศัพท์
                .....<a><?php echo $intmdl->number; ?></a>..... &nbsp;&nbsp;&nbsp; <br/>
                &nbsp;&nbsp;&nbsp; Email .....<a><?php echo $model->ppSt->user->email; ?></a>.....
            </td>
        </tr>
        <tr>
            <td class="tbcontent"> 2. ขอเปิดการใช้งานบัญชี PSU Passport ชั่วคราว(สำหรับการใช้งาน internet)<br/>
                โดยใช้กับงาน/โครงการ/กิจกรรม ...<a><?php echo $model->pp_actname; ?></a>...<br/>
                จำนวน ...<a><?php echo $model->pp_accountnum; ?></a>... บัญชี ตั้งแต่วันที่
                ..<a><?php echo \Yii::$app->formatter->asDate($model->pp_bdate, "long"); ?></a>.. ถึงวันที่
                ..<a><?php echo \Yii::$app->formatter->asDate($model->pp_edate, "long"); ?></a>..
            </td>
        </tr>
        <tr>
            <td><p><strong>ข้อกำหนดการใช้งานบัญชีผู้ใช้งานชั่วคราว</strong><strong> </strong><br/>
                </p>
                <ol>
                    <li>ให้เก็บข้อมูลผู้ใช้งานก่อนให้บัญชีผู้ใช้งาน เพื่อสามารถยืนยันตัวบุคคลได้ในกรณีที่มีการกระทำผิด
                        พรบ. ๒๕๕๐
                    </li>
                    <li>ถ้าเป็นไปได้ให้ถ่ายสำเนาบัตรประชาชน ลงสำเนาถูกต้อง พร้อมทั้งจดชื่อบัญชีเก็บไว้เป็นเวลา ๙๐ วัน
                        เพื่อเป็นหลักฐานในการยืนยันตัวบุคคลอีกชั้นหนึ่ง
                        <table width="95%" border="0">
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>(ลงชื่อ) .......................................... ผู้ขอ<br/>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(
                                    <a><?php echo $model->ppSt->getFullname('th'); ?></a> )
                                </td>
                                <td>(ลงชื่อ) ...................................... เจ้าหน้าที่<br/>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( อับดุลอาซิส ดือราแม )
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a><?php echo \Yii::$app->formatter->asDate($model->ss->updated_at, "long"); ?></a>
                                </td>
                                <td></td>
                            </tr>
                        </table>
                    </li>
                </ol>
            </td>
        </tr>
    </table>
</div>
</body>