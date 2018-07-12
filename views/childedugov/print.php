<?php
//use Yii;
use yii\helpers\Html;

$checkedbox = '<img width="16" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDMyIDMyIiBoZWlnaHQ9IjMycHgiIGlkPSLQodC70L7QuV8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAzMiAzMiIgd2lkdGg9IjMycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnIGlkPSJDaGVja19TcXVhcmUiPjxwYXRoIGQ9Ik0zMCwwSDJDMC44OTUsMCwwLDAuODk1LDAsMnYyOGMwLDEuMTA1LDAuODk1LDIsMiwyaDI4YzEuMTA0LDAsMi0wLjg5NSwyLTJWMkMzMiwwLjg5NSwzMS4xMDQsMCwzMCwweiAgICBNMzAsMzBIMlYyaDI4VjMweiIgZmlsbD0iIzEyMTMxMyIvPjxwYXRoIGQ9Ik0xMi4zMDEsMjIuNjA3YzAuMzgyLDAuMzc5LDEuMDQ0LDAuMzg0LDEuNDI5LDBsMTAuOTk5LTEwLjg5OWMwLjM5NC0wLjM5LDAuMzk0LTEuMDI0LDAtMS40MTQgICBjLTAuMzk0LTAuMzkxLTEuMDM0LTAuMzkxLTEuNDI4LDBMMTMuMDExLDIwLjQ4OGwtNC4yODEtNC4xOTZjLTAuMzk0LTAuMzkxLTEuMDM0LTAuMzkxLTEuNDI4LDBjLTAuMzk1LDAuMzkxLTAuMzk1LDEuMDI0LDAsMS40MTQgICBMMTIuMzAxLDIyLjYwN3oiIGZpbGw9IiMxMjEzMTMiLz48L2c+PGcvPjxnLz48Zy8+PGcvPjxnLz48Zy8+PC9zdmc+" >';
$uncheckbox = '<img width="16" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAHUlEQVQ4jWNgYGD4TyGGEGSCUQNGDRg1gNoGkI0BF6E7xdLOry8AAAAASUVORK5CYII=" >';
?>

<body>
<div align="center">
    <table align="center" width="650" border="0" style="background-color:#fff;">
        <tr>
            <td class="tbhead" align="right">
                <p>แบบ 7223</p>
            </td>
        </tr>
        <tr>
            <td class="tbhead" align="center">
                <p>
                    ใบเบิกเงินสวัสดิการเกี่ยวกับการศึกษาของบุตร <br>
                    โปรดทำเครื่องหมาย
                    <!-- checkmark image -->
                    <img width="16" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDMyIDMyIiBoZWlnaHQ9IjMycHgiIGlkPSLQodC70L7QuV8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAzMiAzMiIgd2lkdGg9IjMycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTI3LjcwNCw4LjM5N2MtMC4zOTQtMC4zOTEtMS4wMzQtMC4zOTEtMS40MjgsMCAgTDExLjk4OCwyMi41OWwtNi4yODItNi4xOTNjLTAuMzk0LTAuMzkxLTEuMDM0LTAuMzkxLTEuNDI4LDBjLTAuMzk0LDAuMzkxLTAuMzk0LDEuMDI0LDAsMS40MTRsNi45OTksNi44OTkgIGMwLjM5LDAuMzg2LDEuMDM5LDAuMzg2LDEuNDI5LDBMMjcuNzA0LDkuODExQzI4LjA5OSw5LjQyMSwyOC4wOTksOC43ODcsMjcuNzA0LDguMzk3QzI3LjMxLDguMDA2LDI4LjA5OSw4Ljc4NywyNy43MDQsOC4zOTd6IiBmaWxsPSIjMTIxMzEzIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGlkPSJDaGVjayIvPjxnLz48Zy8+PGcvPjxnLz48Zy8+PGcvPjwvc3ZnPg==" >
                    ลงในช่องว่าง
                    <!-- checkedbox image -->
                    <?php echo $checkedbox ?>
                    <!-- uncheckedbox image
                    <img width="16" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAHUlEQVQ4jWNgYGD4TyGGEGSCUQNGDRg1gNoGkI0BF6E7xdLOry8AAAAASUVORK5CYII=" >-->
                    พร้อมทั้งกรอกข้อความเท่าที่จำเป็น
                </p>
            </td>
        </tr>
    </table>
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
        <tr>
            <td class="tbcontent">
                1. ข้าพเจ้า .....<u><?php echo $model->cegSt->getFullname('th'); ?></u>
                ... ตำแหน่ง ...<u><?php echo $model->cegSt->position->name_th; ?></u>.....<br/>
                &nbsp;&nbsp;&nbsp; สังกัด .....<u>คณะวิทยาการสื่อสาร</u>.....
            </td>
        </tr>
        <tr>
            <td class="tbcontent">
                <p> 2. คู่สมรสของข้าพเจ้า ชื่อ ...<u><?php echo $model->ceg_spname; ?></u>...<br />
                    <?php
                    echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                    if($model->ceg_spjobtype == '1'){
                        echo $checkedbox;
                    }else {echo $uncheckbox;
                    }
                    echo '&nbsp;&nbsp;ไม่เป็นข้าราชการประจำหรือลูกจ้างประจำ<br />';

                    echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                    if($model->ceg_spjobtype == '2'){
                        echo $checkedbox;
                    }else {
                        echo $uncheckbox;
                    }
                    echo '  เป็นข้าราชการ  ';

                    echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                    if($model->ceg_spjobtype == '3'){
                        echo $checkedbox;
                    }else {
                        echo $uncheckbox;
                    }
                    if($model->ceg_spjobtype == '4'){
                        echo '  ลูกจ้างประจำ ตำแหน่ง ...<u>-</u>...&nbsp;&nbsp;&nbsp;สังกัด ...<u>-</u>...<br />';

                        echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                        echo $checkedbox.'  เป็นพนักงานหรือลูกจ้างในรัฐวิสาหกิจ / หน่วยงานของทางราชการ ราชการส่วนท้องถิ่น กรุงเทพมหานคร องค์กรอิสระ องค์การมหาชน หรือหน่วยงานอื่นใด<br />&nbsp;&nbsp;&nbsp;&nbsp;ตำแหน่ง ...<u>'.$model->ceg_spposition.'</u>... สังกัด ...<u>'.$model->ceg_spbelong.'</u>...';
                    }else {
                        echo '  ลูกจ้างประจำ ตำแหน่ง ...<u>'.$model->ceg_spposition.'</u>...&nbsp;&nbsp;&nbsp;สังกัด ...<u>'.$model->ceg_spbelong.'</u>...<br />';

                        echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                        echo $uncheckbox.'  เป็นพนักงานหรือลูกจ้างในรัฐวิสาหกิจ / หน่วยงานของทางราชการ ราชการส่วนท้องถิ่น กรุงเทพมหานคร องค์กรอิสระ องค์การมหาชน หรือหน่วยงานอื่นใด<br />&nbsp;&nbsp;&nbsp;&nbsp;ตำแหน่ง ...<u>-</u>... สังกัด ...<u>-</u>...';
                    }
                    ?>
                </p>
            </td>
        </tr>
        <tr>
            <td class="tbcontent">
                <p>
                    4. ข้าพเจ้าได้จ่ายเงินสำหรับการศึกษาบุตร ดังนี้<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    if($model->ceg_feetype == '1'){
                        echo $checkedbox;
                    }else{ echo $uncheckbox;
                    }
                    ?>  [1] เงินบำรุงการศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    if($model->ceg_feetype == '2'){
                        echo $checkedbox;
                    }else {echo $uncheckbox;
                    }
                    ?>  [2] เงินค่าเล่าเรียน
                </p>
                <p>
                1. บุตรชื่อ ...<u><?php echo $model->ceg_ch1name; ?></u>... เกิดเมื่อ ...<u><?php echo \Yii::$app->formatter->asDate($model->ceg_ch1birth, "long"); ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;เป็นบุตรลำดับที่(ของบิดา) ...<u><?php echo $model->ceg_ch1dadorder; ?></u>... เป็นบุตรลำดับที่(ของมารดา) ...<u><?php echo $model->ceg_ch1momorder; ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;(กรณีเป็นบุตรแทนที่บุตรซึ่งถึงแก่กรรมแล้ว) แทนที่บุตรลำดับที่ ...<u><?php echo $model->ceg_ch1reporder; ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;ชื่อ ...<u><?php echo $model->ceg_ch1repname; ?></u>... เกิดเมื่อ ...<u><?php echo \Yii::$app->formatter->asDate($model->ceg_ch1repbirth, "long"); ?></u>... ถึงแก่กรรมเมื่อ  ...<u><?php echo \Yii::$app->formatter->asDate($model->ceg_ch1repdeath, "long"); ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;สถานศึกษา ...<u><?php echo $model->ceg_ch1schl; ?></u>... อำเภอ ...<u><?php echo $model->cegCh1schlamphur->AMPHUR_NAME; ?></u>... จังหวัด ...<u><?php echo $model->cegCh1schlprovince->PROVINCE_NAME; ?></u>...<br />
                </p>
                <table style="padding-left:12px; " width="550">
                    <tr>
                        <td width="248">ชั้นที่ศึกษา ...<u><?php echo $model->ceg_ch1schlclass; ?></u>... </td>
                        <td width="290"><?php
                            if($model->ceg_ch1fee1 !== '0'){
                                echo $checkedbox;
                            }else
                                echo $uncheckbox;
                            ?>
                            [1] จำนวน ...<u><?php echo number_format($model->ceg_ch1fee1,2,'.',','); ?></u>... บาท</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><?php if(!empty($model->ceg_ch1fee2)){
                            echo $checkedbox;
                        }else
                            echo $uncheckbox;
                        ?>
                            [2] จำนวน ...<u><?php echo (!empty($model->ceg_ch1fee2)) ? number_format($model->ceg_ch1fee2,2,'.',',') : $model->ceg_ch1fee2 ?></u>... บาท</td>
                    </tr>
                </table>
                <p>
                2. บุตรชื่อ ...<u><?php echo $model->ceg_ch2name; ?></u>... เกิดเมื่อ ...<u><?php echo \Yii::$app->formatter->asDate($model->ceg_ch2birth, "long"); ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;เป็นบุตรลำดับที่(ของบิดา) ...<u><?php echo $model->ceg_ch2dadorder; ?></u>... เป็นบุตรลำดับที่(ของมารดา) ...<u><?php echo $model->ceg_ch2momorder; ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;(กรณีเป็นบุตรแทนที่บุตรซึ่งถึงแก่กรรมแล้ว) แทนที่บุตรลำดับที่ ...<u><?php echo $model->ceg_ch2reporder; ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;ชื่อ ...<u><?php echo $model->ceg_ch2repname; ?></u>... เกิดเมื่อ ...<u><?php echo \Yii::$app->formatter->asDate($model->ceg_ch2repbirth, "long"); ?></u>... ถึงแก่กรรมเมื่อ  ...<u><?php echo \Yii::$app->formatter->asDate($model->ceg_ch2repdeath, "long"); ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;สถานศึกษา ...<u><?php echo $model->ceg_ch2schl; ?></u>... อำเภอ ...<u><?php echo $model->cegCh2schlamphur->AMPHUR_NAME; ?></u>... จังหวัด ...<u><?php echo $model->cegCh2schlprovince->PROVINCE_NAME; ?></u>...<br />
                </p>
                <table style="padding-left:12px; " width="550">
                    <tr>
                        <td width="248">ชั้นที่ศึกษา ...<u><?php echo $model->ceg_ch2schlclass; ?></u>... </td>
                        <td width="290"><?php
                            if(!empty($model->ceg_ch2fee1)){
                                echo $checkedbox;
                            }else
                                echo $uncheckbox;
                            ?>
                            [1] จำนวน ...<u><?php echo (!empty($model->ceg_ch2fee1)) ? number_format($model->ceg_ch2fee1,2,'.',',') : $model->ceg_ch2fee1 ?></u>... บาท</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><?php if(!empty($model->ceg_ch2fee2)){
                                echo $checkedbox;
                            }else
                                echo $uncheckbox;
                            ?>
                            [2] จำนวน ...<u><?php echo (!empty($model->ceg_ch2fee2)) ? number_format($model->ceg_ch2fee2,2,'.',',') : $model->ceg_ch2fee2 ?></u>... บาท</td>
                    </tr>
                </table>
                <p>
                    3. บุตรชื่อ ...<u><?php echo $model->ceg_ch3name; ?></u>... เกิดเมื่อ ...<u><?php echo \Yii::$app->formatter->asDate($model->ceg_ch3birth, "long"); ?></u>...<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;เป็นบุตรลำดับที่(ของบิดา) ...<u><?php echo $model->ceg_ch3dadorder; ?></u>... เป็นบุตรลำดับที่(ของมารดา) ...<u><?php echo $model->ceg_ch3momorder; ?></u>...<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;(กรณีเป็นบุตรแทนที่บุตรซึ่งถึงแก่กรรมแล้ว) แทนที่บุตรลำดับที่ ...<u><?php echo $model->ceg_ch3reporder; ?></u>...<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;ชื่อ ...<u><?php echo $model->ceg_ch3repname; ?></u>... เกิดเมื่อ ...<u><?php echo \Yii::$app->formatter->asDate($model->ceg_ch3repbirth, "long"); ?></u>... ถึงแก่กรรมเมื่อ  ...<u><?php echo \Yii::$app->formatter->asDate($model->ceg_ch3repdeath, "long"); ?></u>...<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;สถานศึกษา ...<u><?php echo $model->ceg_ch3schl; ?></u>... อำเภอ ...<u><?php echo $model->cegCh3schlamphur->AMPHUR_NAME; ?></u>... จังหวัด ...<u><?php echo $model->cegCh3schlprovince->PROVINCE_NAME; ?></u>...<br />
                </p>
                <table style="padding-left:12px; " width="550">
                    <tr>
                        <td width="248">ชั้นที่ศึกษา ...<u><?php echo $model->ceg_ch3schlclass; ?></u>... </td>
                        <td width="290"><?php
                            if(!empty($model->ceg_ch3fee1)){
                                echo $checkedbox;
                            }else
                                echo $uncheckbox;
                            ?>
                            [1] จำนวน ...<u><?php echo (!empty($model->ceg_ch3fee1)) ? number_format($model->ceg_ch3fee1,2,'.',',') : $model->ceg_ch3fee1 ?></u>... บาท</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><?php if(!empty($model->ceg_ch3fee2)){
                                echo $checkedbox;
                            }else
                                echo $uncheckbox;
                            ?>
                            [2] จำนวน ...<u><?php echo (!empty($model->ceg_ch3fee2)) ? number_format($model->ceg_ch3fee2,2,'.',',') : $model->ceg_ch3fee2 ?></u>... บาท</td>
                    </tr>
                </table>
                <p>&nbsp;</p>
            </td>
        </tr>
    </table>
</div>
<pagebreak />
<div align="center">
    <p align="center">- 2 -</p>
    <table align="center" width="650" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
        <tr>
            <td class="tbcontent">5. ข้าพเจ้าขอรับเงินสวัสดิการเกี่ยวกับการศึกษาของบุตร<br />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <?php if($model->ceg_feeright == '1'){echo $checkedbox;}else echo $uncheckbox; ?>
                ตามสิทธิ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php if($model->ceg_feeright == '2'){echo $checkedbox;}else echo $uncheckbox; ?>
                เฉพาะส่วนที่ยังขาดจากสิทธิ รวมเป็นเงิน ...<u>
                    <?php  echo number_format($model->ceg_money,2,'.',','); ?>
                </u>... บาท <br />
                &nbsp;&nbsp;&nbsp;&nbsp;( ...<u><?php echo $model->ceg_info; ?></u>... )
            </td>
        </tr>
        <tr>
            <td class="tbcontent">
                <p>      6. เสนอ  ...<u>คณบดี</u>...<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;<?php if($model->ceg_agree == '1'){echo $checkedbox;}else echo $uncheckbox; ?> ข้าพเจ้ามีสิทธิ์ได้รับเงินช่วยเหลือตามพระราชกฤษฏีกาเงินสวัสดิการเกี่ยวกับการศึกษาของบุตร และข้อความที่ระบุข้างต้นเป้นความจริง <br />
                    &nbsp;&nbsp;&nbsp;&nbsp;<?php if($model->ceg_agree == '2'){echo $checkedbox;}else echo $uncheckbox; ?> บุตรของข้าพเจ้าอยู่ในข่ายได้รับความช่วยเหลือตามพระราชกฤษฏีกาเงินสวัสดิการเกี่ยวกับการศึกษาบุตร<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;<?php if($model->ceg_agree == '4'){echo $checkedbox;}else echo $uncheckbox; ?> เป็นผู้ใช้สิทธิเบิกเงินช่วยเหลือตามพระราชกฤษฏีกาเงินสวัสดิการเกี่ยวกับการศึกษาบุตร แต่เพียงฝ่ายเดียว<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;<?php if($model->ceg_agree == '3'){echo $checkedbox;}else echo $uncheckbox; ?> คู่สมรสของข้าพเจ้าได้รับความช่วยเหลือจากรัฐวิสาหกิจ หน่วยงานของทางราชการ ราชการส่วนท้องถิ่น กรุงเทพมหานคร องค์กรอิสระ องค์การมหาชน หรือหน่วยงานอื่นใด ต่ำกว่าจำนวนที่ได้รับจากทางราช จำนวน ...<u><?php echo number_format($model->ceg_agreemoney,2,'.',','); ?></u>... บาท
                </p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ข้าพเจ้าขอรับรองว่ามีสิทธิเบิกได้ตามกฏหมาย ตามจำนวนที่ขอเบิก
                <table align="center">
                    <tr>
                        <td>
                            <p>(ลงชื่อ) .............................. ผู้ขอรับเงินสวัสดิการ</p>
                        </td>
                    </tr>
                </table>
                <table align="center">
                    <tr>
                        <td>
                            <p>(....<u><?php echo $model->cegSt->getFullname('th'); ?></u>....)</p>
                        </td>
                    </tr>
                </table>
                <table align="center">
                    <tr>
                        <td>
                            <p>วันที่ ...<u><?php echo \Yii::$app->formatter->asDate($model->ceg_date, "long"); ?></u>...</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="tbcontent">
                7. คำอนุมัติ<br />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อนุมัติให้เบิกจ่ายได้<br />
                <p>&nbsp;</p>
                <table align="center">
                    <tr>
                        <td>
                            <p>(ลงชื่อ) .........................................</p>
                        </td>
                    </tr>
                </table>
                <table align="center">
                    <tr>
                        <td>
                            <p>( ........................................................ )</p>
                        </td>
                    </tr>
                </table>
                <table align="center">
                    <tr>
                        <td>
                            <p>ตำแหน่ง ........................................</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="tbcontent">
                <p>8. ใบรับเงิน<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ได้รับเงินสวัสดิการเกี่ยวกับการศึกษาบุตร จำนวน ...<u><?php echo number_format($model->ceg_money,2,'.',','); ?></u>... บาท<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;( ...<u><?php echo $thaibathtext; ?></u>... ) ไปถูกต้องแล้ว
                </p>
                <table align="center">
                    <tr>
                        <td>
                            (ลงชื่อ) .............................................. ผู้รับเงิน
                        </td>
                    </tr>
                </table>
                <table align="center">
                    <tr>
                        <td>
                            ( ..................................................... )
                        </td>
                    </tr>
                </table>
                <table align="center">
                    <tr>
                        <td>
                            <p>ลงชื่อ)............................................... ผู้จ่ายเงิน</p>
                        </td>
                    </tr>
                </table>
                <table align="center">
                    <tr>
                        <td>
                            <p>( ..................................................... ) </p>
                        </td>
                    </tr>
                </table>
                <table align="center">
                    <tr>
                        <td>
                            <p>วันที่ ............................................. </p>
                        </td>
                    </tr>
                </table>
                <table align="center">
                    <tr>
                        <td>
                            <p>(ลงชื่อต่อเมื่อได้รับเงินแล้วเท่านั้น)</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;คำชี้แจง</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;[ก] ให้ระบุการมีสิทธิเพียงใด เมื่อเทียบกับสิทธิที่ได้รับตามพระราชกฤษฏีกาเงินสวัสดิการเกี่ยวกับการศึกษาของบุตร</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;[ข] ให้เสนอต่อผู้มีอำนาจอนุมัติ</p>
</div>
</body>