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
                <p>แบบ กทพ. 02</p>
            </td>
        </tr>
        <tr>
            <td class="tbhead" align="center">
                <p>
                    ใบเบิกเงินสวัสดิการเกี่ยวกับการศึกษาของบุตรพนักงานมหาวิทยาลัยฯ <br>
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
        <tr>
            <td class="tbcontent">
                1. ข้าพเจ้า .....<u><?php echo $model->ceSt->getFullname('th'); ?></u>
                ... ตำแหน่ง ...<u><?php echo $model->ceSt->position->name_th; ?></u>.....<br/>
                &nbsp;&nbsp;&nbsp; สังกัด .....<u>คณะวิทยาการสื่อสาร</u>..... &nbsp;&nbsp;&nbsp; โทรศัพท์
                .....<u><?php echo $intmdl->number; ?></u>..... &nbsp;&nbsp;&nbsp; <br/>
                <p> 2. คู่สมรสของข้าพเจ้า ชื่อ ...<u><?php echo $model->ce_spname; ?></u>...<br />
                    <?php
                    echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                    echo ($model->ce_spjobtype == '1') ? $checkedbox : $uncheckbox;
                    echo '&nbsp;&nbsp;ไม่เป็นข้าราชการหรือลูกจ้างประจำ<br />';

                    echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                    if($model->ce_spjobtype == '2' || $model->ce_spjobtype == '3'){
                        echo $checkedbox.'&nbsp;&nbsp;เป็นข้าราชการ     ลูกจ้างประจำ ตำแหน่ง ...<u>'.$model->ce_spposition.'</u>...<br />&nbsp;&nbsp;&nbsp;&nbsp;สังกัด ...<u>'.$model->ce_spbelong.'</u>.....<br />';
                    }else{ echo $uncheckbox.'&nbsp;&nbsp;เป็นข้าราชการ     ลูกจ้างประจำ ตำแหน่ง ...<u>-</u>...<br />&nbsp;&nbsp;&nbsp;&nbsp;สังกัด ...<u>-</u>.....<br />';
                    }

                    echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                    if($model->ce_spjobtype == '4'){
                        echo $checkedbox.'&nbsp;&nbsp;เป็นพนักงานในหน่วยงานของส่วนราชการหรือของราชการส่วนท้องถิ่น<br />&nbsp;&nbsp;&nbsp;&nbsp;ตำแหน่ง ...<u>'.$model->ce_spposition.'</u>... สังกัด ...'.$model->ce_spbelong.'...<br />';
                    }else{ echo $uncheckbox.'&nbsp;&nbsp;เป็นพนักงานในหน่วยงานของส่วนราชการหรือของราชการส่วนท้องถิ่น<br />&nbsp;&nbsp;&nbsp;&nbsp;ตำแหน่ง ...<u>-</u>... สังกัด ...-...<br />';;
                    }

                    echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                    if($model->ce_spjobtype == '5'){
                        echo $checkedbox;
                    }else{ echo $uncheckbox;
                    }
                    echo '&nbsp;&nbsp;เป็นพนักงานหรือลูกจ้างในรัฐวิสาหกิจ';
                    ?>
                </p>
                <p> 3. กรณีมิได้ใช้สิทธิ์ในฐานะสามี<br />
                    &nbsp;&nbsp;&nbsp;
                    <?php
                    if($model->ce_hasbright == '1'){
                        echo $checkedbox;
                    }else{ echo $uncheckbox;
                    }
                    ?> บุตรอยู่ในความปกครองของข้าพเจ้าโดยการหย่า หรือมิได้สมรสกันตามกฏหมาย หรือสามีถึงแก่กรรมแล้ว <br />
                    &nbsp;&nbsp;&nbsp;
                    <?php
                    if($model->ce_hasbright == '2'){
                        echo $checkedbox;
                    }else{ echo $uncheckbox;
                    }
                    ?> บุตรอยู่ในความอุปการะเลี้ยงดูของข้าพเจ้า เนื่องจากแยกกันอยู่โดยมิได้หย่าตามกฏหมาย
                </p>
                <p>
                    4. ข้าพเจ้าได้จ่ายเงินสำหรับการศึกษาบุตร ดังนี้<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    if($model->ce_feetype == '1'){
                        echo $checkedbox;
                    }else{ echo $uncheckbox;
                    }
                    ?>  [1] เงินบำรุงการศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    if($model->ce_feetype == '2'){
                        echo $checkedbox;
                    }else {echo $uncheckbox;
                    }
                    ?>  [2] เงินค่าเล่าเรียน
                </p>
                <p>
                1. บุตรชื่อ ...<u><?php echo $model->ce_ch1name; ?></u>... เกิดเมื่อ ...<u><?php echo \Yii::$app->formatter->asDate($model->ce_ch1birth, "long"); ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;เป็นบุตรลำดับที่(ของบิดา) ...<u><?php echo $model->ce_ch1dadorder; ?></u>... เป็นบุตรลำดับที่(ของมารดา) ...<u><?php echo $model->ce_ch1momorder; ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;(กรณีเป็นบุตรแทนที่บุตรซึ่งถึงแก่กรรมแล้ว) แทนที่บุตรลำดับที่ ...<u><?php echo $model->ce_ch1reporder; ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;ชื่อ ...<u><?php echo $model->ce_ch1repname; ?></u>... เกิดเมื่อ ...<u><?php echo \Yii::$app->formatter->asDate($model->ce_ch1repbirth, "long"); ?></u>... ถึงแก่กรรมเมื่อ  ...<u><?php echo \Yii::$app->formatter->asDate($model->ce_ch1repdeath, "long"); ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;สถานศึกษา ...<u><?php echo $model->ce_ch1schl; ?></u>... อำเภอ ...<u><?php echo $model->ceCh1schlamphur->AMPHUR_NAME; ?></u>... จังหวัด ...<u><?php echo $model->ceCh1schlprovince->PROVINCE_NAME; ?></u>...<br />
                </p>
                <table style="padding-left:12px; " width="550">
                    <tr>
                        <td width="248">ชั้นที่ศึกษา ...<u><?php echo $model->ce_ch1schlclass; ?></u>... </td>
                        <td width="290"><?php
                            if($model->ce_ch1fee1 !== '0'){
                                echo $checkedbox;
                            }else
                                echo $uncheckbox;
                            ?>
                            [1] จำนวน ...<u><?php echo number_format($model->ce_ch1fee1,2,'.',','); ?></u>... บาท</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><?php if(!empty($model->ce_ch1fee2)){
                            echo $checkedbox;
                        }else
                            echo $uncheckbox;
                        ?>
                            [2] จำนวน ...<u><?php echo (!empty($model->ce_ch1fee2)) ? number_format($model->ce_ch1fee2,2,'.',',') : $model->ce_ch1fee2 ?></u>... บาท</td>
                    </tr>
                </table>
                <p>
                2. บุตรชื่อ ...<u><?php echo $model->ce_ch2name; ?></u>... เกิดเมื่อ ...<u><?php echo \Yii::$app->formatter->asDate($model->ce_ch2birth, "long"); ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;เป็นบุตรลำดับที่(ของบิดา) ...<u><?php echo $model->ce_ch2dadorder; ?></u>... เป็นบุตรลำดับที่(ของมารดา) ...<u><?php echo $model->ce_ch2momorder; ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;(กรณีเป็นบุตรแทนที่บุตรซึ่งถึงแก่กรรมแล้ว) แทนที่บุตรลำดับที่ ...<u><?php echo $model->ce_ch2reporder; ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;ชื่อ ...<u><?php echo $model->ce_ch2repname; ?></u>... เกิดเมื่อ ...<u><?php echo \Yii::$app->formatter->asDate($model->ce_ch2repbirth, "long"); ?></u>... ถึงแก่กรรมเมื่อ  ...<u><?php echo \Yii::$app->formatter->asDate($model->ce_ch2repdeath, "long"); ?></u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;สถานศึกษา ...<u><?php echo $model->ce_ch2schl; ?></u>... อำเภอ ...<u><?php echo $model->ceCh2schlamphur->AMPHUR_NAME; ?></u>... จังหวัด ...<u><?php echo $model->ceCh2schlprovince->PROVINCE_NAME; ?></u>...<br />
                </p>
                <table style="padding-left:12px; " width="550">
                    <tr>
                        <td width="248">ชั้นที่ศึกษา ...<u><?php echo $model->ce_ch2schlclass; ?></u>... </td>
                        <td width="290"><?php
                            if(!empty($model->ce_ch2fee1)){
                                echo $checkedbox;
                            }else
                                echo $uncheckbox;
                            ?>
                            [1] จำนวน ...<u><?php echo (!empty($model->ce_ch2fee1)) ? number_format($model->ce_ch2fee1,2,'.',',') : $model->ce_ch2fee1 ?></u>... บาท</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><?php if(!empty($model->ce_ch2fee2)){
                                echo $checkedbox;
                            }else
                                echo $uncheckbox;
                            ?>
                            [2] จำนวน ...<u><?php echo (!empty($model->ce_ch2fee2)) ? number_format($model->ce_ch2fee2,2,'.',',') : $model->ce_ch2fee2 ?></u>... บาท</td>
                    </tr>
                </table>
                <p>
                    3. บุตรชื่อ ...<u><?php echo $model->ce_ch3name; ?></u>... เกิดเมื่อ ...<u><?php echo \Yii::$app->formatter->asDate($model->ce_ch3birth, "long"); ?></u>...<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;เป็นบุตรลำดับที่(ของบิดา) ...<u><?php echo $model->ce_ch3dadorder; ?></u>... เป็นบุตรลำดับที่(ของมารดา) ...<u><?php echo $model->ce_ch3momorder; ?></u>...<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;(กรณีเป็นบุตรแทนที่บุตรซึ่งถึงแก่กรรมแล้ว) แทนที่บุตรลำดับที่ ...<u><?php echo $model->ce_ch3reporder; ?></u>...<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;ชื่อ ...<u><?php echo $model->ce_ch3repname; ?></u>... เกิดเมื่อ ...<u><?php echo \Yii::$app->formatter->asDate($model->ce_ch3repbirth, "long"); ?></u>... ถึงแก่กรรมเมื่อ  ...<u><?php echo \Yii::$app->formatter->asDate($model->ce_ch3repdeath, "long"); ?></u>...<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;สถานศึกษา ...<u><?php echo $model->ce_ch3schl; ?></u>... อำเภอ ...<u><?php echo $model->ceCh3schlamphur->AMPHUR_NAME; ?></u>... จังหวัด ...<u><?php echo $model->ceCh3schlprovince->PROVINCE_NAME; ?></u>...<br />
                </p>
                <table style="padding-left:12px; " width="550">
                    <tr>
                        <td width="248">ชั้นที่ศึกษา ...<u><?php echo $model->ce_ch3schlclass; ?></u>... </td>
                        <td width="290"><?php
                            if(!empty($model->ce_ch3fee1)){
                                echo $checkedbox;
                            }else
                                echo $uncheckbox;
                            ?>
                            [1] จำนวน ...<u><?php echo (!empty($model->ce_ch3fee1)) ? number_format($model->ce_ch3fee1,2,'.',',') : $model->ce_ch3fee1 ?></u>... บาท</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><?php if(!empty($model->ce_ch3fee2)){
                                echo $checkedbox;
                            }else
                                echo $uncheckbox;
                            ?>
                            [2] จำนวน ...<u><?php echo (!empty($model->ce_ch3fee2)) ? number_format($model->ce_ch3fee2,2,'.',',') : $model->ce_ch3fee2 ?></u>... บาท</td>
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
    <table align="center" width="650" border="0" style="background-color:#fff;">
        <tr>
            <td colspan="2" class="tbcontent">
                <p>5. ข้าพเจ้าขอรับเงินสวัสดิการเกี่ยวกับการศึกษาของบุตร<p>
                <table width="650">
                    <tr>
                        <td width="100">
                            &nbsp;&nbsp;&nbsp;&nbsp;<?php if($model->ce_whole !== '0'){echo $checkedbox;}else echo $uncheckbox; ?> เต็มจำนวน <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;<?php if($model->ce_half !== '0'){echo $checkedbox;}else echo $uncheckbox; ?> ครึ่งจำนวน<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;<?php if($model->ce_piece !== '0'){echo $checkedbox;}else echo $uncheckbox; ?> เฉพาะส่วนที่ยังขาด<br />
                        </td>
                        <td width="290">
                            เป็นเงิน ...<u><?php echo number_format($model->ce_whole,2,'.',','); ?></u>... บาท<br />
                            เป็นเงิน ...<u><?php echo number_format($model->ce_half,2,'.',','); ?></u>... บาท<br />
                            เป็นเงิน ...<u><?php echo number_format($model->ce_piece,2,'.',','); ?></u>... บาท<br />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            &nbsp;&nbsp;&nbsp;&nbsp;รวมเป็นเงิน ...<u><?php echo number_format($model->ce_sum,2,'.',','); ?></u>... บาท ( ...<u><?php echo $thaibathtext; ?>บาทถ้วน</u>... )<br />
                            6. ข้าพเจ้าของรับรองว่า<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;<?php if($model->ce_agree == '1'){echo $checkedbox;}else echo $uncheckbox; ?> ข้าพเจ้ามีสิทธิ์ได้รับเงินช่วยเหลือตามระเบียบกองทุนพนักงานมหาวิทยาลัยสงขลานครินทร์ ว่าด้วยการจัดการสวัสดิการเกี่ยวกับการรักษาพยาบาลและการศึกษาของบุตรพนักงานมหาวิทยาลัย พ.ศ. 2551 <br />
                            &nbsp;&nbsp;&nbsp;&nbsp;<?php if($model->ce_agree == '2'){echo $checkedbox;}else echo $uncheckbox; ?> สามีของข้าพเจ้ามิได้ใช้สิทธิ์ขอรับเงินช่วยเหลือจากหน่วยงานที่สังกัด<br />
                            &nbsp;&nbsp;&nbsp;&nbsp;<?php if($model->ce_agree == '3'){echo $checkedbox;}else echo $uncheckbox; ?> คู่สมรสของข้าพเจ้าได้รับการช่วยเหลือจากรัฐวิสาหกิจ หรือหน่วยงานของส่วนราชการหรือของราชการส่วน ท้องถิ่นต่ำกว่า จำนวนที่ได้รับตามสิทธิ์ที่พึงมีพึงได้ จำนวน ...<u><?php if($model->ce_agree == '3'){echo number_format($model->ce_agreemoney,2,'.',',');}else echo '-'; ?></u>... บาท จริง
                        </td>
                    </tr>

                </table>
            </td>

        </tr>
        <tr>
            <td width="319" class="tbcontent">
                7. คำรับรองผู้บังคับบัญชา<br />
                &nbsp;&nbsp;&nbsp;&nbsp;เสนอ  ...<u>คณบดี</u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า ...<u>นางสาวพิมพ์ชนก พลวรรณ</u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;ตำแหน่ง ...<u>เจ้าหน้าที่การเงินและบัญชี</u>...<br />
                &nbsp;&nbsp;&nbsp;&nbsp;ได้ตรวจใบเบิกเงินสวัสดิการเกี่ยวกับการศึกษาของ บุตรฉบับนี้แล้ว ขอรับรองว่าผู้เบิกมีสิทธิ์เบิกได้ตาม ระเบียบตามจำนวนที่ขอเบิก<br />
                <table align="center">
                    <tr>
                        <td>
                            <p>(ลงชื่อ) .............................................</p>
                        </td>
                    </tr>
                </table>
                <table align="center">
                    <tr>
                        <td>
                            <p>(...........................................)</p>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="319" class="tbcontent">
                8. คำอนุมัติ<br />
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
                <table align="center">
                    <tr>
                        <td>
                            <p>วันที่ ...........................................</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="tbcontent">
                <p>9. ใบรับเงิน<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ได้รับเงินสวัสดิการเกี่ยวกับการศึกษาบุตร จำนวน ...<u><?php echo number_format($model->ce_sum,2,'.',','); ?></u>... บาท<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;( ...<u><?php echo $thaibathtext; ?>บาทถ้วน</u>... ) ไปถูกต้องแล้ว
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
                <p>&nbsp;&nbsp;&nbsp;&nbsp;<u style="border-bottom: 1px solid #000;">หมายเหตุ</u> ลายเซ็นรับเงินนี้จะสมบูรณ์เมื่อข้าพเจ้าได้รับเงินโอนเงินสวัสดิการข้างต้นเข้าบัญชีเงินฝากชื่อบัญชี ...<u><?php echo $model->ce_accname; ?></u>... &nbsp;&nbsp;&nbsp;&nbsp;บัญชีเลขที่ ...<u><?php echo $model->ce_accnum; ?></u>... ของข้าพเจ้าแล้วเท่านั้น
                </p>
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
            </td>
        </tr>
    </table>
    <p>&nbsp;</p>
</div>
</body>