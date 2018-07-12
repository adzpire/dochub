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
                <p>แบบ 7131</p>
            </td>
        </tr>
        <tr>
            <td class="tbhead" align="center">
                <p>
                    ใบเบิกเงินสวัสดิการเกี่ยวกับการรักษาพยาบาล <br>
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
                1. ข้าพเจ้า .....<u><?php echo $model->mfgSt->getFullname('th'); ?></u>
                ... ตำแหน่ง ...<u><?php echo $model->mfgSt->position->name_th; ?></u>.....<br/>
                &nbsp;&nbsp;&nbsp; สังกัด .....<u>คณะวิทยาการสื่อสาร</u>.....
            </td>
        </tr>
        <tr>
            <td class="tbcontent">
                <p> 2. ขอเบิกเงินค่ารักษาพยาบาลของ</p>

                <table style="padding-left: 13px;">
                    <tr>
                        <td>
                            <p><?php if($model->mfg_ucheck == '1'){echo $checkedbox;}else echo $uncheckbox; ?> ตนเอง</p>
                            <p><?php if($model->mfg_spname == '-' || $model->mfg_spname == ''){echo $uncheckbox;}
                                else{ echo $checkedbox;
                                    $forwho[] = "คู่สมรส";
                                }
                                ?> คู่สมรส ชื่อ ...<u><?php echo $model->mfg_spname; ?></u>... &nbsp;&nbsp;&nbsp;เลขประจำตัวประชาชน ...<u><?php echo $model->mfg_spid; ?></u>...
                            </p>
                            <p><?php if($model->mfg_dadname == '-' || $model->mfg_dadname == ''){echo $uncheckbox;}
                                else{ echo $checkedbox;
                                    $forwho[] = "บิดา";
                                }
                                ?> บิดา ชื่อ ...<u><?php echo $model->mfg_dadname; ?></u>...  &nbsp;&nbsp;&nbsp;เลขประจำตัวประชาชน ...<u><?php echo $model->mfg_dadid; ?></u>...
                            </p>
                            <p><?php if($model->mfg_momname == '-' || $model->mfg_momname == ''){echo $uncheckbox;}
                                else{ echo $checkedbox;
                                    $forwho[] = "มารดา";
                                }
                                ?>	มารดา ชื่อ ...<u><?php echo $model->mfg_momname; ?></u>... &nbsp;&nbsp;&nbsp;เลขประจำตัวประชาชน ...<u><?php echo $model->mfg_momid; ?></u>...
                            </p>
                            <p><?php if($model->mfg_chname == '-' || $model->mfg_chname == ''){echo $uncheckbox;}
                                else{ echo $checkedbox;
                                    $forwho[] = "บุตร";
                                }
                                ?> บุตร ชื่อ ...<u><?php echo $model->mfg_chname; ?></u>... เลขประจำตัวประชาชน ...<u><?php echo $model->mfg_chid; ?></u>...
                            </p>
                            <p>เกิดเมื่อ ...<u><?php echo \Yii::$app->formatter->asDate($model->mfg_chbirth, "long"); ?></u>... เป็นบุตรลำดับที่ ...<u><?php echo $model->mfg_chorder; ?></u>...</p>
                            <p>
                                <?php if($model->mfg_chstatus == '1'){echo $checkedbox;}else echo $uncheckbox; ?>
                                ยังไม่บรรลุนิติภาวะ
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php if($model->mfg_chstatus == '2'){echo $checkedbox;}else echo $uncheckbox; ?>
                                เป็นบุตรไร้ความสามารถหรือเสมือนไร้ความสามารถ
                            </p>
                            <p>ป่วยเป็นโรค ...<u><?php echo $model->mfg_ill; ?></u>...</p>
                            <p>และได้รับการตรวจรักษาพยาบาลจาก (ชื่อสถานพยาบาล) ...<u><?php echo $model->mfg_hospital; ?></u>...</p>
                            <p>
                                ซึ่งเป็นสถานพยาบาลของ
                                <?php if($model->mfg_hospitaltype == '1' || $model->mfg_hospitaltype == '0'){echo $checkedbox;}else echo $uncheckbox; ?>
                                ทางราชการ
                                <?php if($model->mfg_hospitaltype == '2' || $model->mfg_hospitaltype == '0'){echo $checkedbox;}else echo $uncheckbox; ?>
                                เอกชน ตั้งแต่วันที่ ..<u><?php echo \Yii::$app->formatter->asDate($model->mfg_hosbdate, "long"); ?></u>.. ถึงวันที่ ..<u><?php echo \Yii::$app->formatter->asDate($model->mfg_hosedate, "long"); ?></u>..
                            </p>
                            <p>
                                เป็นเงินรวมทั้งสิ้น ...<u><?php echo number_format($model->mfg_hosfee,2,'.',','); ?></u>... บาท ( ...<u><?php echo $thaibathtext1; ?></u>... ) ตามใบเสร็จรับเงินที่แนบ จำนวน ...<u><?php echo $model->mfg_recnum; ?></u>... ฉบับ
                            </p>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
        <tr>
            <td class="tbcontent">
                <p>3. ข้าพเจ้ามีสิทธิได้รับเงินค่ารักษาพยาบาล ตามพระราชกฤษฏีกาเงินสวัสดิการเกี่ยวกับการรักษาพยาบาล</p>
                <table style="padding-left: 13px;">
                    <tr>
                        <td style="vertical-align: top;" rowspan="2" width="190px">
                            <?php if($model->mfg_feeright == '0'){echo $checkedbox;}else echo $uncheckbox; ?>
                            ตามสิทธิ
                        </td>
                        <td>
                            <p>
                                <?php if($model->mfg_feeright == '1'){echo $checkedbox;}else echo $uncheckbox; ?>
                                เฉพาะส่วนที่ขาดอยู่จากสิทธิที่ได้รับจากหน่วยงานอื่น
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                <?php if($model->mfg_feeright == '2'){echo $checkedbox;}else echo $uncheckbox; ?>
                                เฉพาะสวนที่ขาดอยู่จากสัญญาประกันภัย
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>เป็นเงิน ...<u><?php echo number_format($model->mfg_amount,2,'.',','); ?></u>... บาท ( ...<u><?php echo $model->mfg_info; ?></u>... ) และ</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;" rowspan="4">(1) ข้าพเจ้า</td>
                        <td><?php if($model->mfg_uright == '0' && $model->mfg_ucheck == '1'){echo $checkedbox;}else echo $uncheckbox; ?> ไม่มีสิทธิได้รับค่ารักษาพยาบาลจากหน่วยงานอื่น</td>
                    </tr>
                    <tr>
                        <td><?php if($model->mfg_uright == '1' && $model->mfg_ucheck == '1'){echo $checkedbox;}else echo $uncheckbox; ?> มีสิทธิได้รับค่ารักษาพยาบาลจากหน่วยงานอื่นแต่เลือกใช้สิทธิจากทางราชการ</td>
                    </tr>
                    <tr>
                        <td><?php if($model->mfg_uright == '2' && $model->mfg_ucheck == '1'){echo $checkedbox;}else echo $uncheckbox; ?> มีสิทธิได้รับค่ารักษาพยาบาลตามสัญญาประกันภัย</td>
                    </tr>
                    <tr>
                        <td><?php if($model->mfg_uright == '3' && $model->mfg_ucheck == '1'){echo $checkedbox;}else echo $uncheckbox; ?> เป็นผู้ใช้สิทธิเบิกค่ารักษาพยาบาลสำหรับบุตรแต่เพียงผู้เดียว</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;" rowspan="4">
                            (2) ...<u><?php if(isset($forwho)){
                                echo implode(", ",$forwho);
                            }else{ echo '-';}
                            ?>
                            </u>... ข้าพเจ้า</td>
                        <td><?php if($model->mfg_relright == '0'){echo $checkedbox;}else echo $uncheckbox; ?> ไม่มีสิทธิได้รับค่ารักษาพยาบาลจากหน่วยงานอื่น</td>
                    </tr>
                    <tr>
                        <td><?php if($model->mfg_relright == '1'){echo $checkedbox;}else echo $uncheckbox; ?> มีสิทธิได้รับค่ารักษาพยาบาลจากหน่วยงานอื่น แต่ค่ารักษาพยาบาลที่ได้รับต่ำกว่า สิทธิตามพระราชกฤษฏีกาฯ</td>
                    </tr>
                    <tr>
                        <td><?php if($model->mfg_relright == '2'){echo $checkedbox;}else echo $uncheckbox; ?> มีสิทธิได้รับค่ารักษาพยาบาลตามสัญญาประกันภัย</td>
                    </tr>
                    <tr>
                        <td><?php if($model->mfg_relright == '3'){echo $checkedbox;}else echo $uncheckbox; ?> มีสิทธิได้รัยค่ารักษาพยาบาลจากหน่วยงานอื่นในฐานะเป็นผู้อาศัยสิทธิของผู้อื่น</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<pagebreak />
<div align="center">
    <p align="center">- 2 -</p>
    <table align="center" width="650" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
        <tr>
            <td class="tbcontent">
                <p>4. เสนอ  ...<u>คณบดี</u>...</p>
                <p>
                    &nbsp;
                </p>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ข้าพเจ้าขอรับรองว่า ข้าพเจ้ามีสิทธิเบิกค่ารักษาพยาบาลสำหรับตนเองและบุคลากรในครอบครัว ตามจำนวนที่ขอเบิก ซึ่งกำหนดไว้ในกฏหมาย และข้อความข้างต้นเป็นจริงทุกประการ
                </p>
                <p>
                    &nbsp;
                </p>
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
                            <p>(....<u><?php echo $model->mfgSt->getFullname('th'); ?></u>....)</p>
                        </td>
                    </tr>
                </table>
                <table align="center">
                    <tr>
                        <td>
                            <p>วันที่ ...<u><?php echo \Yii::$app->formatter->asDate($model->mfg_date, "long"); ?></u>...</p>
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
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ได้รับเงินสวัสดิการเกี่ยวกับการรักษาพยาบาล จำนวน ...<u><?php echo number_format($model->mfg_amount,2,'.',','); ?></u>... บาท<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;( ...<u><?php echo $thaibathtext2; ?></u>... ) ไปถูกต้องแล้ว
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
    <p>&nbsp;&nbsp;&nbsp;&nbsp;[ก] ให้แนบสำเนาคำสั่งศาลที่สั่ง/พิพากษาให้เป็นบุคคลไร้ความสามารถหรือเสมือนไร้ความสามารถ</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;[ข] ให้มีคำชี้แจงด้วยว่ามีสิทธิเพียงใด และขาดอยู่เท่าใดกรณีได้รับจากหน่วยงานอื่นเมื่อเทียบสิทธิตาม พระราชกฤษฏีกาเงินสวัสดิการเกี่ยวกับการรักษาพยาบาล หรือขาดอยู่เท่าใดเมื่อได้รับค่ารักษาพยาบาลตามสัญญาประกันภัย</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;[ค] ให้เติมคำว่า คู่สมรส บิดา มารดา หรือ บุตร แล้วแต่กรณี</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;[ง] ให้เสนอต่อผู้มีอำนาจอนุมัติ</p>
</div>
</body>