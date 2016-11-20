<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size: XX-Large; vertical-align: middle;">
    <tr>
        <td>
            <div style="margin: 5px; border:1px solid #000; padding:0px 5px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>';
                        <td width="50%"><input type="image" title="" src="<?= $base_url ?>assets/img/app/flag/<?= $arr_flag([$row->RaceCountry])?>"><?= $arr_country[$row->RaceCountry]?></td>
                        <td width="35%" align="right"> AAAAAAAAAAAAAAA<?= $day_race ?></td>';
                        <td width="15%" align="right">
                            <a href="<?= $base_url ?>/app/horse/scrat_et_detail?country='<?= $row->RaceCountry ?>'&day='<?= $row->RaceDay ?>).'" style="text-decoration: none;">
                                <input type="image" name="" id="" title="Next" src="<?= base_url?>assets/img/app/next.gif').'">
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
