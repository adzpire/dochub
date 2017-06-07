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
                <p>แบบ กทพ. 01</p>
            </td>
        </tr>
        <tr>
            <td class="tbhead" align="center">
                <p>
                    ใบเบิกเงินสวัสดิการเกี่ยวกับการรักษาพยาบาลพนักงานมหาวิทยาลัยฯ<br>
                    โปรดทำเครื่องหมาย
                    <!-- checkmark image -->
                    <img width="16" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDMyIDMyIiBoZWlnaHQ9IjMycHgiIGlkPSLQodC70L7QuV8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAzMiAzMiIgd2lkdGg9IjMycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTI3LjcwNCw4LjM5N2MtMC4zOTQtMC4zOTEtMS4wMzQtMC4zOTEtMS40MjgsMCAgTDExLjk4OCwyMi41OWwtNi4yODItNi4xOTNjLTAuMzk0LTAuMzkxLTEuMDM0LTAuMzkxLTEuNDI4LDBjLTAuMzk0LDAuMzkxLTAuMzk0LDEuMDI0LDAsMS40MTRsNi45OTksNi44OTkgIGMwLjM5LDAuMzg2LDEuMDM5LDAuMzg2LDEuNDI5LDBMMjcuNzA0LDkuODExQzI4LjA5OSw5LjQyMSwyOC4wOTksOC43ODcsMjcuNzA0LDguMzk3QzI3LjMxLDguMDA2LDI4LjA5OSw4Ljc4NywyNy43MDQsOC4zOTd6IiBmaWxsPSIjMTIxMzEzIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGlkPSJDaGVjayIvPjxnLz48Zy8+PGcvPjxnLz48Zy8+PGcvPjwvc3ZnPg==" >
                    ลงในช่องว่าง
                    <!-- checkedbox image -->
                    <?php echo $checkedbox ?>
                    พร้อมทั้งกรอกข้อความเท่าที่จำเป็น
                </p>
            </td>
        </tr>
        <tr>
            <td class="tbcontent">
                <p>1. ข้าพเจ้า .....<u><?php echo $model->mfSt->getFullname('th'); ?></u>
                ... ตำแหน่ง ...<u><?php echo $model->mfSt->position->name_th; ?></u>.....
                &nbsp;&nbsp;&nbsp; สังกัด ..<u>คณะวิทยาการสื่อสาร</u>..
                </p>
                <p> &nbsp;&nbsp;&nbsp; โทรศัพท์
                    ..<u><?php echo $model->mf_utelephone; ?></u>..
                </p>
                <p> 2. ขอเบิกเงินค่ารักษาพยาบาลของ<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;<?php if($model->mf_ucheck == '1'){echo $checkedbox;}else echo $uncheckbox;
                    ?> ข้าพเจ้า
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php if($model->mf_spname == ''){echo $uncheckbox;}else echo $checkedbox;
                    ?> คู่สมรส ชื่อ ...<u><?php echo $model->mf_spname; ?></u>...<br />
                    &nbsp;&nbsp;&nbsp;
                    <?php if($model->mf_dadname == ''){echo $uncheckbox;}else echo $checkedbox;
                    ?> บิดา ชื่อ ...<u><?php echo $model->mf_dadname; ?></u>... <br />
                    &nbsp;&nbsp;&nbsp;
                    <?php if($model->mf_momname == ''){echo $uncheckbox;}else echo $checkedbox;
                    ?> มารดา ชื่อ ...<u><?php echo $model->mf_momname; ?></u>...
                    ชื่อ ...<u><?php echo $model->mf_spname; ?></u>...

                </p>
                <table style="padding-left:13px; ">
                    <tr>
                        <td width="380">
                            <?php if($model->mf_chname == '-'){echo $uncheckbox;}else echo $checkedbox;
                            ?> บุตร ชื่อ ..<u><?php echo $model->mf_chname; ?></u>.. เกิดเมื่อ ..<u>
                                <?php echo \Yii::$app->formatter->asDate($model->mf_chbirth, "long"); ?></u>.. </td>
                        <td width="170">เป็นบุตรลำดับที่(ของบิดา) ...<u><?php echo $model->mf_dadorder; ?></u>...</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>เป็นบุตรลำดับที่(ของมารดา) ...<u><?php echo $model->mf_momorder; ?></u>...
                        </td>
                    </tr>
                </table>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;<?php if($model->mf_chstatus == '1'){echo $checkedbox;}else echo $uncheckbox; ?>
                ยังไม่บรรลุนิติภาวะ
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php if($model->mf_chstatus == '2'){echo $checkedbox;}else echo $uncheckbox; ?>
                เป็นบุตรไร้ความสามารถหรือเสมือนไร้ความสามารถ
                </p>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp;<?php if($model->mf_chright == '1'){echo $checkedbox;}else echo $uncheckbox; ?>
                    บุตรอยู่ในความปกครองของข้าพเจ้าโดยการหย่า หรือมิได้สมรสกันตามกฏหมาย หรือสามีถึงแก่กรรมแล้ว <br />
                    &nbsp;&nbsp;&nbsp;
                    <?php if($model->mf_chright == '2'){echo $checkedbox;}else echo $uncheckbox; ?>
                    บุตรอยู่ในความอุปการะเลี้ยงดูของข้าพเจ้า เนื่องจากแยกกันอยู่โดยมิได้หย่าตามกฏหมาย
                </p>

                &nbsp;&nbsp;&nbsp;  (กรณีเป็นบุตรแทนที่บุตรซึ่งถึงแก่กรรมแล้ว) แทนที่บุตรลำดับที่ ...<u>
                    <?php echo $model->mf_repchorder; ?></u>...&nbsp; ชื่อ ...<u>
                    <?php echo $model->mf_repchname; ?></u>... <br />
                &nbsp;&nbsp;&nbsp; เกิดเมื่อ ...<u>
                    <?php echo \Yii::$app->formatter->asDate($model->mf_repchbirth, "long"); ?></u>... ถึงแก่กรรมเมื่อ ...<u>
                    <?php echo \Yii::$app->formatter->asDate($model->mf_repchdeath, "long"); ?></u>...<br />
                <p>&nbsp;&nbsp;&nbsp; ป่วยเป็นโรค ...<u><?php echo $model->mf_ill; ?></u>...</p>
                <p>&nbsp;&nbsp;&nbsp; และได้รับการตรวจรักษาพยาบาลจาก (ชื่อสถานพยาบาล) ...<u><?php echo $model->mf_hospital; ?></u>...</p>
                <table style="padding-left:13px; ">
                    <tr>
                        <td>
                            <p>
                                ซึ่งเป็นสถานพยาบาลของ
                                <?php if($model->mf_hospitaltype == '1' || $model->mf_hospitaltype == '0'){echo $checkedbox;}else echo $uncheckbox; ?>
                                ทางราชการ
                                <?php if($model->mf_hospitaltype == '2' || $model->mf_hospitaltype == '0'){echo $checkedbox;}else echo $uncheckbox; ?>
                                เอกชน ตั้งแต่วันที่ ..<u><?php echo \Yii::$app->formatter->asDate($model->mf_hosbdate, "long"); ?></u>.. ถึงวันที่ ..<u><?php echo \Yii::$app->formatter->asDate($model->mf_hosedate, "long"); ?></u>..
                            </p>
                        </td>
                    </tr>
                </table>
                <p>
                3. ข้าพเจ้ามีสิทธิได้รับเงินสวัสดิการเกี่ยวกับการรักษาพยาบาลตามระเบียบกองทุนพนักงานมหาวิทยาลัย<br />
                &nbsp;&nbsp;&nbsp; สงขลานครินทร์ว่าด้วยการจัดสวัสดิการเกี่ยวกับการรักษาพยาบาล และการศึกษาของบุตรพนักงาน<br />
                &nbsp;&nbsp;&nbsp; มหาวิทยาลัย พ.ศ. 2551
                </p>
                <table>
                    <tr>
                        <td width="45">&nbsp;</td>
                        <td colspan="2"><?php if($model->mf_feeright == '1' || $model->mf_feeright == '0'){echo $checkedbox;}else echo $uncheckbox; ?> <span style="text-decoration:underline">เฉพาะส่วนที่ยังขาด</span> (ส่วนต่างที่เบิกจากประกันตนหรือประกันสุขภาพถ้วนหน้าไม่ได้)</td>
                    </tr>
                    <tr>
                        <td rowspan="7">&nbsp;</td>
                        <td width="15">&nbsp;</td>
                        <td width="544"><?php if($model->mf_lackfor == '1' || $model->mf_lackfor == '0'  && $model->mf_feeright != '2'){echo $checkedbox;}else echo $uncheckbox; ?> ข้าพเจ้า</td>
                    </tr>
                    <tr>
                        <td width="15">&nbsp;</td>
                        <td><?php if($model->mf_lackfor == '2' || $model->mf_lackfor == '0' && $model->mf_feeright != '2'){echo $checkedbox;}else echo $uncheckbox; ?> ญาติสายตรง (บิดา มารดา คู่สมรส บุตร)</td>
                    </tr>
                    <tr>
                        <td width="15">&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp; ได้ใช้สิทธิ
                            <?php if($model->mf_lackright == '0' && $model->mf_feeright != '2'){echo $checkedbox;}else echo $uncheckbox; ?> ประกันสังคม
                            <?php if($model->mf_lackright == '1' && $model->mf_feeright != '2'){echo $checkedbox;}else echo $uncheckbox; ?> ประกันสุขภาพถ้วนหน้า ขอเบิกค่ารักษาส่วนที่ยังขาดสิทธิ<br />
                            &nbsp;&nbsp;&nbsp; จำนวน ...<u><?php if($model->mf_feeright == '1' || $model->mf_feeright == '0'){echo number_format($model->mf_lackamount,2,'.',',');}else echo '-'; ?></u>... บาท</td>
                    </tr>
                    <tr>
                        <td colspan="2"><?php if($model->mf_feeright == '2' || $model->mf_feeright == '0'){echo $checkedbox;}else echo $uncheckbox; ?> <span style="text-decoration:underline">สิทธิ 50%</span> (ไม่ใช้สิทธิประกันตนหรือสิทธิประกันสุขภาพถ้วนหน้า)</td>
                    </tr>
                    <tr>
                        <td rowspan="3">&nbsp;</td>
                        <td><?php if($model->mf_fiftyfor == '1' || $model->mf_fiftyfor == '0' && $model->mf_feeright != '1'){echo $checkedbox;}else echo $uncheckbox; ?> ข้าพเจ้า</td>
                    </tr>
                    <tr>
                        <td><?php if($model->mf_fiftyfor == '2' || $model->mf_fiftyfor == '0' && $model->mf_feeright != '1'){echo $checkedbox;}else echo $uncheckbox; ?> ญาติสายตรง (บิดา มารดา คู่สมรส บุตร)</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp; ไม่ได้ใช้สิทธิเบิกค่ารักษาพยาบาลจากหน่วยงานใดๆ ขอเบิกค่ารักษาพยาบาล จำนวน 50% ดังนี้<br />
                            &nbsp;&nbsp;&nbsp; ค่ารักษาพยาบาลในใบเสร็จรับเงินจำนวน ...<u><?php if($model->mf_feeright == '2' || $model->mf_feeright == '0'){echo number_format($model->mf_fiftyamount,2,'.',',');} ?></u>... บาท<br />
                            &nbsp;&nbsp;&nbsp; เบิก 50% ของใบเสร็จรับเงินจำนวน ...<u><?php if($model->mf_feeright == '2' || $model->mf_feeright == '0'){echo number_format(($model->mf_fiftyamount/2),2,'.',',');} ?></u>... บาท<br /></td>
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
                <table>
                    <tr>
                        <td width="45">&nbsp;</td>
                        <td colspan="2"><span style="text-decoration:underline">สรุปจำนวนเงินเบิกจ่ายค่ารักษาพยาบาลในปี พ.ศ. ...<u><?php echo \Yii::$app->formatter->asDate('1-1-'.$model->mf_year, 'yyyy'); ?></u>... (ปีงบประมาณ)</span></td>
                    </tr>
                    <tr>
                        <td rowspan="5">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><?php if($model->mf_usedto == '2'){echo $checkedbox;}else echo $uncheckbox; ?> เคยใช้สิทธิเบิกค่ารักษาพยาบาลมาแล้ว จำนวน ............ ครั้ง</td>
                    </tr>
                    <tr>
                        <td width="15">&nbsp;</td>
                        <td width="544">&nbsp;&nbsp;&nbsp; เป็นเงินจำนวน ............ บาท<br />          &nbsp;&nbsp;&nbsp; <strong>ขอเบิกค่ารักษาครั้งนี้ จำนวน ...<u>
                                    <?php if($model->mf_usedto == '2'){echo number_format($model->mf_want,2,'.',',');}else echo '-'; ?>
                                </u>... บาท</strong><br />          &nbsp;&nbsp;&nbsp; คงเหลือเงิน จำนวน ............ บาท
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><?php if($model->mf_usedto == '1'){echo $checkedbox;}else echo $uncheckbox; ?>
                            ยังไม่เคยใช้สิทธิเบิกค่ารักษาพยาบาล
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;<strong>ขอเบิกค่ารักษาครั้งนี้ จำนวน ...<u>
                                    <?php if($model->mf_usedto == '1'){echo number_format($model->mf_want,2,'.',',');}else echo '-'; ?>
                                </u>... บาท</strong><br />
                            &nbsp;&nbsp;&nbsp; คงเหลือเงิน จำนวน ............ บาท
                        </td>
                    </tr>
                    <tr>
                        <td width="45">&nbsp;</td>
                        <td colspan="2">ข้าพเจ้าขอรับรองว่า ข้อความข้างต้นเป็นจริงทุกประการ</td>
                    </tr>
                </table>
                <table align="center">
                    <tr>
                        <td>
                            <p>(ลงชื่อ) ...<u><?php echo $model->mfSt->getFullname('th'); ?></u>... ผู้ขอรับเงินสวัสดิการ</p>
                        </td>
                    </tr>
                </table>
                <table align="center">
                    <tr>
                        <td>
                            <p>วันที่ ...<u><?php echo \Yii::$app->formatter->asDate($model->mf_date, "long"); ?></u></p>
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
                            <p>(........<u>นางสาวพิมพ์ชนก พลวรรณ</u>...........)</p>
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
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ได้รับเงินสวัสดิการเกี่ยวกับการศึกษาบุตร จำนวน ...<u><?php echo number_format($model->mf_want,2,'.',','); ?></u>... บาท<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;( ...<u><?php echo $thaibathtext; ?>บาทถ้วน</u>... ) ไปถูกต้องแล้ว
                </p>
                <p>&nbsp;</p>
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
            </td>
        </tr>
    </table>
    <p>&nbsp;</p>
</div>
</body>